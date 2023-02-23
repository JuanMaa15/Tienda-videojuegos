<div class="row my-4">
    <div class="column column-50">
        <h3 class="subtitulos text-center my-3">Datos del pedido</h3>
        <p><span class="fw-bold">Provincia: </span><?=$pedido->provincia?></p>
        <p><span class="fw-bold">Ciudad: </span><?=$pedido->ciudad?></p>
        <p><span class="fw-bold">Direccion: </span><?=$pedido->direccion?></p>
        <p><span class="fw-bold">Coste: </span><?=$pedido->coste?> $</p>
        <p><span class="fw-bold">Fecha: </span><?=$pedido->fecha?></p>
        <p><span class="fw-bold">Hora: </span><?=$pedido->hora?></p>
    </div>
    <?php if (isset($_SESSION['admin'])): ?>
    <div class="column column-50">
        <form action="<?=base_url?>pedido/estado&id=<?=$pedido->id_pedido?>" id="form" class="w-100">
            <h3 class="subtitulos mb-4 text-center">Cambiar estado del pedido</h3>

            <div class="my-2">
                <div class="position-relative">
                    <?php $estados = Utils::showStatusOrder();?>
                    <select class="form-input" id="estado">
                        <option value="">Seleccionar estado</option>
                        <?php while ($estado = $estados->fetch_object()): ?>
                            <option value="<?=$estado->id_estado_pedido?>" <?=$estado->id_estado_pedido == $pedido->id_estado_pedido ? "selected" : "";?> ><?=$estado->nombre?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="alerta alert-red"></div>
            </div>


            <div class="my-4">
                <input type="button" id="btn_save_status_order" value="Cambiar">
            </div>

            <div id="respuesta">

            </div>

               <!-- <div class="my-2 alert-general">
                    El usuario NO se ha actualizado 
                </div> -->

        </form>
    </div>
    <?php endif; ?>
</div>
<?php if (isset($_SESSION['admin'])): ?>
<div class="row my-4">
    <div class="column column-100">
        <h3 class="text-center subtitulos mb-3">Datos del cliente</h3>
    </div>
    <div class="column column-50 text-center">
        <p><span class="fw-bold">Nombre: </span><?=$pedido->nombre_usuario?></p>
        <p><span class="fw-bold">Telefono: </span><?=$pedido->telefono?></p>
    </div>
    <div class="column column-50 text-center">
        <p><span class="fw-bold">Apellido: </span><?=$pedido->apellido?></p>
        <p><span class="fw-bold">Email: </span><?=$pedido->email?></p>
    </div>
</div>
<?php endif; ?>
<div class="row">
    <div class="column column-100">
        <h3 class="subtitulos text-center">Productos</h3>
    </div>
    <div class="column column-100">
        <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">NOMBRE</th>
                <th scope="col">PLATAFORMA</th>
                <th scope="col">UNIDADES</th>
                 <th scope="col">PRECIO</th>
                 <th scope="col">IMAGEN</th>
              </tr>
            </thead>
            <tbody>
                <?php while($pp = $pedido_productos->fetch_object()): ?>
                <tr class="tr-pedido">
                    <th><a href="<?=base_url?>producto/detalle_perfil&id=<?=$pp->id_producto?>"><?=$pp->nombre?></a></th>
                <td><?=$pp->plataforma?></td>
                <td><?=$pp->unidades?></td>
                <td><?=$pp->precio?> $</td>
                <td class="p-2">
                    <?php if(!empty($pp->imagen)): ?>
                    <img src="<?=base_url?>assets/uploads/imgs_products/<?=$pp->imagen?>">
                    <?php else: ?>
                        <img src="<?=base_url?>assets/img/default-img-product.jpg">
                    <?php endif; ?>
                </td>

              </tr>

              <?php endwhile; ?>

            </tbody>
        </table>
    </div>
</div>