#!/usr/bin/env sh
set -e

ROLE="${APP_ROLE:-web}"
PORT="${PORT:-10000}"

if [ "$ROLE" = "web" ]; then
  if [ "${RUN_MIGRATIONS:-true}" = "true" ]; then
    php artisan migrate --force || true
  fi
  php artisan config:cache || true
  php artisan view:cache || true
  exec php artisan serve --host=0.0.0.0 --port="$PORT"
fi

if [ "$ROLE" = "worker" ]; then
  exec php artisan queue:work --sleep=1 --tries=3 --timeout=300
fi

if [ "$ROLE" = "scheduler" ]; then
  exec php artisan schedule:run --verbose --no-interaction
fi

echo "Unknown APP_ROLE: $ROLE"
exit 1
