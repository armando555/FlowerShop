FROM php:7.4-apache 
RUN apt-get update -y && apt-get install -y openssl zip unzip git 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y \
        zlib1g-dev \
        libicu-dev \
        libxml2-dev \
        libpq-dev \
        libzip-dev \
        && docker-php-ext-install pdo pdo_mysql zip intl xmlrpc soap opcache \
        && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd

RUN apt-get update -y 

COPY . /var/www/html 
WORKDIR /var/www/html


RUN composer update
RUN composer require guzzlehttp/guzzle:^7.0 --with-all-dependencies
RUN composer require maatwebsite/excel --with-all-dependencies
RUN composer require phpoffice/phpspreadsheet --with-all-dependencies
RUN composer install \ 
    --ignore-platform-reqs \ 
    --no-interaction \
    --no-plugins \ 
    --no-scripts \ 
    --prefer-dist 

RUN composer update

COPY --from=composer /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

EXPOSE 80

RUN php artisan key:generate
#RUN php artisan migrate
#RUN php artisan migrate:refresh --seed
RUN php artisan storage:link


RUN chmod -R 777 /var/www/html

RUN a2enmod rewrite 
RUN service apache2 restart
