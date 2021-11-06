<?php
if(isset($_POST['email'])) {

<bold>// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias</bold>
$email_to = "caribai93@gmail.com";
$email_from = "caribai93@gmail.com";
$email_subject = "Contacto desde el sitio web";

<bold>// Aquí se deberían validar los datos ingresados por el usuario</bold>
if(!isset($_POST['nombre']) ||
!isset($_POST['telefono']) ||
!isset($_POST['email']) ||
!isset($_POST['municipio']) ||
!isset($_POST['direccion']) ||
!isset($_POST['tipo']) ||
!isset($_POST['superficie']) ||
!isset($_POST['mensaje'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $_POST['nombre'] . "\n";
$email_message .= "Telefono: " . $_POST['telefono'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Municipio: " . $_POST['municipio'] . "\n";
$email_message .= "Direccion: " . $_POST['direccion'] . "\n";
$email_message .= "Tipo: " . $_POST['tipo'] . "\n";
$email_message .= "Superficie: " . $_POST['superficie'] . "\n";
$email_message .= "Mensaje: " . $_POST['mensaje'] . "\n\n";


<bold>// Ahora se envía el e-mail usando la función mail() de PHP</bold>
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

echo "¡El formulario se ha enviado con éxito!";
}
?>