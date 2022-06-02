<?php
//ini_set('display_errors', 'On');
//require __DIR__ . 'db_connection.php';
//$db = get_db_connection_or_die();

$db = mysqli_connect('localhost', 'root', '1234', 'todopulpodb') or die('Fail');

$nota_posted = $_POST['f_nota'];
$comentario_posted = $_POST['f_comentario'];
$usuario_posted = $_POST['f_idusuario'];
$restaurante_posted =$_POST['f_idrestaruante'];
  


//echo ($nota_posted);
//echo ($comentario_posted);


  


$query = "INSERT INTO tValoracion(idusuario, idrestaurante, nota, comentario) VALUES (".$usuario_posted.",".$restaurante_posted.",".$nota_posted.",'".$comentario_posted."')";
echo ($query);
mysqli_query($db, $query) or die('Error');
//echo '<p>Usuario registrado</p>';
//echo '<p><a href="login.php">Loguearse</p>';


header("Location: main.php");

?>
