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
        <table border='1' cellpadding='0' cellspacing='0' width='1200' bgcolor='#F6F6F6' bordercolor='#FFFFFF'>
    
        <tr>
            <td width='300' style='font-weight: bold'>NOMBRE</td>
            <td width='400' style='font-weight: bold'>DIRECCIÓN</td>
            <td width='200' style='font-weight: bold'>PROVINCIA</td>  
            <td width='20' style='font-weight: bold'>NOTA</td>    
            <td width='700' style='font-weight: bold'>COMENTARIO</td>    
        </tr>
            
<?php

    $db = mysqli_connect('localhost', 'root', '1234', 'todopulpodb') or die('Fail');



    //$query = "SELECT tRestaurante.nombre,tRestaurante.direccion,tRestaurante.provincia,tValoracion.nota,tValoracion.comentario FROM tRestaurante JOIN tValoracion ON tRestaurante.id = tValoracion.idrestaurante";
   
    $busqueda1 = "SELECT id,nombre,direccion,provincia FROM tRestaurante";

    //$notamedia = ""

    $result = mysqli_query($db, $busqueda1) or die('Query error');
   

    $results = mysqli_num_rows($result);

           if ($results>0){         

    while ($registro = mysqli_fetch_array($result)){

        $busqueda2 = "SELECT nota,comentario FROM tValoracion  WHERE idrestaurante=".$registro['id'] ;
        // echo ($busqueda2);
        $result2 = mysqli_query($db, $busqueda2) or die('Query error 2');        
        $division = mysqli_num_rows($result2);
        
        while($registro2 = mysqli_fetch_array($result2)){

            $notamedia = $notamedia + $registro2[0];
           $comentario = $registro2[1].('\n').$comentario ;
            echo ($registro2[1]);
            //$comentario = $registro2[1];
            $division = $division + 1;
            
        }

        $notamedia = $notamedia/$division;
        $notamedia = round($notamedia);
        echo ($division);

        echo "   <tr> ";
        echo "   <td width='300'>".$registro['nombre']."</td>";
        
        echo "   <td width='400'>".$registro['direccion']."</td>";
        echo "   <td width='200'>".$registro['provincia']."</td>";
        echo "   <td width='400'>".$notamedia."</td>";
        echo "   <td width='200'>".$comentario."</td>";
        

        echo "   </tr>";
      }
       }

    mysqli_close($db);
?>
        </table>
      </div>
        
    </body>
</html>
