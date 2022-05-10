<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>    
    <body> 
        
    <h1>Página principal</h1>
        
    <?php        
    session_start();        
    if (empty($_SESSION['user_id'])) {         
    ?>
        <div class="contenedorLogin">
            <p>No estás logueado <a href='/login.php'> Iniciar Sesión</a>.</p>
        </div>
    <?php
    } else {
    ?>
        <div class="main">
            <p>Estás logueado</p>
        </div>        
     <?php
           }
     ?>        
        
        <div class="restaurantes" align='center'>
<table border='1' cellpadding='0' cellspacing='0' width='600' bgcolor='#F6F6F6' bordercolor='#FFFFFF'>
<tr>
<td width='150' style='font-weight: bold'>NOMBRE</td>
<td width='250' style='font-weight: bold'>DIRECCIÓN</td>
<td width='150' style='font-weight: bold'>PROVINCIA</td>
</tr>
<?php
mysqli_connect("localhost","root","1234","todopulpodb");
mysqli_select_db("todopulpodb");

$query = "select * from tRestaurante"; // Esta linea hace la consulta
$result = mysqli_query($query);

while ($registro = mysqli_fetch_array($result)){
echo "
<tr>
<td width='150'>".$registro['nombre']."</td>
<td width='150'>".$registro['direccion']."</td>
<td width='150'>".$registro['provincia']."</td>
<td width='150'></td>

</tr>
";
}

?>
</table>
</div>
        
        
        
        
    </body>
</html>

