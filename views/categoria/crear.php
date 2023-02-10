<h1 class="text-center">Crear categoria</h1>
<form action="<?=base_url ?>categoria/save" method="POST">
    <div class="mb-3">
        <label class="form-label" for="nombre">Nombre</label>
        <input class="form-control" type="text" name="nombreCategoria" id="nombre">
    </div>
    <button type="submit" name="crearCategoria" class="btn btn-success">Crear Categoria</button>
</form>
<?php
if(isset($_SESSION['erroresCat'])){
    foreach($_SESSION['erroresCat'] as $errores){
        echo '<h1>'.$errores.'</h1>';
    }
}