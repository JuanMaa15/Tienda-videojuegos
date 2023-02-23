<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">TIPO PLATAFORMA</th>
      <th scope="col" colspan="2">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
      <?php while($plataforma = $plataformas->fetch_object()) : ?>
    <tr>
      <th><?=$plataforma->id_plataforma?></th>
      <td><?=$plataforma->nombre?></td>
      <td><?=$plataforma->tipo_plataforma?></td>
      <td><a href="<?=base_url?>plataforma/editar&id=<?=$plataforma->id_plataforma?>" class="links">Editar</a></td>
      <td><a href="<?=base_url?>plataforma/eliminar&id=<?=$plataforma->id_plataforma?>" class="links">Eliminar</a></td>
    </tr>
    
    <?php endwhile; ?>
    
  </tbody>
</table>