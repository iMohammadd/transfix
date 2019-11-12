## Transfix  
a laravel application for wordpress translators team and work management

## Required
- PHP 7.2+
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension  

## Installation  
clone this repository in your server  
`git clone https://github.com/iMohammadd/transfix`
then install dependencies via composer  
`composer install`  
then create a .env file  
`cp .env.example .env`  
then generate a private key for your project via artisan  
`php artisan key:generate`  
then migrate the tables to your database  
`php artisan migrate --seed`