<?php 
function eliminarSessiones(){
    
    Utils::deleteSession('checkRegister');
    
    Utils::deleteSession('errorRegister');
}
if (isset($_SESSION['checkRegister'])) {//SI EXISTE LA SESSION 
    echo "<div id='checkRegister' class='bg-green fs-3 text-light py-2'>".$_SESSION['checkRegister']."</div>";
}else if(isset($_SESSION['errorRegister'])){
    echo "<div id='errorRegister' class='bg-red fs-3 text-light py-2'>".$_SESSION['errorRegister']."</div>";
}
eliminarSessiones();
//ELIMINAR PRODUCTO
if (isset($_SESSION['checkDelete']) && $_SESSION['checkDelete']=='Se elimino con exito') {
    echo $_SESSION['checkDelete'];
}else if(isset($_SESSION['checkDelete']) && $_SESSION['checkDelete']=='NO se pudo eliminar, intentelo más tarde'){
    echo $_SESSION['checkDelete'];
}
Utils::deleteSession('checkDelete');
?>
<h1 class="text-center">Gestión de productos</h1>

<a href="<?=base_url?>producto/vistaFormulario" class="btn btn-success w-25 mb-3">Registrar Producto</a>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Categoria Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Oferta</th>
            <th scope="col">Fecha</th>
            <th scope="col">Imagen</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
         
        <?php    while ($resultado1= $resultado->fetch_assoc()):?>
            <tr>
                <th scope="row"> <?php echo $resultado1['id'];?></th>
                <td><?php echo $resultado1['categoria_id'];?></td>
                <td><?php echo $resultado1['nombre'];?></td>
                <td><?php echo $resultado1['descripcion'];?></td>
                <td><?php echo '$'.$resultado1['precio'];?></td>
                <td><?php echo $resultado1['stock'];?></td>
                <td><?php echo '% '.$resultado1['oferta'];?></td>
                <td><?php echo $resultado1['fecha'];?></td>
                <td><?php echo $resultado1['imagen'];?></td>
                <td><a href="<?=base_url?>producto/delete&id=<?=$resultado1['id'];?>" class="btn btn-danger">Eliminar</a></td>
                <td><a href="<?=base_url?>producto/modificar&id=<?=$resultado1['id'];?>" class="btn btn-warning">Modificar</a></td>
            </tr>
        <?php endwhile; ?>

    
    </tbody>
</table>