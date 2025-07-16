<?php

session_start();

include("conexion.php"); //Conexión a la BD

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    //Verificar si el usuario existe
    $query = "SELECT * FROM usuarios where email = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind-param("s", $email);
    $stmt->execute();
    $result = stmt->get_result();
    $user = $result->fetch_assoc();

    if (user && password_verify($password, $user['password'])) {
        // Si el login es exitoso, iniciamos la sesión
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nombre'];
        header("Location: index.php"); // Redirigir al usuario al inicio
        exit();
    } else {
        echo "<p>Correo electrónico o contraseña incorrectos</p>";
    }
}
?>