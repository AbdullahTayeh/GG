# Use the official PHP and Apache base image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the PHP application files to the container
COPY . /var/www/html
COPY ./init.sql /docker-entrypoint-initdb.d/
# Install PDO extension and enable Apache modules
RUN docker-php-ext-install pdo pdo_mysql \
    && a2enmod rewrite

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli && apachectl restart
# Set up Apache configuration
# COPY ./app/my-site.conf /etc/apache2/sites-available/my-site.conf
# RUN a2dissite 000-default.conf \
#     && a2ensite my-site.conf \
#     && service apache2 restart

# Expose port 80 for web traffic
EXPOSE 80
