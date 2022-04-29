<?php
ini_set('display_errors', 'On');
require __DIR__ . '../db_connection.php';
$db = get_db_connection_or_die();

$name_posted = $_POST['f_name'];
$email_posted = $_POST['f_email'];
$password_posted = $_POST['f_password'];
$password2_posted = $_POST['f_password2'];

if ($password_posted != $password2_posted) {
echo '<p>Introduce la misma contraseña en los dos campos</p>';
echo '<p><a href='register.php'>Volver a intentarlo</a></p>';
} else {
$password_posted = password_hash($password_posted, PASSWORD_DEFAULT);
$query = "INSERT INTO usuario(id_usuario,nombre, email, password)
VALUES ('".$nombre_posted."',".$email_posted.",NULL)";
mysqli_query($db, $query) or die('Error');
echo '<p>Usuario registrado</p>';
echo '<p><a href="login.html">Loguearse</p>';
}
?>
