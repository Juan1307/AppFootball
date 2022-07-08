# AppFootball

Esta es un aplicación de football que provee datos de  [Football Api](https://www.football-data.org/).

Esta aplicación se realizo con tecnologias como:

- Laravel 9.
- Vue 3.
- Vite.

### Pasos para ejecutar la App.

Primero tener en cuenta los siguientes requisitos:

- PHP 8.
- Composer 2.1
- XAMPP(Apache y PhpMyAdmin).
- Node 16.13.2

Luego de realizar la instalación de las herramientas requeridas ejecutar lo siguiente.

*** Recuerda: *** hacer un fork o clon de este repositorio.

```composer install``` // para las dependecias de LARAVEL.

```npm install``` // para las dependencias de VUE 3 y VITE.

```npm run dev``` // puerto 3000 - por defecto para servir VUE 3.

```php artisan serve``` // puerto 8000 - por defecto para servir LARAVEL.

Si ya cuenta con el token de su propia Api: Ir a ```.env``` y reemplazar el token que ya tiene registrado ```FOOTBALL_TOKEN="your token"```.

Por último abrir una pestaña en el puerto 8000 para visualizar la App.

### Notas
Generalmente es mala practica dejar el archivo .env disponible, dado que contiene información sensible, en este caso se ha hecho una excepción para poder integrar el token de la api a nuestro servicio.