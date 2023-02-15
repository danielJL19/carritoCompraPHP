<h1 class="text-center">Crea tu Producto </h1>

<form action="<?php base_url?>producto/save" method="POST" enctype="multipart/formdata">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control">
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea name="descripcion" id="descripcion" rows="5" class="form-control"></textarea>
    </div>
    <!--PARSEARLO A INT PRECIO-->
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" name="precio" id="precio" class="form-control">
    </div>
    <!--PARSEARLO A INT PRECIO-->
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" id="stock" class="form-control">
    </div>
    <!--PARSEARLO A INT PRECIO-->
    <div class="mb-3">
        <label for="oferta" class="form-label">Oferta</label>
        <input type="number" name="oferta" id="oferta" class="form-control">
    </div>

    <div class="mb-3">

        <input type="file" name="imagen">
    </div>
</form>