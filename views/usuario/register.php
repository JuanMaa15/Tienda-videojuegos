<section id="login">
            <div class="container">
                <div class="rows row-center">
                    <div class="column column-40">
                        <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == "complete"): ?>
                        <span class="respuesta-registro">El usuario se ha registrado correctamente <i class="fa-sharp fa-solid fa-circle-check"></i></span>
                            <?php Utils::deleteSession('usuario'); ?>
                        <?php elseif (isset($_SESSION['usuario']) && $_SESSION['usuario'] == "failed"): ?>
                            <span class="respuesta-registro">El usuario NO se ha registrado <i class="fa-sharp fa-solid fa-circle-check"></i></span>
                            <?php Utils::deleteSession('usuario'); ?>
                        <?php else: ?>
                        <form id="form_login" action="<?=base_url?>usuario/save" method="POST">
                            <div class="my-5 text-center">
                                <h2 class="titulos">Registrate!</h2>
                            </div>
                            
                            <div class="my-2">
                                <div class="position-relative">
                                    <input type="text" class="form-input" name="nombre" required>
                                    <label for="nombre">Nombre</label>
                                </div>
                                <?= isset($_SESSION['errores']['nombre']) ? Utils::errores($_SESSION['errores'], 'nombre') : "";?>
                            </div>
                            <div class="my-2">
                                <div class="position-relative">
                                    <input type="text" class="form-input" name="apellido" required>
                                    <label for="apellido">Apellido</label>
                                </div>
                                <?= isset($_SESSION['errores']['apellido']) ? Utils::errores($_SESSION['errores'], 'apellido') : "";?>
                            </div>
                            <div class="my-2">
                                <div class="position-relative">
                                    <input type="text" class="form-input" name="telefono" required>
                                    <label for="telefono">Telefono</label>
                                 </div>
                                <?= isset($_SESSION['errores']['telefono']) ? Utils::errores($_SESSION['errores'], 'telefono') : "";?>
                            </div>
                            <div class="my-2">
                                <div class="position-relative">
                                    <input type="text" class="form-input" name="email" required>
                                    <label for="email">Correo electrónico</label>
                                </div>
                                <?= isset($_SESSION['errores']['email']) ? Utils::errores($_SESSION['errores'], 'email') : "";?>
                            </div>
                            <div class="my-2">
                                <div class="position-relative">
                                    <input type="password" class="form-input" name="password" required>
                                    <label for="password">Contraseña</label>
                                </div>
                                <?= isset($_SESSION['errores']['password']) ? Utils::errores($_SESSION['errores'], 'password') : "";?>
                            </div>

                            <div class="my-4">
                                <input type="submit" name="submit" value="Registrar">
                            </div>
                             <?php Utils::deleteSession('errores'); ?>
                            <span id="name_shop">TiendaGamer</span>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
