[![Latest Stable Version](https://poser.pugx.org/paulino-francisco/buscadorlocal/version)](https://packagist.org/packages/paulino-francisco/buscadorlocal)
[![Total Downloads](https://poser.pugx.org/paulino-francisco/buscadorlocal/downloads)](https://packagist.org/packages/paulino-francisco/buscadorlocal)
[![License](https://poser.pugx.org/paulino-francisco/buscadorlocal/license)](https://packagist.org/packages/paulino-francisco/buscadorlocal)
[![Monthly Downloads](https://poser.pugx.org/paulino-francisco/buscadorlocal/d/monthly)](https://packagist.org/packages/paulino-francisco/buscadorlocal)


# A Symfony project created on December 16, 2016, 4:28 pm.
## By Paulino Francisco Angulo Grancha

### buscadorlocal


Pasos para poner a nivel local la aplicación en marcha:

Se debe tener instalado servidor apache, mysql y composer.
Yo realicé este proyecto en wuindows 8.1 – Utilicé xampp, composer y symfony 2.8

El paso “0” es poner en marcha el servidor apache y el mysql

1. Descargar y descomprimir el proyecto.
2. Situarse dentro de la carpeta del proyecto y ejecutar “composer install” o “composer update”
3. Crear en mysql una base de datos con cotejamiento "UTF8-spanish"
4. En el fichero security.yml poner los parámetros para su base de datos.
5. Ejecutar: php app/console doctrine:schema
6. Ir a phpMyAdmin y dentro de la base de datos que haya creado en el paso nº 3, importar el archivo “datos prueba.sql” que adjunto con el proyecto.

Con estos pasos ya están creados los usuarios admin y user. (admin ya tiene asignado el ROLE_ADMIN)
Para usarlos hay que entrar en login y password lo mismo. (Ej: admin – admin)

7. Ejecutar: php app/console server:run

Si todo ha ido bien, ya se puede ir al navegador y poner en la URL:
http://localhost:8000
Si no funciona:
http://127.0.0.1:8000

