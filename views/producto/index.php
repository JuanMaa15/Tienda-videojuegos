<section id="product">
            <div class="container">
                <div class="rows">
                    <div class="column column-100">
                        <h2 class="titulos my-5">Nuestros productos</h2>
                    </div>
                </div>
                <div class="rows">
                    <div class="column column-25">
                        <h2 class="subtitulos">Categorías</h2>
                        <a class="link-categoria <?= !isset($id_categoria) && empty($id_categoria) ? "activo" : "" ?>" href="<?=base_url?>producto/index">Todos</a>
                        <?php $categorias = Utils::showCategories(); ?>
                        <?php while ($categoria = $categorias->fetch_object()): ?>
                       
                       <a class="link-categoria <?=isset($id_categoria) && $id_categoria == $categoria->id_categoria ? "activo" : "" ?>" href="<?=base_url?>producto/index<?=isset($id_tipo_plataforma) && !empty($id_tipo_plataforma) ? "&tipo_plataforma=".$id_tipo_plataforma : "" ?>&categoria=<?=$categoria->id_categoria?>" ><?=$categoria->nombre?></a>
                        <?php endwhile; ?>
                        
                    </div>
                    <div class="column column-75">
                        <div class="rows">
                            <div class="column column-100">
                                <div class="links-tipo-plataforma">
                                    <a class="<?=isset($id_tipo_plataforma) && $id_tipo_plataforma == 1 ? "activo" : "" ?>" href="<?=base_url?>producto/index<?=isset($id_categoria) && !empty($id_categoria) ? "&categoria=".$id_categoria : "" ?>&tipo_plataforma=1"><i class="fa-brands fa-playstation"></i> PlayStation</a>
                                    <a class="<?=isset($id_tipo_plataforma) && $id_tipo_plataforma == 2 ? "activo" : "" ?>" href="<?=base_url?>producto/index<?=isset($id_categoria) && !empty($id_categoria) ? "&categoria=".$id_categoria : "" ?>&tipo_plataforma=2"><i class="fa-brands fa-xbox"></i> Xbox</a>
                                    <a class="<?=isset($id_tipo_plataforma) && $id_tipo_plataforma == 3 ? "activo" : "" ?>" href="<?=base_url?>producto/index<?=isset($id_categoria) && !empty($id_categoria) ? "&categoria=".$id_categoria : "" ?>&tipo_plataforma=3"><i class="fa-solid fa-gamepad"></i> Nintendo</a>
                                </div>
                            </div>
                        </div>
                        <div class="rows mt-4">
                            <?php while($producto = $productos->fetch_object()): ?>
                            <div class="column column-33 my-3">
                                <div class="block-product px-3">
                                    <?php if (!empty($producto->imagen)): ?>
                                    <img src="<?=base_url?>assets/uploads/imgs_products/<?=$producto->imagen?>" alt="">
                                    <?php else: ?>
                                        <img src="<?=base_url?>assets/img/default-img-product.jpg" alt="">
                                    <?php endif; ?>
                                    <div class="my-3">
                                        <h3 class="subtitulos"><?=$producto->nombre?></h3>
                                        <p><?=$producto->precio?> $</p>
                                    </div>
                                </div>
                                <a href="<?=base_url?>producto/detalle&id=<?=$producto->id_producto?>" class="links link-product ">Comprar</a>

                            </div>
                           <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?=Utils::styles("header", "background-color", "rgb(29, 26, 49);")?>
