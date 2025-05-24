FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy files to Apache server
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/
