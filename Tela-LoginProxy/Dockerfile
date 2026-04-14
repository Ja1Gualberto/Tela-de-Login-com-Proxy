# Usa o PHP 8.2 com o servidor Apache embutido
FROM php:8.4-apache

# Instala os drivers para o PHP conseguir conversar com o MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Muda a pasta raiz do Apache para a pasta "public" do Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Habilita URLs amigáveis no Apache
RUN a2enmod rewrite
