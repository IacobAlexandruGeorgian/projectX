# php

FROM php:8.1 as php

RUN apt-get update -y
RUN apt-get install -y git unzip libpq-dev libcurl4-gnutls-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath

RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

WORKDIR /var/www

COPY . .

COPY --from=composer:2.5.5 /usr/bin/composer /usr/bin/composer

ADD ./php.ini /usr/local/etc/php/

ENV PORT=8000

ENTRYPOINT [ "docker/entrypoint.sh" ]

# node

FROM node:16-alpine as node

WORKDIR /var/www
COPY . .

RUN npm install --global cross-env
RUN npm install

VOLUME /var/www/node_modules
