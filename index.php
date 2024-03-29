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
$conexion = new conexion();
$conexion->conectarBD();
$conexion = conexion::getConexion();

include_once 'app/kernel.inc.php';
include_once 'app/RepositorioGrupo.inc.php';
include_once 'app/Grupo.class.php';


/**
 * Indexar URL
 */


/**
 * www.myclass.es/pagina
 * 
 */

$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$uri_segments = array_filter($uri_segments);
$uri_segments = array_slice($uri_segments, 0);


$ruta_elegida = 'vistas/404.php';
$titulo = 'MyClass | 404';


if ($uri_segments[0] == 'myclass') {

    if (count($uri_segments) == 1) {
        $ruta_elegida = 'vistas/home.php';
        $titulo = 'MyClass | Home';
    } else if (count($uri_segments) == 2) {
        switch ($uri_segments[1]) {
            case 'home':
                $ruta_elegida = 'vistas/home.php';

                $titulo = 'MyClass | Home';
                break;
            case 'wip':
                $ruta_elegida = 'vistas/wip.php';
                $titulo = 'MyClass | Mantenimiento';
                break;
            case 'registro':
                $ruta_elegida = 'vistas/registro.php';
                $titulo = 'MyClass | Registro';
                break;
            case 'panel-usuario':
                $ruta_elegida = 'vistas/principal.php';
                $titulo = 'MyClass | Panel de Control';
                break;
            case 'mis-clases':
                $ruta_elegida = 'vistas/mis_clases.php';
                $titulo = 'MyClass | Mis Clases';
                break;
            case 'tarea':
                $ruta_elegida = 'vistas/tarea.php';
                $titulo = 'MyClass | Tarea';
                break;
            case 'condiciones':
                $ruta_elegida = 'vistas/condiciones.php';
                $titulo = 'MyClass | Condiciones de uso';
                break;
            case 'Bienvenido':
                $ruta_elegida = 'vistas/home.php';
                $titulo = 'MyClass | Home';
                break;
            case 'ErrorRegistro':
                $ruta_elegida = 'vistas/registro.php';
                $titulo = 'MyClass | Registro';
                break;
            case 'logout':
                $ruta_elegida = 'vistas/logout.php';
                $titulo = 'MyClass | Logout';
                break;
            case 'NuevaClase':
                $ruta_elegida = 'vistas/crearClase.php';
                $titulo = 'MyClass | Nueva Clase';
                break;
            case 'NuevaTarea':
                $ruta_elegida = 'vistas/crearTarea.php';
                $titulo = 'MyClass | Nueva Tarea';
                break;
            case 'BuscarClase':
                $ruta_elegida = 'vistas/clases_encontradas.php';
                $titulo = 'MyClass | Búsqueda';
                break;
            case 'AgregarAmigo' .
                $ruta_elegida = 'vistas/agregar_amigo.php';
                $titulo = 'MyClass | Agregar Amigo';
                break;
            case 'Credencial':
                $ruta_elegida = 'vistas/cambiar_contrasenia.php';
                $titulo = 'MyClass | Cambiar Contraseña';
                break;
            case 'Calendario':
                $ruta_elegida = 'vistas/calendario.php';
                $titulo = 'MyClass | Calendario de tareas';
                break;
        }
    } else {
        $ruta_elegida = 'vistas/404.php';
        $titulo = 'MyClass | 404';
    }
}





/**
 * Plantilla de abertura 
 */
include_once 'plantillas/doc-declaracion.inc.php';


/**
 * Contentido de la pagina
 */

include_once $ruta_elegida;

include_once 'plantillas/doc-cierre.inc.php';
