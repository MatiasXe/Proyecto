<?php      
    include('logout.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
       
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "SELECT * FROM usuarios WHERE usuario = '$username' and contraseña = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Logeado correctamente </center></h1>";  
        }  
        else{  
            echo "<h1>Fallo en el Login. Invalido Usuario o Contraseña</h1>";  
        }
?>