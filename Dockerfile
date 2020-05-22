FROM php:cli-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN set -eux; \
    mkdir /app; \
    \
    apk update; \
    apk upgrade; \
    apk add --no-cache --virtual .build-deps build-base autoconf; \
    \
    pecl install xdebug-2.9.4; \
    docker-php-ext-enable xdebug; \
    \
    apk del --no-network .build-deps;

COPY php.ini /usr/local/etc/php/

WORKDIR /app
