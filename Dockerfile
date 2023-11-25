FROM php:8-alpine
MAINTAINER Hallenbeck Digital Construction

RUN apk update && apk add --no-cache sqlite icu-dev
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-enable intl
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
