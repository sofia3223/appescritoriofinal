
<?php
//se hace una validacion
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"]) || empty($_POST["txtEmail"]) || empty($_POST["txtCosto"])|| empty($_POST["txtGenero"])|| empty($_POST["txtEdad"])|| empty($_POST["txtFecha"])|| empty($_POST["txtNombreR"])){
      header('Location: index.php?mensaje=falta');
        exit();
    }
// llama a la conexion
    include_once 'model/conexion.php';
    //guarda kas variables 
    $nombreAlumno = $_POST["txtNombre"];
    $apellidoAlumno = $_POST["txtApellido"];
    $correoElectronico = $_POST["txtEmail"];
    $costoMensualidad = $_POST["txtCosto"];
    $contacto = $_POST["txtContacto"];
    $genero = $_POST["txtGenero"];
    $edad = $_POST["txtEdad"];
    $fechaInscripcion = $_POST["txtFecha"];
    $nombreResponsable = $_POST["txtNombreR"];
    
    //llama a la BASE DE DATOS que va a preparar la consulta
    $sentencia = $bd->prepare("INSERT INTO alumnos(nombreAlumno,apellidoAlumno,correoElectronico,costoMensualidad,contacto,genero,edad,fechaInscripcion,nombreResponsable) VALUES (?,?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombreAlumno,$apellidoAlumno,$correoElectronico,$costoMensualidad,$contacto,$genero,$edad,$fechaInscripcion,$nombreResponsable]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
 
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>