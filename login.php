<?php
session_start();

// Conexión a la base de datos (puedes reutilizar tu conexión existente)
include('model/conexion.php'); // conexion bd


$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Consulta para verificar las credenciales del usuario
$query = "SELECT * FROM usuarios WHERE username = '$usuario' AND password = '$contrasena";
$result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) == 1) {
    // Inicio de sesión exitoso
    $_SESSION['usuario'] = $usuario;
    header("Location: index.php"); //  página principal de  CRUD
} else {
    // Error de inicio de sesión
    echo "Nombre de usuario o contraseña incorrectos";
}

mysqli_close($conexion);
?>

