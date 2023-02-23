<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col" colspan="2">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
      <?php while($tp = $tipos_plataformas->fetch_object()) : ?>
    <tr>
      <th><?=$tp->id_tipo_plataforma?></th>
      <td><?=$tp->nombre?></td>
      <td><a href="<?=base_url?>tipoplataforma/editar&id=<?=$tp->id_tipo_plataforma?>" class="links">Editar</a></td>
      <td><a href="<?=base_url?>tipoplataforma/eliminar&id=<?=$tp->id_tipo_plataforma?>" class="links">Eliminar</a></td>
    </tr>
    
    <?php endwhile; ?>
    
  </tbody>
</table>
