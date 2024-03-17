FROM php:apache

RUN a2enmod rewrite

COPY ./src /var/www/html/
WORKDIR /var/www/html
