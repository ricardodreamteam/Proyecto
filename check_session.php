<?php
session_start();

if (isset($_SESSION['nombrePerfil'])) {
  echo "true";
} else {
  echo "false";
}
?>