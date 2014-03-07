<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<?php
//get the form elements and store them in variables

$email=$_POST["email"];
$name=$_POST["name"];
$last_name=$_POST["last_name"];
$password=$_POST["password"];
$clinic=$_POST["email"];
if ($email == null || $_POST["password"] == null || $_POST["re_password"] == null || $_POST["password"] != $_POST["re_password"]) {
    echo "fallo en el formulario";
} else {

$ajax_response_user = array('veterinary' => array('email' => $email, 'password' => $password, 'name' => $name, 'last_name' => $last_name, 'clinic' => null));
$user_response = json_encode( $ajax_response_user );
$home_location = 'http://www.dentalhorse.com';
$form_location = 'http://www.dentalhorse.com/formulario';
}
?>
<script>
    jQuery(document).ready(function(){
        jQuery.post('http://rest.ihorse.me/app_dev.php/registers', <?php echo $user_response ?>, function(response) {
            })
            .done(function(){
                alert("El usuario se ha creado con éxito.");
                window.location = <?php echo "'" .$home_location."'"  ?>;
            })
            .fail(function(){
                alert("el email pertenece a otro veterinario");
                window.history.back();
            });
    });
</script>
