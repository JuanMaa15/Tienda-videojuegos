<form action="<?= base_url ?>usuario/save&id=<?=$id?>" method="POST" id="form_categoria">
    <h3 class="subtitulos mb-4 text-center">Mis datos</h3>

    <div class="my-2">
        <div class="position-relative">
            <input type="text" class="form-input" name="nombre" value="<?=$usuario->nombre?>" required>
            <label for="nombre">Nombre</label>
        </div>
        <?= isset($_SESSION['errores']['nombre']) ? Utils::errores($_SESSION['errores'], 'nombre') : ""; ?>
    </div>
    <div class="my-2">
        <div class="position-relative">
            <input type="text" class="form-input" name="apellido" value="<?=$usuario->apellido?>" required>
            <label for="apellido">Apellido</label>
        </div>
        <?= isset($_SESSION['errores']['apellido']) ? Utils::errores($_SESSION['errores'], 'apellido') : ""; ?>
    </div>
    <div class="my-2">
        <div class="position-relative">
            <input type="text" class="form-input" name="telefono" value="<?=$usuario->telefono?>" required>
            <label for="telefono">Telefono</label>
        </div>
        <?= isset($_SESSION['errores']['telefono']) ? Utils::errores($_SESSION['errores'], 'telefono') : ""; ?>
    </div>
    <div class="my-2">
        <div class="position-relative">
            <input type="text" class="form-input" name="email" value="<?=$usuario->email?>" required>
            <label for="email">Correo electrónico</label>
        </div>
        <?= isset($_SESSION['errores']['email']) ? Utils::errores($_SESSION['errores'], 'email') : ""; ?>
    </div>
    
    <div class="my-4">
        <input type="submit" name="submit" value="Actualizar">
    </div>
    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == "complete"): ?>
        <div class="my-2 alert-general green">
            El usuario se ha actualizado correctamente 
        </div>
    <?php elseif (isset($_SESSION['usuario']) && $_SESSION['usuario'] == "failed"): ?>
        <div class="my-2 alert-general">
            El usuario NO se ha actualizado 
        </div>
    <?php endif; ?>
    <?php Utils::deleteSession('usuario'); ?>
    <?php Utils::deleteSession('errores'); ?>

</form>