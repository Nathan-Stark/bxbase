#!/usr/bin/env bash

MYSQL_ROOT_PASSWORD='password'
MYSQL_BITRIX_LOGIN='bitrix'
MYSQL_BITRIX_PASSWORD='bitrix'
MYSQL_BITRIX_DB='sitemanager'

sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password $MYSQL_ROOT_PASSWORD"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $MYSQL_ROOT_PASSWORD"
sudo apt-get install -y mysql-server

mysql_tzinfo_to_sql /usr/share/zoneinfo | sudo mysql -u root --password=$MYSQL_ROOT_PASSWORD mysql
sudo chown -R mysql:vagrant /var/log/mysql

sudo service mysql stop

sudo cp /var/www/bitrix-base/vagrant_stuff/mysql/*.cnf /etc/mysql/mariadb.conf.d/

sudo service mysql start

#Создаем пользователя в mySQL
sudo mysql -u root -e "CREATE USER '${MYSQL_BITRIX_LOGIN}'@'%' IDENTIFIED BY '${MYSQL_BITRIX_PASSWORD}';"
sudo mysql -u root -e "GRANT ALL PRIVILEGES ON * . * TO '${MYSQL_BITRIX_LOGIN}'@'%';"
sudo mysql -u root -e "CREATE DATABASE ${MYSQL_BITRIX_DB};"
