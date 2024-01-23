<?php
include("connection.php");
if (!$conn) {
    die("La conexión ha fallado: " .mysqli_connect_error());
}

if (isset($_POST['btnGuardarInfo'])) {
   echo "<script language='javascript'> alert('FUNSIONAAAAAA');</script>";
}

mysqli_close($conn);
?>
<script ></script>