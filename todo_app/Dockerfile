# Replaces the bitnami/symfony:1 image used in 2022, which is no longer available on Docker Hub.
FROM php:8.1-cli-alpine

RUN apk add --no-cache git unzip \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && docker-php-ext-install pdo_mysql \
    && apk del .build-deps

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

WORKDIR /app
EXPOSE 8000

ENTRYPOINT ["entrypoint.sh"]
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
