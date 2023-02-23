<div class="row">
    <div class="column column-100">
        <a href="<?=base_url?>producto/crear" class="links link-categoria">Nuevo producto +</a>
    </div>
</div>
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == "complete"): ?>
    
    <div class="my-2 alert-general green">El producto se guardo correctamente</div>
    <?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == "failed"): ?>
    <div class="my-2 alert-general red">El producto NO se guardo</div>
    
    <?php endif; ?>
<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">PRECIO</th>
      <th scope="col">STOCK</th>
      <th scope="col">PLATAFORMA</th>
      <th scope="col" colspan="2">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
      <?php while($producto = $productos->fetch_object()) : ?>
    <tr>
      <th><?=$producto->id_producto?></th>
      <td><a href="<?=base_url?>producto/detalle_perfil&id=<?=$producto->id_producto?>"><?=$producto->nombre?></a></td>
      <td><?=$producto->precio?> $</td>
      <td><?=$producto->stock?></td>
      <td><?=$producto->plataforma?></td>
      <td><a href="<?=base_url?>producto/editar&id=<?=$producto->id_producto?>" class="links">Editar</a></td>
      <td><a href="<?=base_url?>producto/eliminar&id=<?=$producto->id_producto?>" class="links">Eliminar</a></td>
    </tr>
    
    <?php endwhile; ?>
    
  </tbody>
</table>
<?php Utils::deleteSession('producto'); ?>