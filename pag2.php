<?php
session_start();
/*Mensaje de bienvenida con el nombre de usuario*/
echo "<h1>Bienvenido ".$_SESSION['Usuario']."</h1> ";
$time = time();
/*Te muestra el ultimo acceso*/
echo"Ultimo Acceso: ". date("d-m-Y (H:i:s) "."<br>", $time);

/*Comprueba  si el boton ha sido seleccionado y si es asi te borrara las cookies*/
if(isset($_POST['boton'])) 
{ 
setcookie( "Usuario", "", time()- 60, "/A2","dgonzalez.cesnuria.com", 0);
   setcookie( "Email", "", time()- 60, "/A2","dgonzalez.cesnuria.com", 0);
   setcookie( "Password", "", time()- 60, "/A2","dgonzalez.cesnuria.com", 0);

} 

?>


<html>
    <head>
        <title>Pagina 2</title>
    </head>
    <body>
        
        <a href="index.php">Volver al Formulario</a>
        
        <form action="<?= $SERVER['PHP_SELF'];?>"method="POST">
            <input type="submit" value="Borrar cookies" name="boton"/>
        </form>
    </body>
</html>
