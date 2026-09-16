FROM php:8.3-apache

RUN apt-get update \
    && apt-get install -y git unzip libicu-dev libonig-dev libzip-dev \
    && docker-php-ext-install intl mbstring mysqli \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri \
    -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf \
    && sed -ri \
    -e 's/AllowOverride None/AllowOverride All/g' \
    /etc/apache2/apache2.conf

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader \
    && chown -R www-data:www-data writable

EXPOSE 80

CMD ["apache2-foreground"]