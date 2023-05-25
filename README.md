# Proyecto Bodega Bouffanais Company

Instalacion del programa
-------------
####Programas necesarios

- Visual Studio Code
- Xampp (Php y MySql)
- Laravel 9.x
- Composer
- Node js
- Git
- Postman (Opcional)

####Clonacion del proyecto

`git clone https://github.com/luxcho1/proyectoMusicPro.git`

####Instalacion componentes basicos

`composer install`
`npm install`
`php artisan storage:link`

####Crear el archivo .env
`cp .env.example .env`

Reemplazar database como en la foto
![](https://raw.githubusercontent.com/luxcho1/proyectoMusicPro/main/public/build/assets/Captura%20de%20pantalla%202023-05-25%20182614.png)

> Crear base de datos llamada "musicpro" en phpmyadmin

####Hacer migracion con base de datos
`php artisan migrate:fresh --seed`

####Generar un clave
`php artisan key:generate`

####Ejecutar programa
`php artisan serve`


####Licencia
-------------
Bouffanais Company todos los derechos reservados ©©
