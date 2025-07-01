FROM php:8.2-apache AS base

RUN docker-php-ext-install mysqli

FROM base AS runner

COPY . /var/www/html
