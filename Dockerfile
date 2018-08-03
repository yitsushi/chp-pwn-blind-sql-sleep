FROM php:7.2-apache

RUN apt update -y && \
  apt install -y mysql-server

RUN docker-php-ext-install mysqli pdo_mysql

COPY initial.sql /initial.sql
COPY start.sh /start.sh
COPY src/ /var/www/html/

CMD '/start.sh'
