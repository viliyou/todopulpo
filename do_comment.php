<?php
//ini_set('display_errors', 'On');
//require __DIR__ . 'db_connection.php';
//$db = get_db_connection_or_die();

$db = mysqli_connect('localhost', 'root', '1234', 'todopulpodb') or die('Fail');

$nota_posted = $_POST['f_nota'];
$comentario_posted = $_POST['f_comentario'];
$usuario_posted = $_POST['f_idusuario'];
$restaurante_posted =$_POST['f_idrestaurante'];
  


//echo ($nota_posted);
//echo ($comentario_posted);




  

$query2 = "SELECT nota FROM tValoracion WHERE idrestaurante=".$restaurante_posted;
$notaactual = mysqli_query($db, $query2) or die('Error');
  $nota_posted = ($nota_posted + $notaactual)/2;
$query = "INSERT INTO tValoracion(idusuario, idrestaurante, nota, comentario) VALUES (".$usuario_posted.",".$restaurante_posted.",".$nota_posted.",'".$comentario_posted."')";
echo ($query);
mysqli_query($db, $query) or die('Error');
//echo '<p>Usuario registrado</p>';
//echo '<p><a href="login.php">Loguearse</p>';


header("Location: main.php");

?>
