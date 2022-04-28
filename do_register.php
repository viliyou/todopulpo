<?php
$db = mysqli_connect('localhost', 'root', '1234', 'todopulpodb') or die('Fail');
$name_posted = $_POST['f_name'];
$email_posted = $_POST['f_email'];
$password_posted = $_POST['f_password'];
$password2_posted = $_POST['f_password2'];
if ($password_posted != $password2_posted) {
echo '<p>Introduce la misma contraseña en los dos campos</p>';
echo '<p><a href='register.html'>Volver a intentarlo</a></p>';
} else {
$password_posted = password_hash($password_posted, PASSWORD_DEFAULT);
$query = "INSERT INTO usuario(id_usuario,nombre, email, password)
VALUES ('".$nombre_posted."',".$email_posted.",NULL)";
mysqli_query($db, $query) or die('Error');
echo '<p>Usuario registrado</p>'
echo '<p><a href="login.html">Loguearse</p>'
}
?>
