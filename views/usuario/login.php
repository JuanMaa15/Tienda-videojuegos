<section id="login">
            <div class="container">
                <div class="rows row-center">
                    <div class="column column-40 d-flex justify-content-center">
                        <form id="form_login" action="<?=base_url?>usuario/loguear" method="POST">
                            <div class="my-5 text-center">
                                <h2 class="titulos">Iniciar Sesión</h2>
                            </div>
                            <div class="my-4">
                                <div class="position-relative">
                                    <input type="text" class="form-input" name="email" required>
                                    <label for="email">Correo electrónico</label>
                                </div>
                                 <?= isset($_SESSION['errores']['email']) ? Utils::errores($_SESSION['errores'], 'email') : "";?>
                            </div>
                            <div class="my-4">
                                <div class="position-relative">
                                    <input type="password" class="form-input" name="password" required>
                                    <label for="password">Contraseña</label>
                                </div> 
                                <?= isset($_SESSION['errores']['password']) ? Utils::errores($_SESSION['errores'], 'password') : "";?>
                            </div>
                            <div class="my-4">
                                <input type="submit" name="submit" value="Ingresar">
                            </div>
                            <?php Utils::deleteSession('errores'); ?>
                            <?php if (isset($_SESSION['error_login'])): ?>
                                <div class="my-2 alert-general">
                                    <?=$_SESSION['error_login'];?>
                                </div>
                            <?php endif; ?>
                            <?php Utils::deleteSession('error_login'); ?>
                            <div class="my-2">
                                <a href="#">Olvidaste tu contraseña? Da click aqui para recuperarla</a>
                            </div>
                            <div class="my-2">
                                <a href="<?=base_url?>usuario/register">No tienes cuenta?, create una aqui</a>
                            </div>
                            <span id="name_shop">TiendaGamer</span>
                        </form>
                    </div>
                </div>
            </div>
        </section>