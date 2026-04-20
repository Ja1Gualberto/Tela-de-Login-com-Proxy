# Usa o PHP 8.2 com o servidor Apache embutido
FROM php:8.4-apache

# Atualiza os pacotes do Linux e instala o Git, Unzip e dependências do Zip
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip mysqli pdo pdo_mysql

# Instala os drivers para o PHP conseguir conversar com o MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Muda a pasta raiz do Apache para a pasta "public" do Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Habilita URLs amigáveis no Apache
RUN a2enmod rewrite
# Copia o Composer da imagem oficial direto para o nosso container
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
