<?php
ini_set('display_errors', 'On');
require __DIR__ . '../db_connection.php';
$db = get_db_connection_or_die();

$name_posted = $_POST['f_name'];
$email_posted = $_POST['f_email'];
$password_posted = $_POST['f_password'];
$password2_posted = $_POST['f_password2'];

echo ($name_posted);
echo ($email_posted);
echo ($password_posted);
echo ($password2_posted);

  

if ($password_posted != $password2_posted) {
echo '<p>Introduce la misma contraseña en los dos campos</p>';
echo '<p><a href='register.php'>Volver a intentarlo</a></p>';
  
} else {
echo ("cualquier vaina");
$password_posted = password_hash($password_posted, PASSWORD_DEFAULT);
$query = "INSERT INTO tUsuario(nombre, email, password) VALUES (".$name_posted.",".$email_posted.",".$password_posted.")";
mysqli_query($db, $query) or die('Error');

}
?>
