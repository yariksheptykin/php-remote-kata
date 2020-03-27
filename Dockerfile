FROM php:7.4.4-cli-alpine

RUN set -eux; \
    \
    apk update; \
    apk upgrade; \
    apk add --no-cache build-base autoconf libxml2-dev; \
    \
    docker-php-ext-install xml; \
    pecl install xdebug-2.9.4; \
    docker-php-ext-enable xml xdebug;

COPY --from=composer /usr/bin/composer /user/bin/composer

