<?php include 'template/header.php' ?>

<!-- ******* si no existe y si esta viajando por el metodo get una variable llamada codigo  LA VARIABLE QUEVIAJA ES DNI-->
<?php
if (!isset($_GET['DNI'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include_once 'model/conexion.php';
$DNI = $_GET['DNI'];
// ******************
$sentencia = $bd->prepare("select * from clientes where DNI = ?;");
$sentencia->execute([$DNI]);
$clientes = $sentencia->fetch(PDO::FETCH_OBJ);
// print_r($clientes);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">

                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">DNI: </label>
                        <input type="number" class="form-control" name="txtDNI" required value="<?php echo $clientes->DNI; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required value="<?php echo $clientes->Nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido" required value="<?php echo $clientes->Apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sexo: </label>
                        <input type="text" class="form-control" name="txtSexo" required value="<?php echo $clientes->Sexo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="number" class="form-control" name="txtnumero_de_telefono" required value="<?php echo $clientes->numero_de_telefono; ?>">
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="DNI" value="<?php echo $clientes->DNI; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php include 'template/footer.php' ?>