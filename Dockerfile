# Use an official PHP runtime
FROM php:8.2-apache

RUN docker-php-ext-install mysqli

WORKDIR /var/www/html
# Copy the source code in /www into the container at /var/www/html
COPY ../www .
