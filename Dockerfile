FROM php:8.4-cli-alpine AS vendor
WORKDIR /app
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

FROM node:22-alpine AS assets
WORKDIR /app
COPY package.json package-lock.json vite.config.js ./
RUN npm ci --ignore-scripts
COPY resources ./resources
COPY public ./public
COPY app ./app
RUN npm run build

FROM php:8.4-cli-alpine AS runtime
WORKDIR /var/www/html

COPY . .
COPY --from=vendor /app/vendor ./vendor
COPY --from=assets /app/public/build ./public/build
COPY docker/entrypoint.sh /usr/local/bin/docker-entrypoint.sh

RUN sed -i 's/\r$//' /usr/local/bin/docker-entrypoint.sh \
    && chmod +x /usr/local/bin/docker-entrypoint.sh \
    && mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && rm -f bootstrap/cache/*.php \
    && php artisan package:discover --ansi \
    && chown -R www-data:www-data storage bootstrap/cache

ENV APP_NAME="Chutikhan Portfolio" \
    APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    SESSION_DRIVER=file \
    CACHE_STORE=file \
    QUEUE_CONNECTION=sync \
    PORTFOLIO_ENABLE_APPLE=true \
    TRUSTED_PROXIES="*" \
    PHP_CLI_SERVER_WORKERS=4 \
    PORT=8000

USER www-data
EXPOSE 8000

HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
    CMD php -r 'exit(@file_get_contents("http://127.0.0.1:".(getenv("PORT")?:"8000")."/up") === false ? 1 : 0);'

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
