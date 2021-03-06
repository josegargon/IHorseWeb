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
$type = "free-month";

//parametros por defecto
$result_form   = false;
$var_idiom = qtrans_getLanguage();
$redirect_url_text = 'Zurück zum Anmeldeformular';
$response_form = 'Ein unerwarteter Fehler ist aufgetreten. Bitte versuchen Sie es zu einem späteren Zeitpunkt noch einmal.';
$register_ok = 'Anmeldung war korrekt durchgeführt. Sie können mit Benutzername und Kennwort aus Formular auf App zugreifen.';
$come_back = 'Zurück zum Anfang';
$user_exist = 'Dieser Benutzername ist bereits in unserer Datenbank vorhanden.';
$use_our_app = 'Jetzt haben Sie auf Ihrem iPad Zugriff auf Dental Horse, indem Sie Ihre ausgewählte E-mail Adresse und Kennwort eingeben.';
if($var_idiom == 'es') {
    $redirect_url_text  = 'Volver al formulario de registro';
    $response_form = 'Ha ocurrio un error al intentar procesar la petición, vuelva a intentarlo de nuevo.';
    $register_ok = 'El registro se realizó correctamente. Ya puede acceder a su aplicación con el usuario y contraseña que indicó en el formulario';
    $come_back = 'Volver al inicio';
    $user_exist = 'El usuario indicado ya existe en nuestra base de datos.';
    $use_our_app = 'Ya puedes acceder a Dental Horse en tu iPad introduciendo el correo y la contraseña que nos has proporcionado';
} elseif ($var_idiom == 'en'){
    $redirect_url_text = 'Comeback to form';
    $response_form = 'Has an error occurred while processing the request, please try again.';
    $register_ok = 'The registration was successful. You can now access your application with the user and password you submitted on the form';
    $come_back = 'Comeback to home';
    $user_exist = 'The user already exists in our database.';
    $use_our_app = 'Now you can access Dental Horse on your iPad by entering the email and password you have chosen.';
}

$redirect_url  = 'http://www.dentalhorse.com/formulario';

if ($email == null || $_POST["password"] == null || $_POST["re_password"] == null || $_POST["password"] != $_POST["re_password"]) {
    //hacer algo
} else {
    $ajax_response_user = array('veterinary' => array('email' => $email, 'password' => $password, 'name' => $name, 'last_name' => $last_name, 'clinic' => null), 'type' => $type);
    $user_response = json_encode($ajax_response_user);
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
                $('#text-response').text('<?php echo $register_ok ?>');

                //enlace
                $('#link-response').attr('href', 'http://www.dentalhorse.com/');
                $('#text-response').addClass('alert-success');
                $('#link-response').text('<?php echo $come_back ?>');

                //enlace a APP
                $('#link-app').show();

            })
            .fail(function(){

                //Cambiamos propiedades de la capa 
                //del texto y de su clase
                $('#text-response').text('<?php echo $user_exist ?>');
            })
        ;
    });
</script>
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
                <?php echo $use_our_app; ?>
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
