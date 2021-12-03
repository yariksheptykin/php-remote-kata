FROM docker-repository.intern.neusta.de/php:8.1.0-cli-alpine

COPY --from=docker-repository.intern.neusta.de/mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
COPY --from=docker-repository.intern.neusta.de/composer /usr/bin/composer /usr/bin/composer

RUN set -eux; \
    mkdir /app; \
    install-php-extensions xdebug;

COPY php.ini /usr/local/etc/php/

WORKDIR /app
