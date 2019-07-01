<?php

class ControlSesion{
    
    public static function IniciarSesion($id_usuario, $nombre_usuario){
        if(session_id() == ''){
            session_start();
        }
        
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['cod_usuario'] = $nombre_usuario;
    }
    
    
    public static function CerrarSesion(){
       if(session_id() == ''){
        session_start();
        }
        
        if(isset($_SESSION['id_usuario'])){
            unset($_SESSION['id_usuario']);
        }
        if(isset($_SESSION['cod_usuario'])){
            unset($_SESSION['cod_usuario']);
        }
        session_destroy();
    }
    
    public static function SesionIniciada(){
        if(session_id() == ''){
        session_start();
        }
        
        if(isset($_SESSION['id_usuario']) && ($_SESSION['cod_usuario'])){
            return true;
        } else {
            return false;
        }
    }
}
