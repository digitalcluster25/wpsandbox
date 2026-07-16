#!/bin/bash

BACKUP_DIR=/docker/wpsandbox/db-backups
PREV_HASH_FILE=$BACKUP_DIR/.prev_hash
REPO=/docker/wpsandbox

# Дамп БД
DUMP=$(docker exec wpsandbox-wp_db-1 mysqldump   -u root -p9g5tJeSQ8GJUF1YwvGkM wordpress 2>/dev/null)

# Хэш без строк с временными метками (они меняются каждый раз)
NEW_HASH=$(echo "$DUMP" | grep -v '^-- Dump completed' | grep -v '^-- MySQL dump' | md5sum | cut -d' ' -f1)
PREV_HASH=$(cat $PREV_HASH_FILE 2>/dev/null || echo '')

cd $REPO

# Изменения в файлах
FILES_CHANGED=$(git status --porcelain | wc -l)

# Ничего не изменилось — выходим
if [ "$NEW_HASH" = "$PREV_HASH" ] && [ "$FILES_CHANGED" -eq 0 ]; then
  exit 0
fi

CHANGES=""
DATE=$(date +%Y-%m-%d_%H-%M)

if [ "$NEW_HASH" != "$PREV_HASH" ]; then
  echo "$DUMP" | gzip -n > $BACKUP_DIR/wordpress_$DATE.sql.gz
  echo $NEW_HASH > $PREV_HASH_FILE
  ls -t $BACKUP_DIR/wordpress_2*.sql.gz 2>/dev/null | tail -n +31 | xargs rm -f
  CHANGES="db "
fi

[ "$FILES_CHANGED" -gt 0 ] && CHANGES="${CHANGES}files"

git add -A
git commit -m "auto: ${CHANGES}[$(date '+%Y-%m-%d %H:%M')]"
git push origin main

echo "$(date): committed [$CHANGES]"
