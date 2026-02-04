# NFC door lock
Backend API for unlocking doors electronically with NFC cards.

# Installation
## Prerequisites
Apache2
- libapache2-mod-php
PHP:
- PHP7.4
- php-bcmath
--php-cli
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

One-shot apt install:
doas apt install apache2 libapache2-mod-php php7.4-{bcmath,cli,curl,common,gd,json,mbstring,mysql,tokenizer,xml,zip} composer mariadb-server

Create database DoorSystem; // run in MariaDB, case sensitive!!

On a GNU/Linux serveur (debian based) (using doas, you probably have sudo!)
dans le root du projet entrer les commandes:

doas composer install --no-dev
doas cp .env.example .env

Update .env with all needed info:database name, username and password.
Make sure the selected user has sufficent access to the database (create, update, delete)
grant all privileges on DoorSystem.* to 'user'@'localhost';

doas chown www-data:www-data {absolute route to the projet} // www-data is the Apache2 default user.
doas chmod 775 {absolute route to the projet}

doas php artisan migrate // create tables in db
doas php artisan key:generate // generate encription key

Edit (if needed) config file DoorSystemAPI.conf (included in config/)
Specify absolute path to the public/ directory in both DocumentRoot and Directory
ServerName et ServerAlias if needed.

copy le file DoorSystemAPI.conf to /etc/apache2/sites-available/
doas cp config/DoorSystemAPI.conf /etc/apache2/sites-available/
doas a2ensite DoorSystemAPI.conf
doas systemctl restart apache2

Server is now up and running

## Usage
Send HTTP request, you get answer

will make the readme better and more useful when I feel like it.