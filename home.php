<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Boostrap scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    <header class="container">
        <h1 class="text-center mt-3">Home</h1>
    </header>
    <div class="container pt-5" id="contenedor">
        <!-- Contenido dinámico cargado por JavaScript -->
        <h3 id="mensajeUsuario"></h3>
        
        <script>
            <?php
                // Iniciamos la sesión y obteneos el nombre de usuario
                session_start();
                $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
            ?>

            // Recuperar el nombre de usuario de la cookie
            var rememberUsername = "<?php echo isset($_COOKIE['remember_username']) ? $_COOKIE['remember_username'] : ''; ?>";
            var rememberPassword = "<?php echo isset($_COOKIE['remember_password']) ? $_COOKIE['remember_password'] : ''; ?>";
            

            // Utilizar el nombre de usuario que tenga valor
            var username = rememberUsername || "<?php echo $username; ?>";

            // Mostrar el nombre de usuario en la página
            var username = "<?php echo $username; ?>";
            var mensajeUsuario = document.getElementById('mensajeUsuario');

            // Entroducimos el contenido en el html dependiendo se si se ha iniciado sesión o no
            if (username) {
                mensajeUsuario.textContent = 'Bienvenido, ' + username + '.';
            } else {
                mensajeUsuario.textContent = 'No has iniciado sesión.';
            }
        </script>
        <a href="logout.php">Cerrar Sesión</a>
    </div>

</body>
</html>