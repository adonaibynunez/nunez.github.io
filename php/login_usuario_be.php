<?php
session_start();
 include 'conexion_be.php';

 $correo = $_POST['correo'];
 $pass = $_POST['pass'];

 $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' and pass='$pass' ");

 if(mysqli_num_rows($validar_login)> 0){
     $_SESSION['usuario'] =$correo;
     header("location: ../original.html");
      exit();
 }else{
     echo'
     <script>
     alert ("Usuario o contraseña incorrectas , por favor verifique los datos ingresados");
     window.location = "../login.html";
    </script>
   
   ';
   exit();
 }

?>