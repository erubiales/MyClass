<?php
include_once 'kernel.inc.php';
include_once 'RepositorioUsuario.inc.php';
include_once 'Redireccion.inc.php';
include_once 'Usuario.class.php';

$conexion = new conexion();
$conexion->conectarBD();
$kernel = new kernel();

$avatar=date('m/d/Y h:i:s a', time());;
//se trae los datos del formulario por post.

$emailForm = $kernel-> encrypt_decrypt("encrypt",$_POST['Email']);
$passFormRep = $kernel-> encrypt_decrypt("encrypt",$_POST['PasswordRep']);
$nombreForm = $kernel-> encrypt_decrypt("encrypt",$_POST['nombreCompleto']);
$familiaForm = $_POST['familia'];
$edadForm = $_POST['edad'];
$sexoForm = $_POST['sexo'];
$checkForm = $_POST['check'];
//$avatar = $_POST['avatar'];

/*
echo $emailForm;
echo $passForm;
echo $passFormRep;
echo $nombreForm;
echo $familiaForm;
echo $edadForm;
echo $sexoForm;
echo $checkForm;
*/


    
    $conexion = conexion::getConexion();
    $aleatorio= RepositorioUsuario::GenerarCodigoUsuario($conexion); 



$usuario= new Usuario($emailForm, $nombreForm,$aleatorio, $passFormRep, $sexoForm, $familiaForm, "null", $edadForm, "null", $avatar);


$usuario_insertado=RepositorioUsuario::setUsuario($conexion,$usuario);

if($usuario_insertado){

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "contacto@myclass.es";
    $to = $_POST["Email"];
    $subject = "Confirmación de cuenta";
    $message = "Por favor haga click en el link para confirmar la cuenta de usuario de myClass. www.google.es";
    $headers = "Desde:" . $from;
    mail($to,$subject,$message, $headers);
      
header ("Location: ../Bienvenido");


}else {
    echo "No te has podido registrar";
}


/*bootbox.alert({
    message: "This is an alert with additional classes!",
    className: 'rubberBand animated'
});  */