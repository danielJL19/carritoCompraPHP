<h1 class="text-center">Gestión de productos</h1>

<a href="<?=base_url ?>producto/vistaFormulario" class="btn btn-success w-25 mb-3">Registrar Producto</a>

<table class="table table-striped">
    <thead>
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
        </tr>
    </thead>
    <tbody>
         
        <?php    while ($resultado1= $resultado->fetch_assoc()):?>
            <tr>
                <th scope="row"> <?php echo $resultado1['id'];?></th>
                <td><?php echo $resultado1['categoria_id'];?></td>
                <td><?php echo $resultado1['nombre'];?></td>
                <td><?php echo $resultado1['descripcion'];?></td>
                <td><?php echo $resultado1['precio'];?></td>
                <td><?php echo $resultado1['stock'];?></td>
                <td><?php echo $resultado1['oferta'];?></td>
                <td><?php echo $resultado1['fecha'];?></td>
               
            </tr>
        <?php endwhile; ?>

    
    </tbody>
</table>