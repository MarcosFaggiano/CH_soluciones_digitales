<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$sentencia = $bd->query("select * from clientes");
$clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Rellena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registrado!</strong> Se agregaron los datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>



            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Vuelve a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>



            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cambiado!</strong> Los datos fueron actualizados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Eliminado!</strong> Los datos fueron borrados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de Clientes
                    <!-- INICIO BUSCADOR -->
                    <input type="text" id=buscador class=" form-control form-control-sm" placeholder="Buscar..."> 
                    <!-- INICIO JQUERY -->
                    <script>
                        $(document).ready(function() {
                            $("#buscador").on("keyup", function() {
                                var value = $(this).val().toLowerCase();
                                $("#db_clientes tr").filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                            });
                        });
                    </script>
                    <!--FIN  JQUERY -->
                    <!-- FIN BUSCADOR -->
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">DNI</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="db_clientes">

                            <?php
                            foreach ($clientes as $dato) {
                            ?>

                                <tr>
                                    <td scope="row">
                                        <?php echo $dato->DNI; ?></td>
                                    <td><?php echo $dato->Nombre; ?></td>
                                    <td><?php echo $dato->Apellido; ?></td>
                                    <td><?php echo $dato->Sexo; ?></td>
                                    <td><?php echo $dato->numero_de_telefono; ?></td>

                                    <td><a class="text-success" href="editar.php?DNI=<?php echo $dato->DNI; ?>">
                                            <i class="bi bi-pencil-square"></i></a></td>

                                    <td><a onclick="return confirm('Estas seguro de eliminar?');
                                " class="text-danger" href="eliminar.php?DNI=<?php echo $dato->DNI; ?>"><i class="bi bi-trash"></i></a></td>
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
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">DNI: </label>
                        <input type="number" class="form-control" name="txtDNI" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sexo: <br>
                    </label>
                        <!-- <input type="text" class="form-control" name="txtSexo" autofocus required> -->
                        <input type="radio" name="txtSexo" value="Masculino" required="required" /> Masculino
                        <input type="radio" name="txtSexo" value="Femenino" required="required" /> Femenino
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="number" class="form-control" name="txtnumero_de_telefono" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>