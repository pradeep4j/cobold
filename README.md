
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## using composer create new laravel project cobold

To install and setup laravel
First we will download latest version of composer php package manager that install libraries dependent on php.
Then run composer setup and place the installation path to your document root folder of xampp or lamp or wamp. In my case it is d:\xampp\htdocs\ so install composer here.
After installing run following command from d:\xampp\htdocs\ as
Composer global require laravel/installer it will install latest version of laravel.
Now when you have to take new project of laravel just run
Laravel new cobold it will install latest version of laravel on cobold folder
				OR
Run composer create-project laravel/laravel cobold this will also do the same as above laravel new cobold did.

With laravel we have frontend scaffolding 
The Bootstrap and Vue scaffolding provided by Laravel is located in the laravel/ui Composer package, which may be installed using Composer:
With laravel7 following step will setup authentication module automatically
composer require laravel/ui

##Once the laravel/ui package has been installed, you may install the frontend scaffolding using the ui Artisan command: In this case we always use vue frontend scaffolding
// Generate basic scaffolding...
php artisan ui vue
the run npm install && npm run dev

## Generate login / registration scaffolding...
php artisan ui vue --auth
## Finaly run npm install && npm run dev this will setup all js and css file to need in registration and login pages that is assets public/js and public/css 

## I have also included other jquery,bootstrap and css libraries, into files to make my app more interactive.

## for above application I have created two controllers TeamController.php and ExpenseController.ph with two model Expenses.php and User.php.

## Above setup is for me. For you to setup above app go to github.com and serach for 'github.com/pradeep4j/cobold' and download zip file and extract it to your documentroot/cobold path. After this go to that dirctory from cmd and run 'composer update' it will download all php dependency libraries to run your application to this folder.

## open .env file after creating database cobold from phpmyadmin and put 
DB_DATABASE=cobold
DB_USERNAME=root
DB_PASSWORD=

## after this generate new app key as php artisan key:generate and it will generate new app key
## after this run
php artisan migrate  it will ships all tables to your database cobold

##After this create a vertual host by opening a file xampp/apache/conf/extra/httpd-vhosts.conf file
and paste fllowing code and save and restart apache 


<VirtualHost *:80>
    ServerName cobold.localhost
    DocumentRoot D:\xampp\htdocs\cobold\public
     SetEnv APPLICATION_ENV "development"
     <Directory D:\xampp\htdocs\cobold\public>
         DirectoryIndex index.php
         AllowOverride All
         Require all granted
     </Directory>
</VirtualHost>

Now open browser, paste and enter
cobold.localhost

Now go with cobold teams and their expenses app with laravel.


