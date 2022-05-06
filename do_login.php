<?php
$db = mysqli_connect('localhost', 'root', '1234', 'todopulpodb') or die('Fail');

$email_posted = $_POST['f_email'];
$password_posted = $_POST['f_password'];

$query = "SELECT id, password FROM tUsuario WHERE email = '".$email_posted."'";
$result = mysqli_query($db, $query) or die('Query error');

if (mysqli_num_rows($result) > 0) {  
$only_row = mysqli_fetch_array($result);
  
  echo("fallo vaina linea 13");
  
  echo($only_row[1]);
  
  echo($password_posted);
  
if (password_verify($password_posted, $only_row[1])) {
  
  echo("fallo vaina linea 17");
session_start();  
$_SESSION['user_id'] = $only_row[0];
header('Location: main.php');
  
} else {
echo '<p>Contraseña incorrecta</p>';
  
}
} else {
echo '<p>Usuario no encontrado con ese email</p>';
//echo '<p><a href="login.php">Volver a intentarlo</a></p>'
}
?>
