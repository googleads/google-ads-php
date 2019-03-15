FROM php:7.1-apache

RUN apt-get update && apt-get install -y libxml2 zlib1g-dev git unzip

RUN docker-php-ext-install bcmath

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN pecl install grpc
RUN echo 'extension=grpc.so' >> $PHP_INI_DIR/conf.d/grpc.ini

# Create empty credentials to make sure the unit tests run successfully
RUN echo '{"type": "authorized_user","client_id": "","client_secret": "","refresh_token": ""}' >> /root/emptycredentials.json
ENV GOOGLE_APPLICATION_CREDENTIALS /root/emptycredentials.json

WORKDIR "/google-ads-php"
