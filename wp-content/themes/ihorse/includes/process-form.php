<?php
//get the form elements and store them in variables
$email=$_POST["email"];
$name=$_POST["name"];
$last_name=$_POST["last_name"];
$password=$_POST["password"];
$clinic=$_POST["clinic"];

$ajax_response = array(
    'success'   => true,
    'reason'    => $name
);
echo "nada";
//Redirects to the specified page
header("Location: ihorse.web.me/");
wp_die();
if ( defined( 'DOING_AJAX' ) && DOING_AJAX ){
    echo json_encode( $ajax_response );
}
?>