<?php
include("connection.php");
if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
} 

//error_reporting(0); //No me muestra errores.

if (isset($_POST['logbtn'])) {
   

    if (isset($_POST['nombre']) && isset($_POST['password'])) {
        
        $logName = trim($_POST['nombre']);
        $logPassword = trim($_POST['password']);
        $sql = "SELECT * FROM PERFIL WHERE alias = '$logName' ";
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)){
                $passPerfil= $row['pass'];
            }
            if($passPerfil === $logPassword){
                while ($row = mysqli_fetch_assoc($result2)) {
                    $_SESSION ['apellidosPerfil']= $row['apellidos'];
                    $_SESSION ['postalPerfil']= $row['codigo_postal'];
                    $_SESSION ["direccionPerfil"]= $row['direccion'];
                    $_SESSION ['dniPerfil']= $row['dni'];
                    $_SESSION ['emailPerfil']= $row['email'];
                    $_SESSION ['localidadPerfil']= $row['localidad'];
                    $_SESSION ['nombrePerfil']= $row['nombre'];
                    $_SESSION ['numtelfPerfil']= $row['numero_telefono'];
                    $_SESSION ['provinciaPerfil']= $row['provincia'];
                    $_SESSION ['generoPerfil']= $row['genero'];
                    $_SESSION ['aliasPerfil'] = $row['alias'];
                }
                echo"<script language='javascript'>
                location.href='profileInfo.php';
                </script>
                ";
            }else{
                echo "Usuario o contraseña incorrectos";
                echo"<script language='javascript'>
                location.href='login.php';
                </script>
                ";
                // session_destroy();
            }
        }else{
            echo "No se ha encontrado al usuario";
            // session_destroy();
        }
    }
}
mysqli_close($conn);
?>