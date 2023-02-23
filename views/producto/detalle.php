<section id="detalle" <?= isset($detalle_perfil) ? "class='my-0'" : ""?>>
    <div class="container">

        <div class="row py-5">
            <div class="column column-50">
                <?php if(!empty($producto->imagen)): ?>
                    <img src="<?= base_url ?>assets/uploads/imgs_products/<?= $producto->imagen ?>" alt="Producto">
                <?php else: ?>
                    <img src="<?=base_url?>assets/img/default-img-product.jpg" alt="Producto">
                <?php endif; ?>
                
            </div>
            <div class="column column-50 my-4">
                <div class="row">
                    <div class="column column-100">
                        <h2 class="titulos mb-3"><?= $producto->nombre ?></h2>
                    </div>
                </div>
                <p><?= $producto->descripcion ?></p>
                <?php if (!empty($producto->tipo)): ?>
                    <h3 class="subtitulos">Tipo de videojuego</h3>
                    <p><?= $producto->tipo ?></p>
                <?php endif; ?>
                <h3 class="subtitulos">Plataforma</h3>
                <p><?= $producto->plataforma ?></p>
                <h3 class="subtitulos">Precio</h3>
                <p><?= $producto->precio ?> $</p>
                
                <?php if (!isset($detalle_perfil)): ?>
                
                    <form action="<?= base_url ?>carrito/add&id=<?= $producto->id_producto ?>" method="POST" class="d-flex align-items-center">
                        <div class="my-2">
                            <div class="position-relative">
                                <input type="number" name="unidades" class="form-input" value="1" required>
                                <label for="unidades">Unidades</label>
                            </div>
                        </div>
                        <div class="my-2 ms-2">
                            <div class="position-relative">
                                <input type="submit" name="submit_js" class="px-2" value="Agregar al carrito">
                            </div>
                        </div>

                    </form>
                <?php endif; ?>
                
                
                <?php if (isset($_SESSION['resp_carrito']) && $_SESSION['resp_carrito'] == "complete"): ?>
                    <div class="alert-general green">El producto se agrego correctamente al carrito</div>
                <?php elseif (isset($_SESSION['resp_carrito'])): ?>
                    <div class="alert-general red">El producto NO se agrego</div>
                <?php endif; ?>
                <?php Utils::deleteSession('resp_carrito'); ?>
            </div>
        </div>
    </div>
</section>
<?= Utils::styles("header", "background-color", "rgb(29, 26, 49);") ?>
