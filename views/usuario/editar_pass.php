<form action="<?= base_url ?>usuario/savePass&id=<?=$id?>" method="POST">
    <h3 class="subtitulos mb-4 text-center">Cambiar Contraseña</h3>

    
    <div class="my-2">
        <div class="position-relative">
            <input type="password" class="form-input" name="password_antigua" required>
            <label for="email">Contraseña antigua</label>
        </div>
        <?= isset($_SESSION['errores']['password_antigua']) ? Utils::errores($_SESSION['errores'], 'password_antigua') : ""; ?>
    </div>
    
    <div class="my-2">
        <div class="position-relative">
            <input type="password" class="form-input" name="password_nueva" required>
            <label for="email">Contraseña nueva</label>
        </div>
        <?= isset($_SESSION['errores']['password_nueva']) ? Utils::errores($_SESSION['errores'], 'password_nueva') : ""; ?>
    </div>
    
    <div class="my-4">
        <input type="submit" name="submit" value="Actualizar">
    </div>
    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == "complete"): ?>
        <div class="my-2 alert-general green">
            La contraseña se ha actualizado correctamente 
        </div>
    <?php elseif (isset($_SESSION['usuario']) && $_SESSION['usuario'] == "failed"): ?>
        <div class="my-2 alert-general">
            La contraseña NO se ha actualizado 
        </div>
    <?php endif; ?>
    <?php Utils::deleteSession('usuario'); ?>
    <?php Utils::deleteSession('errores'); ?>

</form>

