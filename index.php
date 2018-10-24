

<?php
session_start();

try{
    /*Accedo al archivo json*/
$dades=(array)json_decode(file_get_contents('app/json.json'));
/*Estoy comprobando si el formulario esta lleno en caso de no ser asi no hara nada*/
if(isset($_POST) && !empty($_POST['pass1']) && !empty($_POST['Email']))
     {
    /*hacemos un foreach del json*/
            foreach ($dades as $dada) 
                {
/*Pasamos el valor de las  variables a String*/
                  $email=htmlspecialchars($_POST['Email']);
                  $pass=htmlspecialchars($_POST['pass1']);
                  /*Compruebo si existe el email y la contraseña*/
                if($dada->email ==$email && $dada->pass == $pass)
                    {
                    /*Si el checkbox esta en uso hara lo siguiente*/
                    if($_POST['check'])
                    {
                        /*Pasando los datos de json a variables de sesion y metiendolas en cookies*/
                          $_SESSION['Usuario']=$dada->name;
                          $_SESSION['Email']=$dada->pass;
                          $_SESSION['Password']=$dada->email;
                           setcookie("Usuario", $dada->name, time()+3600, "/A2", "dgonzalez.cesnuria.com");
                          setcookie("Password",$dada->pass, time()+3600, "/A2", "dgonzalez.cesnuria.com");
                          setcookie("Email",$dada->email, time()+3600, "/A2", "dgonzalez.cesnuria.com");
                          /*Te lleva a la pag2*/
                          header("Location:pag2.php");
                          
                         
                    }
                      
/*Te lleva a la pag2*/
                    header("Location:pag2.php");
                    }
                    
                }
                    
               
      } 
       
}catch(Exception $e){
  echo 'Error:'.$e;
}

?>
<html>
    <head>
        <title>Menu principal</title>
    </head>
    <body>
       
        <h1>LOGIN</h1></br>
 <form action="<?= $SERVER['PHP_SELF'];?>" method="post">
       
       <p>Email: <input type="text" name="Email" value="<?php echo $_COOKIE['Email']; ?>"></p>
       <p>Password: <input type="password" name="pass1" value="<?php echo $_COOKIE['Password']; ?>"></p>
      <input type="checkbox" name="check" /> Recordar Contraseña<br>
      <br> <input type="submit" name="enviar" value="enviar"> 
  </form>
    </body>
</html>


