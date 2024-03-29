<?php
if (isset($_SESSION['name_user'])) {
    if ($_SESSION['name_user'] != '') {
        header('Location: http://localhost/myclass/panel-usuario');
    }
}


if(strpos($_SERVER['REQUEST_URI'],'.php')){
    header('Location: ../');
}
?>

<style>
    a:hover {
        text-decoration: none !important;
    }

    @media (max-width: 768px) {
        .container {
            max-width: 720px;
        }

        .display-4 {
            font-size: 1.75rem;
            font-weight: 150;
            line-height: 1;
        }
    }
</style>

<div class="container d-flex justify-content-center ">

    <form method="POST" action="app/comprobarRegistro.php">
        <h1 class="display-4 mb-5 mt-3"><a href="home">myClass</a> Registro</h1>

        <div class="form-row">
            <div class="form-group col-md-6 ">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="Email" required>
            </div>
            <div class="form-group col-md-6 ">
                <label for="inputPassword4">Contraseña (Mínimo 8 caracteres)</label>
                <input id="pwd1" type="password" onfocusout="comprobarPass(1)" class="check-seguridad form-control" name="Password" required>

            </div>
            <div class="form-group col-md-6 ">
                <label for="inputPassword4">Repita la contraseña</label>
                <input id="pwd2" type="password" onfocusout="comprobarPass(2)" class="check-seguridad form-control" name="PasswordRep" required>
            </div>
            <div class="form-group col-md-6 text-center align-self-center ">
                <button class=" form-control col-md-6 btn btn-primary mt-2" type="button" onclick="mostrarContrasena()">Mostrar</button>
            </div>
        </div>


        <!-- 
            2 alertas ocultas, cuando pass2 pierde el foco se va a la función.
        -->
        <div id="success" style="display:none" class="alert alert-success"><strong>Las contraseñas coinciden</strong></div>
        <div id="danger" style="display:none" class="alert alert-danger"><strong>La contraseña no es válida</strong></div>
        <div class="form-group col-md-7 p-0">
            <label for="inputAddress">Nombre completo</label>
            <input type="text" class="form-control" name="nombreCompleto" required>
        </div>

        <div class="form-row align-items-center">
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Familia Profesional</label>
                <select class="custom-select mr-sm-2" name="familia" required>
                    <option disabled selected value>General</option>
                    <option value="1"> Informática</option>
                    <option value="2">Comercio</option>
                    <option value="3">Mecánica</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 ">
                <label for="inputCity">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="edad" required>
            </div>
            <div class="form-group col-md-6 ">
                <label for="inputState">Sexo</label>
                <select class="custom-select mr-sm-2" name="sexo" class="form-control" required>
                    <option disabled selected value>Sexo</option>
                    <option>Prefiero no contestar</option>
                    <option>Mujer</option>
                    <option>Hombre</option>
                </select>
            </div>
        </div>
        <div class="form-group  p-0">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="check" required>
                <label class="form-check-label" for="gridCheck">
                    Acepto las <a href="condiciones">condiciones de uso</a> de myClass.
                </label>
            </div>
        </div>

        <button id="botonSubmit" type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<!-- modal-->
<div data-toggle="modal" class="modal fade" id="ErrorRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Error. Este correo ya existe.
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Por favor, introduce un correo distinto.
            </div>
            <div class="modal-footer">
                <button type="button" onclick="volver()" class="btn btn-primary" data-dismiss="modal">Perfecto</button>
            </div>
        </div>
    </div>
</div>


<script>
    function volver() {
        var URL = window.location.href.replace("ErrorRegistro", "registro");
        location.href = URL;
    }

    var URLactual = window.location.href;
    if (URLactual.includes("/ErrorRegistro")) {
        $(document).ready(function() {
            $("#ErrorRegistro").modal("show");
        });
    }
</script>

<script type="text/javascript">
    var num;

    function comprobarPass(num) {
        //se recibe el valor de las pass
        var pass1 = document.getElementById("pwd1").value;
        var pass2 = document.getElementById("pwd2").value;
        //se comparan y se comprueba si está alguna vacía
        if (pass1 === pass2 && pass1.length >= 8 && pass2.length >= 8) {
            //se muestra la alerta verde
            document.getElementById('danger').style.display = 'none';

            document.getElementById('success').style.display = 'block';
            document.getElementById('botonSubmit').style.display = 'block';

            /*setTimeout(function() {
                document.getElementById('success').style.display = 'none';
            }, 1000);*/
        } else {
            //se oculta la alerta verde si hubiera

            document.getElementById('success').style.display = 'none';
            document.getElementById('botonSubmit').style.display = 'none';
            //se muestra la alerta roja

            document.getElementById('danger').style.display = 'block';

            //se oculta la alerta roja a los 3s
            /*setTimeout(function() {
                 document.getElementById('danger').style.display = 'none';
             }, 3000);*/
            //se vacían los campos pass
            /*if (num == 2) {
                document.getElementById('pwd1').value = '';
                document.getElementById('pwd2').value = '';
            }*/

        }

    }
</script>

<script>
    function mostrarContrasena() {

        var tipo = document.getElementById("pwd1");
        var tipoRep = document.getElementById("pwd2");
        if (tipo.type == "password" && tipoRep.type == "password") {
            tipo.type = "text";
            tipoRep.type = "text";
        } else {
            tipo.type = "password";
            tipoRep.type = "password";
        }
    }
</script>


<script>
    jQuery(function($) {

        $(".check-seguridad").strength({

            scoreLables: {
                empty: 'Vacío',
                invalid: 'Invalido',
                weak: 'Débil',
                good: 'Bueno',
                strong: 'Fuerte'
            },
            scoreClasses: {
                empty: '',
                invalid: 'label-danger',
                weak: 'label-warning',
                good: 'label-info',
                strong: 'label-success'
            },

        });
    });
</script>