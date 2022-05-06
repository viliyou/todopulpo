!DOCTYPE html>

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
    </body>
</html>
