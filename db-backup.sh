#!/bin/bash
set -e

BACKUP_DIR=/docker/wpsandbox/db-backups
LATEST=$BACKUP_DIR/wordpress_latest.sql.gz
PREV_HASH_FILE=$BACKUP_DIR/.prev_hash
REPO=/docker/wpsandbox

# Дамп БД
docker exec wpsandbox-wp_db-1 mysqldump   -u root -p9g5tJeSQ8GJUF1YwvGkM wordpress   2>/dev/null | gzip > $LATEST

# Хэш нового дампа
NEW_HASH=$(md5sum $LATEST | cut -d' ' -f1)
PREV_HASH=$(cat $PREV_HASH_FILE 2>/dev/null || echo '')

cd $REPO

# Проверяем изменения в файлах
FILES_CHANGED=$(git status --porcelain | grep -v '^??' | wc -l)

# Если ничего не изменилось — выходим
if [ "$NEW_HASH" = "$PREV_HASH" ] && [ "$FILES_CHANGED" -eq 0 ]; then
  exit 0
fi

# Сохраняем датированную копию если БД изменилась
if [ "$NEW_HASH" != "$PREV_HASH" ]; then
  DATE=$(date +%Y-%m-%d_%H-%M)
  cp $LATEST $BACKUP_DIR/wordpress_$DATE.sql.gz
  echo $NEW_HASH > $PREV_HASH_FILE
  # Оставляем 30 последних
  ls -t $BACKUP_DIR/wordpress_2*.sql.gz 2>/dev/null | tail -n +31 | xargs rm -f
fi

# Коммит
git add -A
DATE=$(date '+%Y-%m-%d %H:%M')
CHANGES=
[ "$NEW_HASH" != "$PREV_HASH" ] && CHANGES=db 
[ "$FILES_CHANGED" -gt 0 ] && CHANGES=${CHANGES}files
git commit -m "auto: ${CHANGES}[$DATE]" && git push origin main

echo "$(date): committed [$CHANGES]"
