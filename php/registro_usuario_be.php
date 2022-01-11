<?php

include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

$query = "INSERT INTO usuarios(nombre_completo,correo,usuario,pass)
 VALUES ('$nombre_completo','$correo','$usuario','$pass')";

$verificar_correo = mysqli_query($conexion,"Select * FROM usuarios where  correo = '$correo' ");
if(mysqli_num_rows($verificar_correo)> 0){
echo'
 <script>
  alert ("Este correo ya esta registrado, intenta con otro diferente");
  window.location = "../login.html";
 </script>

';
exit();
}


$verificar_usuario = mysqli_query($conexion,"Select * FROM usuarios where  usuario = '$usuario' ");
if(mysqli_num_rows($verificar_usuario)> 0){
echo'
 <script>
  alert ("Este usuario ya esta registrado, intenta con otro diferente");
  window.location = "../login.html";
 </script>

';
exit();
}


$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo '
       <script>
       alert("Usuario almacenado exitosamente");
       window.location = "../login.html";
       </script>
    ';
}else{
    echo'
    <script>
    alert("intentelo de nuevo, usuario no almacenado");
       window.location = "../login.html";
    
    </script>
    
    ';
}


?>