<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col" colspan="2">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
      <?php while($ep = $estados_pedido->fetch_object()) : ?>
    <tr>
      <th><?=$ep->id_estado_pedido?></th>
      <td><?=$ep->nombre?></td>
      <td><a href="<?=base_url?>estadopedido/editar&id=<?=$ep->id_estado_pedido?>" class="links">Editar</a></td>
      <td><a href="<?=base_url?>estadopedido/eliminar&id=<?=$ep->id_estado_pedido?>" class="links">Eliminar</a></td>
    </tr>
    
    <?php endwhile; ?>
    
  </tbody>
</table>