#FROM php:7.4.3-fpm
FROM php:8.2.2-fpm

LABEL name="Debian 11 en español PHP-FPM 7.4.3" \
    maintainer="elalconxvii@gmail.com"

ENV DEBIAN_FRONTEND noninteractive

ARG UID=1000

# Crea usuario para ejecución de comandos
#RUN useradd -G www-data,root -o -u 1000 usuario \
#    && mkdir -p /home/usuario \
#    && chown -R usuario:usuario /home/usuario \
#    && true

#RUN chmod -R 777 /app

# https://github.com/mlocati/docker-php-extension-installer
# Instalación de docker-php-extension-installer
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions \
    && install-php-extensions @composer \
    && true


ENV LANG es_ES.UTF-8
RUN rm /etc/localtime \
    && echo "America/Buenos_Aires" > /etc/timezone \
    && ln -s /usr/share/zoneinfo/America/Buenos_Aires /etc/localtime \
    && dpkg-reconfigure -f noninteractive tzdata \
    && true

RUN apt update -y\
    && apt upgrade -y\
    && apt install -y \
    bash-completion \
    tzdata \
    less \
    multitail \
    curl \
    git \
    gnupg \
    locales \
    make \
    sudo \
    unzip \
    vim \
    nano \
    wget \
    zip \
    unzip \
    nodejs \
    npm \
    && localedef -i es_ES -c -f UTF-8 -A /usr/share/locale/locale.alias es_ES.UTF-8 \
    && true

# Instalación de dependencias de php
RUN install-php-extensions \
    mcrypt \
    opcache \
    pcntl \
    pdo_mysql \
    mbstring \
    exif \
    #xdebug \
    openssl \
    bcmath \
    gd \
    xml \
    sockets \
    mongodb \
    && true

# Instalación de dependencias de sistema

RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.0/install.sh | bash
###RUN nvm install 20

RUN wget -qO- https://raw.githubusercontent.com/creationix/nvm/v0.39.0/install.sh | bash
#RUN source ~/.profile
#RUN pecl install mongodb
RUN npm install -g yarn


COPY conf.d/* /usr/local/etc/php/conf.d/
COPY conf.d/* /usr/local/etc/php-fpm.d/

COPY .env.example /app/code/.env

WORKDIR /app/code

USER root