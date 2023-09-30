<?php include 'template/header.php' ?>
<?php include 'template/footer.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }
 include_once 'model/conexion.php';
 $codigo = $_GET['codigo'];
 $sentencia = $bd->prepare("select * from alumnos where codigo = ?;");
 $sentencia->execute([$codigo]);
 $alumnos = $sentencia->fetch(PDO::FETCH_OBJ);
 //print_r($alumnos)

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="card">
            <div class="class-header">
                Editar datos: 
            </div>
            <!-- Se crea la tabla de resgistro -->
            <form class="p-4" method="POST" action="editarProceso.php">
            <div class="mb-3">
                        <label class="form-label">Nombre Alumno: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required
                        value="<?php echo $alumnos->nombreAlumno; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Alumno: </label>
                        <input type="text" class="form-control" name="txtApellido" autofocus required
                        value="<?php echo $alumnos->apellidoAlumno; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo Electronico: </label>
                        <input type="email" class="form-control" name="txtEmail" autofocus required
                        value="<?php echo $alumnos->correoElectronico; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Costo Mensualidad: </label>
                        <input type="number" class="form-control" name="txtCosto" autofocus required
                        value="<?php echo $alumnos->costoMensualidad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contacto: </label>
                        <input type="number" class="form-control" name="txtContacto" autofocus required
                        value="<?php echo $alumnos->contacto; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Genero: </label>
                        <input type="text" class="form-control" name="txtGenero" autofocus required
                        value="<?php echo $alumnos->genero; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required
                        value="<?php echo $alumnos->edad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha inscripcion: </label>
                        <input type="date" class="form-control" name="txtFecha" autofocus required
                        value="<?php echo $alumnos->fechaInscripcion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre Responsable: </label>
                        <input type="text" class="form-control" name="txtNombreR" autofocus required
                        value="<?php echo $alumnos->nombreResponsable; ?>">
                    </div>
            <!-- Se crea BTN-->         
        <div class="d-grid">
        <input type="hidden" name="codigo" value="<?php echo $alumnos->codigo; ?>">
        <input type="submit" class="btn btn-primary" value="Editar">
        </div>

          </form>
        </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>