FROM php:7.2-apache

RUN apt update -y && \
  apt install -y mysql-server

COPY initial.sql /initial.sql
COPY start.sh /start.sh
COPY src/ /var/www/html/

CMD '/start.sh'
