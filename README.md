# Skeleton PHP

Skeleton PHP es una librería para el desarrollo rápido de aplicaciones web, 
que implementa el patrón MVC y DAO, y usa las mejores prácticas y herramientas front-end. 
Skeleton PHP NO debe confundirse con un framework para el desarrollo de aplicaciones complejas.

## Getting Started
Esta librería requiere [Stylus](http://learnboost.github.io/stylus/) y 
[grunt-contrib-concat](https://github.com/gruntjs/grunt-contrib-concat) para correr.
Para saber el trabajo que se hace con éste último plugin vea el código del archivo
[Gruntfile.js](https://github.com/jpbaena13/Skeleton/blob/master/Gruntfile.js).


Descargue la librería y descomprimala en su carpeta `/www` del servidor web colocándo 
a la carpeta el nombre del proyecto. A continuación deberá realizar los siguiente cambios 
en `NOMBRE_DEL_PROYECTO` por el nombre real, para los 3 archivos:

#### include/bootstrap.php
```php
/**
 * Nombre del Proyecto 
 */
    if (!defined('PRJCT_NAME'))
        define('PRJCT_NAME', 'NOMBRE_DEL_PROYECTO');
```

#### webroot/js/bootstrap.js

```js
/**
 * Nombre del Proyecto
 */
    var PRJCT_NAME = 'NOMBRE_DEL_PROYECTO'
```

#### .htaccess

```htaccess
ErrorDocument 404 /NOMBRE_DEL_PROYECTO/View/Errors/404.html
```


###Para la instalacion de plugin's corra los siguiente comandos:
```shell
npm install -g grunt-cli
```

Con este comando instala globalmente el plugin `grunt`

```shell
npm install grunt-contrib-concat
```
Con este comando instala localmente en el proyecto el plugin `concat`

```shell
npm install -g grunt-contrib-uglify
```
Con este comando instala globalmente el plugin `uglify`

Finalmente, procese los archivos `main.styl` y `home.styl`  con la herramienta `stylus`, 
y ejecute el comando `grunt` desde la raíz del proyecto.
