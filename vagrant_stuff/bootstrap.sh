#!/usr/bin/env bash

# update / upgrade
sudo apt-get update
sudo apt-get -y upgrade

sudo apt-get install -y curl mc git ntp sendmail
sudo service ntp start

wget -nv -P /var/www/bitrix-base/web/ http://www.1c-bitrix.ru/download/scripts/bitrixsetup.php
wget -nv -P /var/www/bitrix-base/web/ http://www.1c-bitrix.ru/download/scripts/restore.php
