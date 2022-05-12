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
            <td width='20' style='font-weight: bold'>NOTA</td>    
            <td width='400' style='font-weight: bold'>COMENTARIO</td>    
        </tr>
            
<?php

    $db = mysqli_connect('localhost', 'root', '1234', 'todopulpodb') or die('Fail');
    $query = "SELECT tRestaurante.nombre,tRestaurante.direccion,tRestaurante.provincia,tValoracion.nota,tValoracion.comentario FROM tRestaurante JOIN tValoracion ON tRestaurante.id = tValoracion.idrestaurante";
   
    $result = mysqli_query($db, $query) or die('Query error');
  

    

    while ($registro = mysqli_fetch_array($result)){
    echo "
        <tr>
        <td width='150'>".$registro['nombre']."</td>
        <td width='250'>".$registro['direccion']."</td>
        <td width='150'>".$registro['provincia']."</td>
        
        <td width='20'>".$registro['nota']."</td>
        <td width='400'>".$registro['comentario']."</td>
        
        </tr>
        ";
       }

    mysqli_close($db);
?>
        </table>
      </div>
        
    </body>
</html>

