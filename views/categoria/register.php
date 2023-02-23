
<?php if (isset($categoria) && is_object($categoria)):
    $url = base_url."categoria/save&id=".$categoria->id_categoria;
    $titulo = "Editar categoria";
    $button = "Actualizar";
else:
    $url = base_url."categoria/save";
    $titulo = "Nueva categoria";
    $button = "Registrar";
endif; ?>
<form action="<?=$url?>" id="form">
    <h3 class="subtitulos mb-4 text-center"><?=$titulo?></h3>

    <div class="my-2">
        <div class="position-relative">
            <input type="text" class="form-input" id="nombre" <?= isset($categoria) && is_object($categoria) ? 'value="'.$categoria->nombre .'"' : ""; ?> required>
            <label for="nombre">Nombre</label>
        </div>
        <div class="alerta alert-red"></div>
    </div>
    
    
    <div class="my-4">
        <input type="button" id="btn_save_category" value="<?=$button?>">
    </div>
    
    <div id="respuesta">

    </div>
  
       <!-- <div class="my-2 alert-general">
            El usuario NO se ha actualizado 
        </div> -->

</form>

