FROM php:8-alpine
MAINTAINER Hallenbeck Digital Construction

RUN apk update && apk add --nocache sqlite && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
