#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="${ROOT_DIR:-/docker/wpsandbox}"
BACKUP_ROOT="${BACKUP_ROOT:-/docker/wpsandbox/backups}"
STAMP="$(date +%Y%m%d-%H%M%S)"
TARGET_DIR="$BACKUP_ROOT/$STAMP"
DB_CONTAINER="${DB_CONTAINER:-wpsandbox-wp_db-1}"
RETENTION_DAYS="${RETENTION_DAYS:-14}"
FULL_ARCHIVE="${FULL_ARCHIVE:-1}"

mkdir -p "$TARGET_DIR" "$BACKUP_ROOT/logs"

printf 'timestamp=%s\n' "$STAMP" > "$TARGET_DIR/manifest.txt"
printf 'host=%s\n' "$(hostname)" >> "$TARGET_DIR/manifest.txt"
printf 'root_dir=%s\n' "$ROOT_DIR" >> "$TARGET_DIR/manifest.txt"

docker exec "$DB_CONTAINER" sh -lc 'exec mysqldump --no-tablespaces -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE"' \
  | gzip -1 > "$TARGET_DIR/database.sql.gz"

tar -C "$ROOT_DIR" -czf "$TARGET_DIR/wp-content.tgz" wp-content

tar -C "$ROOT_DIR" -czf "$TARGET_DIR/config.tgz" \
  .env \
  docker-compose.yml \
  php-config \
  db-backup.sh \
  db-backup.legacy.sh \
  scripts

if [ "$FULL_ARCHIVE" = "1" ]; then
  tar -C "$ROOT_DIR" -czf "$TARGET_DIR/project.tgz" \
    --exclude='./backups' \
    --exclude='./db-backups' \
    --exclude='./.git' \
    --exclude='./front/node_modules' \
    --exclude='./front/.next' \
    .
fi

sha256sum "$TARGET_DIR"/* > "$TARGET_DIR/SHA256SUMS"
ln -sfn "$TARGET_DIR" "$BACKUP_ROOT/latest"
find "$BACKUP_ROOT" -mindepth 1 -maxdepth 1 -type d -regextype posix-extended -regex '.*/[0-9]{8}-[0-9]{6}' -mtime +"$RETENTION_DAYS" -exec rm -rf {} +

echo "backup complete: $TARGET_DIR"
