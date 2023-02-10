<h1>Gestionar categoria</h1>
<a href="<?= base_url?>categoria/crear" class="btn btn-success fs-5 w-25 my-2">Crear categoria</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
    </tr>
  </thead>
  <tbody>
  <?php while($categoria= $categorias->fetch_assoc()){ ?>
    <tr>
      <th scope="row"><?=$categoria['id'];?></th>
      <td><?= $categoria['nombre'];?></td>
    </tr>
    <?php }?>
  </tbody>
</table>
