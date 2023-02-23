<h2 class="subtitulos my-4 text-center">Gestionar pedidos</h2>
<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">COSTE</th>
      <th scope="col">FECHA</th>
      <th scope="col">ESTADO</th>
      <th scope="col">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
      <?php while($pedido = $pedidos->fetch_object()) : ?>
    <tr>
      <th><?=$pedido->id_pedido?></th>
      <td><?=$pedido->coste?> $</td>
      <td><?=$pedido->fecha?></td>
      <td><?=$pedido->estado_pedido?></td>
      <td><a href="<?=base_url?>pedido/detalle&id=<?=$pedido->id_pedido?>" class="links">Detalle</a></td>
    </tr>
    
    <?php endwhile; ?>
    
  </tbody>
</table>


