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
        $usuario = $_SESSION['user_id'];
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
             
            $result2 = mysqli_query($db, $busqueda2) or die('Query error 2');        
            $division = mysqli_num_rows($result2);
            
            if ($result2>0){
                
                //$registro2 = mysqli_fetch_array($result2);
                
                
                
                 
               // echo $registro2[0];
               // echo $notamedia;
                
                 $notamedia =0;
                    $division = 0;
                while($registro2 = mysqli_fetch_array($result2)){
                    
                    $notamedia = ($registro2[0] + $notamedia);
                   
                
                  

                   
                    $comentario = $registro2[1]."<br>".$comentario ;
                    //echo ($registro2[1]);
                    //$comentario = $registro2[1];
                    $division = $division + 1;     
                    
                }
                $notamedia = round($notamedia/$division);
                 
             
            }else{
                
                $notamedia = "no existen puntuaciones";
                $comentario = "no existen comentarios";
            }

        //$notamedia = $notamedia/$division;
        
        //echo ($division);

        echo "   <tr> ";
        echo "   <td width='300'>".$registro['nombre']."</td>";        
        echo "   <td width='400'>".$registro['direccion']."</td>";
        echo "   <td width='200'>".$registro['provincia']."</td>";
        echo "   <td width='400'>".$notamedia. "</td>";
        echo "   <td width='200'>".$comentario."</td>";
        echo "   </tr>";
        
        if (isset($_SESSION['user_id'])) {
        
            echo "   <tr> "; 
            
            echo " <td> ";
            
            
            echo " </td> ";
            echo " <td> ";
            echo " </td> ";
            echo " <td> ";
            echo " </td> ";
            
            echo " <td> ";
            echo "  <form action='do_comment.php' method='post'>";
            
            echo "  <input name='f_idusuario' type='hidden' value=".$usuario." />";
            
            echo "  <input name='f_idrestaurante' type='hidden' value=".$registro['id']." />";
            echo "  <input name='f_nota' type='number' placeholder='nota' />"; 
            echo " </td> ";
            echo " <td> ";
            echo "  <input name='f_comentario' type='text' placeholder='comentario' />";
            //echo " </td> ";
            //echo " <td> ";
            echo "  <input type='submit' value='Enviar' />  "; 
            echo"   </form> ";  
            echo " </td> ";
            echo "   </tr>";        
            
            
             } 
         $comentario= "";   
        
         }
    }

    mysqli_close($db);
 ?>
        </table>
      </div>        
    </body>
</html>
