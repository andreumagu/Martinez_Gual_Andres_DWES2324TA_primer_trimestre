<?php
session_start(); // Iniciar Sesión
session_destroy(); // Cerrar Sesión
setcookie('remember_username', '', time() - 3600, '/'); // Eliminar la cookie
setcookie('remember_password', '', time() - 3600, '/'); // Eliminar la cookie
header("Location: login.html"); // Redirige a la página de inicio de sesión
exit();
?>
