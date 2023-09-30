<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombreAlumno = $_POST["txtNombre"];
    $apellidoAlumno = $_POST["txtApellido"];
    $correoElectronico = $_POST["txtEmail"];
    $costoMensualidad = $_POST["txtCosto"];
    $contacto = $_POST["txtContacto"];
    $genero = $_POST["txtGenero"];
    $edad = $_POST["txtEdad"];
    $fechaInscripcion = $_POST["txtFecha"];
    $nombreResponsable = $_POST["txtNombreR"];
    

    $sentencia = $bd->prepare("UPDATE alumnos SET nombreAlumno = ?, apellidoAlumno = ?, correoElectronico = ?, costoMensualidad = ?, contacto = ?, genero = ?, edad = ?, fechaInscripcion = ?, nombreResponsable = ? WHERE codigo = ?;");
    $resultado = $sentencia->execute([$nombreAlumno, $apellidoAlumno, $correoElectronico, $costoMensualidad, $contacto, $genero, $edad, $fechaInscripcion, $nombreResponsable, $codigo]);
    

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>