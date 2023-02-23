<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col" colspan="2">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
      <?php while($categoria = $categorias->fetch_object()) : ?>
    <tr>
      <th><?=$categoria->id_categoria?></th>
      <td><?=$categoria->nombre?></td>
      <td><a href="<?=base_url?>categoria/editar&id=<?=$categoria->id_categoria?>" class="links">Editar</a></td>
      <td><a href="<?=base_url?>categoria/eliminar&id=<?=$categoria->id_categoria?>" class="links">Eliminar</a></td>
    </tr>
    
    <?php endwhile; ?>
    
  </tbody>
</table>