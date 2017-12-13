<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Email Send App 

Clonar e instalar proyecto

```php
$ git clone https://github.com/danielpro4/SendMail.git SenderApp
$ composer install
```

Comando de php artisan para ejecutar las migraciones
```php
$ php artisan migrate:fresh
```
Comando para cargar la base de datos de pruebas
```php
$ php artisan db:seed
```

Comando para cargar la base de datos real
```php
$ php artisan message:seed
```
Comando para levantar la app
```php
$ php artisan serve
```

Comando para programar los mensajes
```php
$ php artisan message:schedule
```

Comando para enviar los mensajes programados que cumplan las restricciones de fecha y estado
```php
$ php artisan email:send
```

Usuario y contraseña para admin - Vista de mensajes
```php
$user = 'daniel.perez.atanacio@gmail.com'
$pass = 's3cr3t'
```

Consultar resumen de mensajes programados
```mysql

SELECT DATE(scheduled_at) AS scheduled_at, count(*) AS count
 FROM schedules

GROUP BY DATE(scheduled_at)
```


## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
