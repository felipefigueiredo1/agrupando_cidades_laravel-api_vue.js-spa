FROM php:7.4-fpm
# Aqui tu informa as dependencias que faz o projeto rodar separado com \
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    software-properties-common
# Limpe os arquivos de cache se for necessário
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# Instale as extensões do php aqui embaixo
RUN apt-get update && apt-get install -y \
    php \
    libapache2-mod-php \
    php-mbstring \
    php-xmlrpc \
    php-soap \
    php-gd \
    php-xml \
    php-cli \
    php-zip \
    php-bcmath \
    php-tokenizer \
    php-json \
    php-pear
# Instalando o laravel
RUN curl -sS https://getcomposer.org/installer | php; sudo mv composer.phar /usr/local/bin/composer; sudo chmod +x /usr/local/bin/composer
# Defina o diretorio do projeto no Container
WORKDIR  /var/www/html
# Copie todo projeto para o Workdir do Projeto
COPY . .
# Informe a porta que seu projeto funciona
EXPOSE 80
# Der permissão a pasta para que o projeto funcione (necessário informar a permissão correta)
RUN chown -R www-data:www-data /var/www
