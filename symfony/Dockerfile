FROM php:8.2.12-fpm-alpine
RUN set -ex
RUN apk update
RUN apk add php82-dev
RUN apk --no-cache add postgresql-dev
RUN docker-php-ext-install pdo pdo_pgsql
RUN docker-php-ext-configure intl && docker-php-ext-install intl
RUN apk add php82-curl
RUN apk add wget
RUN apk add nano
RUN apk add acl
RUN apk add build-base
RUN apk add autoconf

RUN mkdir -p /var/www/symfony2/var/cache/dev -m 777
RUN mkdir -p /var/www/symfony2/var/log -m 777
RUN mkdir -p /var/www/symfony2/vendor -m 776

COPY . /var/www/symfony
WORKDIR /var/www/symfony

CMD ["php-fpm"]
