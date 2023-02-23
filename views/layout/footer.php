 </main>
    <footer id="footer" class="d-flex justify-content-center align-items-center py-3" >
        <p>Todos los derechos reservados &copy; Juan Manuel Henao García - 2022</p>
    </footer>
    <?php $datos_carrito = Utils::statisticsCart(); ?>
    <div id="cart">
        <div class="container-cart">
            <div class="rows">
                <div class="column column-100 text-center">
                    <h2 class="titulos my-4">Carrito de compra</h2>
                </div>
            </div>
            <div class="rows">
                <?php if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])): ?>
                    <?php foreach ($_SESSION['carrito'] as $index => $element): ?>
                        <div class="column column-100">
                            <div class="block-product-cart d-flex">
                                <div class="me-3 d-flex align-items-center justify-content-center">
                                    <?php if(!empty($element['producto']->imagen)): ?>
                                    <img src="<?=base_url?>assets/uploads/imgs_products/<?=$element['producto']->imagen?>" alt="Producto">
                                    <?php else: ?>
                                        <img src="<?=base_url?>assets/img/default-img-product.jpg" alt="Producto">
                                    <?php endif; ?>
                                </div>
                                <div class="p-2">
                                    <h4 class="titulos-carrito">
                                       <?=$element['producto']->nombre?>
                                    </h4>
                                    <p><?=$element['producto']->categoria?></p>
                                    <p>Plataforma : <?=$element['producto']->plataforma?></p>
                                    <p>Unidades: <?=$element['unidades']?></p>
                                    <p>Precio: <?=$element['producto']->precio?> $</p>
                                </div>
                                <a href="<?=base_url?>carrito/deleteOne&id=<?=$index?>" id="btn-remove-product">
                                    <i class="fa-solid fa-xmark"></i>
                                </a>
                                    
                                
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                <div class="column column-100 mb-3">
                    <h4 class="titulos-carrito text-center">No hay productos</h4>
                </div>
                
                <?php endif; ?>
                
            </div>
            <?php if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])): ?>
            <div class="rows">
                <div class="column column-50 d-flex justify-content-center">
                    <a href="<?=base_url?>carrito/delete" id="btn-remove-products" class="button button-red">Vaciar carrito</a>
                </div>
                <div class="column column-50 d-flex justify-content-center">
                    <a href="<?=base_url?>pedido/crear" class="button button-verde">Realizar pedido</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div id="block-total-cart">
            <h4>Total: <?=$datos_carrito['total']?> $ - Cantidad prods: <?=$datos_carrito['cantidad']?></h4>
        </div>
        <div id="block-icon-cart">
            <i class="fa-solid fa-cart-shopping"></i>
            <span><?=$datos_carrito['cantidad']?></span>
        </div>
    </div>
    <a id="go_back_up" href="#">
        <i class="fa-solid fa-angles-up"></i>
    </a>
    <div id="cont_social_network" class="d-flex flex-column-reverse flex-column">
        <div id="btn_open_socials">
            <i class="fa-solid fa-plus"></i>
        </div>
        <div class="links_social">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-tiktok"></i></a>
        </div>
        
    </div>
    <div class="trama">

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/ScrollTrigger.min.js"></script>
    <script src="<?=base_url?>assets/js/app.js"></script>
</body>
</html>