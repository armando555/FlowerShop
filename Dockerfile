FROM php:7.4-apache
RUN apt-get update -y && apt-get install -y openssl zip unzip git 
RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /var/www/html
COPY ./public/.htaccess /var/www/html/.htaccess
WORKDIR /var/www/html
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist
RUN composer require davejamesmiller/laravel-breadcrumbs:5.x
RUN composer require barryvdh/laravel-dompdf
RUN composer require spatie/laravel-permission
RUN php artisan key:generate
RUN php artisan storage:link
RUN php artisan migrate
RUN chown -R $USER:www-data storage
RUN chown -R $USER:www-data bootstrap/cache
RUN chmod -R 775 storage
RUN chmod -R 775 bootstrap/cache
RUN a2enmod rewrite
RUN service apache2 restart






