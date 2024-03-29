<?php



/*
Version 1.1


CEO:
Emilio Rubiales
Carlos Gonzales
Jorge Segade
Adrian Sanchez
*/


?>


<?php
include_once 'app/conexion.inc.php';

/**
 * Indexar URL
 */


/**
 * www.myclass.es/pagina
 * 
 */
$titulo;

$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$uri_segments = array_filter($uri_segments);
$uri_segments = array_slice($uri_segments, 0);


$ruta_elegida = 'vistas/404.php';
$titulo = 'MyClass | 404';


if (empty($uri_segments)) {
    $ruta_elegida = 'vistas/home.php';
    $titulo = 'MyClass | Home';
} else if (count($uri_segments) == 1) {
    switch ($uri_segments[0]) {
        case 'home':
            $ruta_elegida = 'vistas/home.php';

            $titulo = 'MyClass | Home';
            break;
        case 'wip':
            $ruta_elegida = 'vistas/wip.php';
            $titulo = 'MyClass | Mantenimiento';
            break;
    }
} else {
    $ruta_elegida = 'vistas/404.php';
    $titulo = 'MyClass | 404';
}


/**Cuando este todo hecho, retirar la siguiente linea*/
$ruta_elegida = 'vistas/wip.php';
$titulo = 'MyClass | Mantenimiento';



/**
 * Plantilla de abertura 
 */
include_once 'plantillas/doc-declaracion.inc.php';


/**
 * Contentido de la pagina
 */

include_once $ruta_elegida;


/**
 * Plantilla de cierre 
 */

include_once 'plantillas/doc-cierre.inc.php';
