## Install

### System requirements

- PHP:  ^8.0
- Git

#### Installation

Run command: `git clone git@github.com:sergeysksa/transdoc_test_task.git`

copy `.env.example` to `.env`

#### Nginx config

```
    server {
        listen 80;
        root /var/www/transdock_test_task/public;
        index index.php index.html index.htm;
        server_name transdoc.loc;


       location / {
               try_files $uri $uri/ /index.php?$query_string;
       }
       location ~ \.php$ {
               try_files $uri =404;
               fastcgi_split_path_info ^(.+\.php)(/.+)$;
               fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
               fastcgi_index index.php;
               fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
               include fastcgi_params;
        fastcgi_read_timeout 1000;
       }      
    }
```

Create DB in your PhpMyAdmin.

In the  `.env` 

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yourbasename
DB_USERNAME=youruser
DB_PASSWORD=your user password for DB
```

Run commands: 
- `composer install`
- `php artisan optimize`
- `php artisan migrate --seed`
- `npm i`
- `npm run build`
- open in browser 'http://localhost'

Possible error `/storage/logs/laravel.log" could not be opened: failed to open stream: Permission denied`
Fixed

``sudo chown -R $USER:www-data storage``

``sudo chown -R $USER:www-data bootstrap/cache``


##### Credentials:

Admin creds:

Username: admin@transdoc.com
Password: password

User creds:

Username: user@transdoc.com
Password: password
