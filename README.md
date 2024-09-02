<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center"><a href="https://vuejs.org/" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Vue.js_Logo_2.svg" width="200" alt="Vue Logo"></a></p>

## Requisitos para ejecutar el proyecto

- **[WampServer](https://www.wampserver.com/en/)**
* PHP Version 8.2.0 o mayor
- **[Node ultima versión](https://nodejs.org/en)**
- **[Composer ultima versión](https://getcomposer.org/download/)**
* Administrador de base de datos ([DBeaver])

## Como instalar todo

1) Descargar e instalar WampServer, dar click en "you can download directly", aceptar todo y tildar todas las versiones necesarias
2) Iniciar WampServer, click izquierdo en el icono que se encuentra en la bandeja de iconos ocultos de windows, click en PHP, Version, seleccionar 8.2.0
3) (Puede no necesitarse) Buscar "Variables de entorno" en el buscador de Windows, dar click en variables de entorno, en variables de sistema buscar "Path", seleccionar y click en Editar, agregar o buscar "C:\wamp64\bin\php\php8.2.0". TENER EN CUENTA que si se tiene otras versiones de PHP, esta debe estar por encima de las demás en orden.
4) Instalar la ultima versión de Node desde su página web, instalar
5) Instalar composer desde su pagina web, buscar el link al final de la sección Windows Installes, donde dice Download and run [Composer-Setup.exe]
6) Descargar un Administrador de base de datos y crear una base de datos MySql
7) Crear una carpeta dentro del directorio de Wamp "C:\wamp64\www"
8) Descargar el proyecto desde GitHub dentro de la carpeta anteriormente creada
9) Iniciar una consola de comando dentro de la carpeta del proyecto
10) Ejecutar: 
* composer install 
* npm install
11) Buscar el archivo .env en la raiz del proyecto y definir los datos de conexión a la base de datos (usuario y contraseña, ej: DB_USERNAME=root, DB_PASSWORD= ) y el APP_URL donde se ejecute laravel (ej: http://127.0.0.1:8000/)
12) Ejecutar: 
* php artisan config:cache
* php artisan migrate
* npm run dev
13) Abrir otra consola de comandos en el directorio del proyecto y ejecutar:
* php artisan serve
