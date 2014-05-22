<?php require_once('../../../wp-load.php'); ?>
<?php get_header(); ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<?php

//get the form elements and store them in variables
$email = $_POST["email"];
$name = $_POST["name"];
$last_name = $_POST["last_name"];
$password = $_POST["password"];
$clinic = $_POST["email"];
$type = $_POST["type"];

//parametros por defecto
$result_form   = false;
$response_form = 'Ha ocurrio un error al intentar procesar la petición, vuelva a intentarlo de nuevo.';
$redirect_url  = 'http://www.dentalhorse.com/formulario'.'?type='.$type;
$redirect_url_text  = 'Volver al formulario de registro';

if ($email == null || $_POST["password"] == null || $_POST["re_password"] == null || $_POST["password"] != $_POST["re_password"]) {
    //hacer algo
} else {
<<<<<<< HEAD

$ajax_response_user = array('veterinary' => array('email' => $email, 'password' => $password, 'name' => $name, 'last_name' => $last_name, 'clinic' => null), 'type' => $type);
$user_response = json_encode( $ajax_response_user );

$home_location = 'http://www.dentalhorse.com';
$form_location = 'http://www.dentalhorse.com/formulario'.'?type='.$type;
}
=======
    $ajax_response_user = array('veterinary' => array('email' => $email, 'password' => $password, 'name' => $name, 'last_name' => $last_name, 'clinic' => null), 'type' => $type);
    $user_response = json_encode($ajax_response_user);
>>>>>>> 9e13a0fd13bd59b65cf34722330fe49650e3742c
?>
<script>
    jQuery(document).ready(function(){
        jQuery.post('http://rest.dentalhorse.com/registers', <?php echo $user_response ?>, function(response) {
        })
            .done(function(){

                //Cambiamos propiedades de la capa 
                //del texto y de su clase
                $('#text-response').removeClass('alert-danger');
                $('#text-response').addClass('alert-success');
                $('#text-response').text('El registro se realizó correctamente. Ya puede acceder a su aplicación con el usuario y contraseña que indicó en el formulario');

                //enlace
                $('#link-response').attr('href', 'http://www.dentalhorse.com/');
                $('#text-response').addClass('alert-success');
                $('#link-response').text('Volver al inicio');

                //enlace a APP
                $('#link-app').show();

            })
            .fail(function(){

                //Cambiamos propiedades de la capa 
                //del texto y de su clase
                $('#text-response').text('El usuario indicado ya existe en nuestra base de datos');
            })
        ;
    });
</script>
<<<<<<< HEAD
=======
<?php } ?>

<div class="row-fluid">
    <div class="container">
        <div class="span12" style="margin-top:40px;" id="response-form">
            <h3>Información del registro</h3>
            <p>
                <div class="alert alert-danger" id="text-response">
                    <?php echo $response_form; ?>
                </div>
            </p>
            <p id="link-app" style="margin-bottom:30px;font-size:18px;display:none;"> 
                <i class="icon-exclamation-sign" style="padding-right:6px;"></i>
                Si aún no ha descargado Dentalhorse, podrá hacerlo desde 
                <a href="https://itunes.apple.com/de/app/dental-horse/id860690875?mt=8" target="_blank">
                    <strong>este enlace</strong>
                </a>
            </p>
            <p>
                <a href="<?php echo $redirect_url; ?>" class="btn-info purchase_btn" id="link-response">
                    <?php echo $redirect_url_text;?>
                </a>
            </p>
        </div>
    </div>
</div>

<?php get_footer(); ?>
>>>>>>> 9e13a0fd13bd59b65cf34722330fe49650e3742c
