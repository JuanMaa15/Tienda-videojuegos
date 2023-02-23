
<?php if (isset($estado_pedido) && is_object($estado_pedido)):
    $url = base_url."estadopedido/save&id=".$estado_pedido->id_estado_pedido;
    $titulo = "Editar estado del pedido";
    $button = "Actualizar";
else:
    $url = base_url."estadopedido/save";
    $titulo = "Nuevo estado para los pedidos";
    $button = "Registrar";
endif; ?>
<form action="<?=$url?>" id="form">
    <h3 class="subtitulos mb-4 text-center"><?=$titulo?></h3>

    <div class="my-2">
        <div class="position-relative">
            <input type="text" class="form-input" id="nombre" <?= isset($estado_pedido) && is_object($estado_pedido) ? 'value="'.$estado_pedido->nombre .'"' : ""; ?> required>
            <label for="nombre">Nombre</label>
        </div>
        <div class="alerta alert-red"></div>
    </div>
    
    
    <div class="my-4">
        <input type="button" id="btn_save_status" value="<?=$button?>">
    </div>
    
    <div id="respuesta">

    </div>
  
       <!-- <div class="my-2 alert-general">
            El usuario NO se ha actualizado 
        </div> -->

</form>

