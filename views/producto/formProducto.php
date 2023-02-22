<h1 class="text-center">Crea tu Producto </h1>
    
    <?php
        if (isset($resultadoFinal)) {

            echo '<br>';
            while ($obj = $resultadoFinal->fetch_assoc()) {
                
                $resultadoSave= $obj;
            }
            $editar=true;
            var_dump($resultadoSave);
        }
?>

<?php $resultadoCat=Utils::allCategoria();

?>
<form action="<?=base_url?>producto/save" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" 
        value="<?php if(isset($editar)) {
            echo $resultadoSave['nombre'];
        }?>">
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea name="descripcion" id="descripcion" rows="5" class="form-control"> <?php if (isset($editar)) {
            echo $resultadoSave['descripcion'];}?></textarea>
    </div>

    <select name="categoria" id="categoria" class="form-select mb-3" aria-label="Default select example">
        <option selected>Elige la categoria</option>
        <?php while($categorias=$resultadoCat->fetch_object()):?>
            <option value="<?php echo $categorias->id ?>" <?php echo(isset($resultadoSave)&& $editar && $resultadoSave['categoria_id'] == $categorias->id)?'selected':''; ?> > <?php echo $categorias->nombre;?></option>
        <?php endwhile;?>       
    </select>

    <!--PARSEARLO A INT PRECIO-->
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" name="precio" id="precio" class="form-control" value="<?php echo(isset($resultadoSave) && $editar)? $resultadoSave['precio']:'';?>">
    </div>
    <!--PARSEARLO A INT PRECIO-->
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" id="stock" class="form-control" value="<?php echo(isset($resultadoSave) && $editar)? $resultadoSave['stock']:'';?>">
    </div>
    <!--PARSEARLO A INT PRECIO-->
    <div class="mb-3">
        <label for="oferta" class="form-label">Oferta</label>
        <input type="number" name="oferta" id="oferta" class="form-control" value="<?php echo(isset($resultadoSave) && $editar)? $resultadoSave['oferta']:'';?>">
    </div>

    <div class="mb-3">
        <?php if(isset($resultadoSave) && $editar): ?>
             <img src="<?php echo base_url?>uploads/images/<?=$resultadoSave['imagen'];?>" class="imgR">
        <?php endif;?>
        

        <input type="file" name="imagen">
    </div>
    <input type="submit" value="Crear producto">

</form>

        