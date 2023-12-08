<?php
include('conexion.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Comprobar si hay cookies o no
if (isset($_COOKIE['remember_username']) ? $_COOKIE['remember_username'] : '') {
    $_SESSION['username'] = $_COOKIE['remember_username'];
    header("Location: home.php"); // Rediriger a la pagina home
} else {
    // Recuperar datos del formulario de registro
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        // Query para obtener un usuario por nombre de usuario
        $sql = "SELECT * FROM usuarios WHERE username=:username";
        $stmt = $pdo->prepare($sql);

        // Vincular parámetros
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener resultados
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Nombre de usuario válido, verificar contraseña
            if (password_verify($password, $result['password'])) {
                // Verificar si se seleccionó "Recordarme"
                if (isset($_POST['remember'])) {
                    // Establecer una cookie con el nombre de usuario
                    setcookie('remember_username', $username, time() + (86400 * 30), '/');
                    setcookie('remember_password', $password, time() + (86400 * 30), "/");
                }
                // Inicio de sesión válido
                $_SESSION['username'] = $username;
                header("Location: home.php");
            } else {
                // Contraseña inválida
                $errors[] = "Contraseña inválida";
            }
        } else {
            // Nombre de usuario inválido
            $errors[] = "Nombre de usuario inválido";
        }

    } catch (PDOException $e) {
        echo 'Error al realizar la consulta: ' . $e->getMessage();
    }

    // Se cierra la declaración
    $stmt = null;
}

echo "Se ha cerrado la anterior sesión";
?>
