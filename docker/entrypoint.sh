#!/bin/sh
set -eu

if [ -z "${APP_KEY:-}" ]; then
    export APP_KEY="base64:$(php -r 'echo base64_encode(random_bytes(32));')"
fi

exec php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
