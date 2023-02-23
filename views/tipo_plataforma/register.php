
<?php if (isset($tipo_plataforma) && is_object($tipo_plataforma)):
    $url = base_url."tipoplataforma/save&id=".$tipo_plataforma->id_tipo_plataforma;
    $titulo = "Editar tipo de plataforma";
    $button = "Actualizar";
else:
    $url = base_url."tipoplataforma/save";
    $titulo = "Nuevo tipo de plataforma";
    $button = "Registrar";
endif; ?>
<form action="<?=$url?>" id="form">
    <h3 class="subtitulos mb-4 text-center"><?=$titulo?></h3>

    <div class="my-2">
        <div class="position-relative">
            <input type="text" class="form-input" id="nombre" <?= isset($tipo_plataforma) && is_object($tipo_plataforma) ? 'value="'.$tipo_plataforma->nombre .'"' : ""; ?> required>
            <label for="nombre">Nombre</label>
        </div>
        <div class="alerta alert-red"></div>
    </div>
    
    
    <div class="my-4">
        <input type="button" id="btn_save_type_platform" value="<?=$button?>">
    </div>
    
    <div id="respuesta">

    </div>
  
       <!-- <div class="my-2 alert-general">
            El usuario NO se ha actualizado 
        </div> -->

</form>

