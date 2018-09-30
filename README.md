# ironcore Repositories


Es una estructura de desarrollo basada en MVC, muy cómodo para trabajar basado en Programación Orientada a Objeto al 100%, posee varios estándares de desarrollo en PHP en el cual tenemos las siguientes implementaciones:
	
	PSR-3  Estandar de Registro de Logs
	PSR-4  Estándar de carga automática
	PSR-7  Interfaz de mensajes HTTP.
	PSR-16 Caché Simple.
	Seguridad de una aplicación web en XSS, CSRF

Así mismo te permite desarrollar aplicaciones de forma más simple ordenada y sin tanta capa de abstracción, se adapta a todo tipo de desarrollo por más compleja que sea, hasta puedes incluir componentes de tercero sin restricciones.

Desarrollo MVC rápido, simple, sin tener que aprender tantas cosas adicionales solo saber las buenas prácticas de desarrollo y patrones de diseños .

### Etiquetas del proyecto
[![Autor](https://img.shields.io/badge/gbolivar-Autor-brightgreen.svg)](https://gregoriobolivar.com)
[![IronCore](https://img.shields.io/badge/ironcore-pre--alpha--01-orange.svg?style=flat-square)](https://github.com/gbolivar/ironcore)
[![Twig](https://img.shields.io/badge/twig-stable-yellow.svg?style=flat-square)](https://twig.symfony.com)
[![Medoo](https://img.shields.io/badge/Medoo-Estable-yellow.svg?style=flat-square)](https://twig.symfony.com)


## Table of Contents

- <a href="#installation">Instalacion</a>
    - <a href="#clonar">Clonar Proyecto</a>
    - <a href="#composer">Composer</a>
    - <a href="#ironcore">ironcore</a>
    - <a href="#config">Configurar Base de Datos</a>

## Instalacion

### Clonar Proyecto

Debes descargar el proyecto desde el repositorio 
```terminal
git clone https://github.com/gbolivar/ironcore.git 
```

### Composer
Debes descargar todos los paquetes de compases

```terminal
cd ironcore
composer install 
```


### ironcore
ironcore es una solución tecnológica basada en simplicidad de 
estructuras de trabajos, la idea de esta arquitectura es simplificar el tiempo de desarrollo y hacer aplicaciones en tiempo record, sin ser un programador de alta gama.

Te permite hacer integraciones modular dentro de la arquitectura podes crear un módulo para ser usado en otros sistema desarrollados con ironcore, todo está basado en PHP igual que las plantillas. 

para ejecutar el  codigo ejecuta los siguientes pasos:

```terminal
php -S localhost:8080 -t public\
```
Listo debes ingresar a tu navegador y colocas localhost:8080


### Configuracion a Base de Datos
Esta permite tener varias base de datos configuradas hasta el momento, Admite todas las bases de datos SQL, incluidas MySQL, MSSQL, SQLite, MariaDB, PostgreSQL, Sybase, Oracle y más
 `config/databases.ini`
```php
[default]
    motor = 'pgsql'
    host = 'localhost'
    port = '5423'
    db  = 'miBaseDatos'
    user = 'miUsuario'
    pass = 'miClave'
```
Si necesitas otro puedes agregar mas cambiando el indice ejemplo:

```php
[default]
    motor = 'pgsql'
    host = 'servidor1.localhost'
    port = '3306'
    db  = 'miBaseDatos'
    user = 'miUsuario'
    pass = 'miClave'
    encoding = 'UTF-8'
[base2]
    motor = 'mysql'
    host = 'servidor2.localhost'
    port = '3306'
    db  = 'miBaseDatos'
    user = 'miUsuario'
    pass = 'miClave'
    encoding = 'UTF-8'
[base3]
    motor = 'sqlsrv'
    host = 'servidor3.localhost'
    port = '1432'
    db  = 'miBaseDatos'
    user = 'miUsuario'
    pass = 'miClave'
    encoding = 'UTF-8'
```
El sistema siempre se conecta a default, paro cuando creas mas bases diferente a la defaul debes conectarte a elle pasando el indice de conexion.
