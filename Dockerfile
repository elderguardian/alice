FROM php:apache

RUN a2enmod rewrite
COPY ./src /var/www/html/

RUN chmod -R 755 /tmp
RUN mkdir /alice && chmod 755 /alice

WORKDIR /var/www/html
