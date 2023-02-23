
<?php if (isset($plataforma) && is_object($plataforma)):
    $url = base_url."plataforma/save&id=".$plataforma->id_plataforma;
    $titulo = "Editar plataforma";
    $button = "Actualizar";
else:
    $url = base_url."plataforma/save";
    $titulo = "Nueva plataforma";
    $button = "Registrar";
endif; ?>
<form action="<?=$url?>" id="form">
    <h3 class="subtitulos mb-4 text-center"><?=$titulo?></h3>

    <div class="my-2">
        <div class="position-relative">
            <input type="text" class="form-input" id="nombre" <?= isset($plataforma) && is_object($plataforma) ? 'value="'.$plataforma->nombre .'"' : ""; ?> required>
            <label for="nombre">Nombre</label>
        </div>
        <div class="alerta alert-red"></div>
    </div>
    <div class="my-2">
        <div class="position-relative">
            <?php $tipos_plataformas = Utils::showTypePlatforms(); ?>
            <select id="tipo_plataforma" class="form-input">
                <option value="">Seleccionar Tipo de pltaforma</option>
                <?php while($tp = $tipos_plataformas->fetch_object()): ?>
                    <option value="<?=$tp->id_tipo_plataforma?>" <?=isset($plataforma) && is_object($plataforma) && $plataforma->id_tipo_plataforma == $tp->id_tipo_plataforma ? "selected" : "";?>><?=$tp->nombre?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="alerta alert-red"></div>
    </div>
    
    
    <div class="my-4">
        <input type="button" id="btn_save_platform" value="<?=$button?>">
    </div>
    
    <div id="respuesta">

    </div>
  
       <!-- <div class="my-2 alert-general">
            El usuario NO se ha actualizado 
        </div> -->

</form>

