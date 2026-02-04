# NFC door lock
Backend API for unlocking doors electronically with NFC cards.

# Installation
## Prerequisites
Apache2
- libapache2-mod-php
PHP:
- PHP7.4
- php-bcmath
- php-cli
- php-curl
- php-common
- php-gd
- php-json
- php-mbstring
- php-mysql
- php-tokenizer
- php-xml
- php-zip
composer
MariaDB-server (or mysql, if you really want)

## Installation

One-liner apt install:
sudo apt install apache2 libapache2-mod-php php7.4-{bcmath,cli,curl,common,gd,json,mbstring,mysql,tokenizer,xml,zip} composer mariadb-server

Create database DoorSystem; // run in MariaDB, case sensitive!!

On a GNU/Linux serveur (debian based)

In the root directory of this project, run the following commands:

sudo composer install --no-dev
sudo cp .env.example .env

Update .env with all needed info:database name, username and password.
Make sure the selected user has sufficent access to the database (create, update, delete)
grant all privileges on DoorSystem.* to 'user'@'localhost';

sudo chown www-data:www-data {absolute route to the projet} // www-data is the Apache2 default user.
sudo chmod 775 {absolute route to the projet}

sudo php artisan migrate // create tables in db
sudo php artisan key:generate // generate encription key

Edit (if needed) config file DoorSystemAPI.conf (included in config/)
Specify absolute path to the public/ directory in both DocumentRoot and Directory
ServerName et ServerAlias if needed.

copy le file DoorSystemAPI.conf to /etc/apache2/sites-available/
sudo cp config/DoorSystemAPI.conf /etc/apache2/sites-available/
sudo a2ensite DoorSystemAPI.conf
sudo systemctl restart apache2

Server is now up and running

## Usage
Send HTTP request, you get answer

will make the readme better and more useful when I feel like it.