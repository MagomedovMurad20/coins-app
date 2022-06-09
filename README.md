<h1> Проект написан на Laravel v9.17, собран на Dockere. 
Для взаимодействия с Dockeroм использован Sail <a href="https://laravel.com/docs/9.x/sail">Laravel Sail</a>.
После клонирования понадобится выполнение следующих команд в корне проекта: <br/> 
-"docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs"
<br/> 
-"sail up -d"
<br/>
-"sail artisan migrate"
<br/>
-"sail artisan db:seed"
<br/>
После этого перейдите в браузере по адресу 
-"http://localhost:48080/api/get-bonus/{id юзера от 1 до 5 включительно}"
</h1>
<p align="center">
<a href="https://laravel.com" target="_blank">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>