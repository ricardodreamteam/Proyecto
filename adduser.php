<?php

include("connection.php");

if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
} 
error_reporting(0); //No me muestra errores.

if (isset($_POST['btn1'])) {

      
    if (strlen($_POST['alias']) >= 1 && ($password==$rpassword)) {
        
        
        $email = trim($_POST['email']);
        $nombre = trim($_POST['nombre']);
        $apellidos = trim($_POST['apellidos']);
        $dni =trim($_POST['dni']);
        $numero_telefono = trim($_POST['numero_telefono']);
        $direccion = trim($_POST['direccion']);
        $codigo_postal = trim($_POST['codigo_postal']);
        $localidad = trim($_POST['localidad']);
        $provincia = trim($_POST['provincia']);
        $genero = trim($_POST['genero']);
        $alias=trim($_POST['alias']);
        $password=trim($_POST['password']);
        $rpassword=trim($_POST['repeatPassword']);
        
        $consulta = "INSERT INTO PERFIL(email, nombre, apellidos, dni, numero_telefono, direccion, codigo_postal, localidad, provincia, genero, alias, pass) VALUES ('$email','$nombre', '$apellidos', '$dni', '$numero_telefono', '$direccion', '$codigo_postal', '$localidad', '$provincia', '$genero', '$alias', '$password')";
        
        $resultado = mysqli_query($conn,$consulta);
        
      

        if ($resultado) {
           
            echo '<script>alert("Usuario creado correctamente")</script>';
            header("http://proyectofrostgames.batcave.net/index.html");
        } else {
        }
    } else {
        echo '<script>alert("Error al crear Usuario, compruebe los campos de contraseña")</script>';
    }
}
    

mysqli_close($conn);
