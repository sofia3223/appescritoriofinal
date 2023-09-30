<?php include 'template/header.php' ?>

<?php
// se conecta a la BD
include_once "model/conexion.php";
//variable sentencia que llama el objeto 
$sentencia = $bd -> query("select * from alumnos");
//guarda valores de la bd
$alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($alumnos);
?>

<div class="container mt-40">
<div class="row justify-content-center"> 
    <div class="col-md-10">

     <!-- Alerta Inicio-->
     <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


        <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


        <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>      


        <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

        <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>

      <!--Alerta Final-->

    <div class="card">
        <div class="card-header">
            Lista alumnos
        </div>
        <br>
        <div class="p-20">
        <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">codigo</th>
                                <th scope="col">Nombre Alumno</th>
                                <th scope="col">Apellido Alumno</th>
                                <th scope="col">Correo Electronico</th>
                                <th scope="col">Costo Mensualidad</th>
                                <th scope="col">Contacto</th>
                                <th scope="col">Genero</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Fecha de inscripcion</th>
                                <th scope="col">Nombre Responsable</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($alumnos as $dato ){  
                            ?>
                            <tr>
                             <!-- conexion a la BD la tabla  -->
                            <td scope="row"><?php echo $dato->codigo; ?></td>
                            <td><?php echo $dato->nombreAlumno; ?></td>
                            <td><?php echo $dato->apellidoAlumno; ?></td>
                            <td><?php echo $dato->correoElectronico; ?></td>
                            <td><?php echo $dato->costoMensualidad; ?></td>
                            <td><?php echo $dato->contacto; ?></td>
                            <td><?php echo $dato->genero; ?></td>
                            <td><?php echo $dato->edad; ?></td>
                            <td><?php echo $dato->fechaInscripcion; ?></td>
                            <td><?php echo $dato->nombreResponsable; ?></td>

                            <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                            <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>

                           
                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
            </table> 

         </div>
     </div>
    </div>
   
     <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                ingresar datos: 
            </div>
            <!-- Se crea la tabla de resgistro -->
            <form class="p-6" method="POST" action="registro.php">
            <div class="mb-3">
                        <label class="form-label">Nombre Alumno: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Alumno: </label>
                        <input type="text" class="form-control" name="txtApellido" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo Electronico: </label>
                        <input type="email" class="form-control" name="txtEmail" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Costo Mensualidad: </label>
                        <input type="number" class="form-control" name="txtCosto" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contacto: </label>
                        <input type="number" class="form-control" name="txtContacto" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Genero: </label>
                        <input type="text" class="form-control" name="txtGenero" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha inscripcion: </label>
                        <input type="date" class="form-control" name="txtFecha" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre Responsable: </label>
                        <input type="text" class="form-control" name="txtNombreR" autofocus required>
                    </div>
            <!-- Se crea BTN-->         
        <div class="d-grid">
        <input type="hidden" name="oculto" value="1">
        <input type="submit" class="btn btn-primary" value="Registrar">
       
        </div>

        </form>
        </div>

    </div>
</div>
</div>
 <br>  
 <br>          
 <br> 
 <br> 
 <br> 
 <br> 

<?php include 'template/footer.php' ?>