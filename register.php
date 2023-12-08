<?php
include('conexion.php');

// Comprobamos si los campos tienen datos
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    // Recuperar datos del formulario de registro
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Hashear la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Query para insertar un nuevo usuario a la tabla usuarios
        $sql = "INSERT INTO usuarios (username, password, email) VALUES (:username, :password, :email)";
        $stmt = $pdo->prepare($sql);

        // Vincular parámetros y ejecutar la consulta
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // Redirigir a otra página después del registro correcto
        header("Location: login.html");

    } catch (PDOException $e) {
        echo 'Error al registrar el usuario: ' . $e->getMessage();
    }

    // Se cierra la declaración
    $stmt = null;
} else {
    echo 'Error: Los campos no pueden estar vacíos.';
}
?>
