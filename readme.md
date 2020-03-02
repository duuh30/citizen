Para desenvolvimento deste projeto foi utilizado:
Framework : Laravel 5.5
PHP : Version 7.0
Composer.

Por precisar realizar cadastros utilizando Commands, escolhi o laravel por ter suporte a uma api command bem intuitiva de ser utilizar.

## Requeriments
<pre>
PHP >= 7.0
MySQL
Composer
</pre>

## Composer Install
<pre>
https://getcomposer.org/doc/00-intro.md#locally
</pre>

## Install

<pre>
clone repository
cd /path/clone-repository
composer install
</pre>

## Setup your database

You must create a <code>.env</code> file in your root directory to set up an important environment variables

Some like that:
<pre>
# /path/clone-repository/.env.example
</pre>

## Artisan Generate Key
<pre>
php artisan key:generate
</pre>


## Migrations
Run this command in your project's terminal to create the tables from migrations
<pre>
php artisan migrate
</pre>

## Collection
<pre>
<a href="https://documenter.getpostman.com/view/4843761/SzKZtGr8?version=latest">View Collection</a>
</pre>

## Create citizen by command
Run this command on the terminal
<pre>
cd /path/clone-repository
php artisan citizen:create
</pre>

## API Ready!

Now, you can start the API

<pre>
composer start
<small>Starting server and clear laravel cache</small>
</pre>
Access http://localhost:8000! is a ready.


