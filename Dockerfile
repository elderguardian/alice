FROM php:apache

RUN a2enmod rewrite
COPY ./src /var/www/html/

RUN mkdir -p /alice && chmod 777 /alice
RUN mkdir -p /alice/metadata && chmod 777 /alice/metadata

RUN chown -R www-data:www-data /alice

WORKDIR /var/www/html
