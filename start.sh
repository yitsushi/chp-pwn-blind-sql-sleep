#!/bin/bash

mysqld_safe &

sleep 10
/usr/bin/mysql -u root < /initial.sql

apache2-foreground
