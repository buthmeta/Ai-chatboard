FROM php:8.2-apache

# Enable Apache rewrite mod
RUN a2enmod rewrite

# Copy all files into Apache web root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Expose port
EXPOSE 80
