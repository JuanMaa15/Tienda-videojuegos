<!-- <section id="banner">
            <div class="container-fluid">
                <div class="img-big-banner">
                    <div class="block-banner">
                        <div class="description-banner">

                            <h1 class="fw-bold">TIENDA<span>GAMER</span></h1>
                            <p class="mt-3 fw-bold">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt nihil alias consectetur deserunt facilis non sequi eos exercitationem facere hic, eveniet saepe voluptate iusto ipsam ex nam. Impedit, nobis dolorem!</p>
                            <div class="mt-3 d-flex justify-content-around py-3">
                                <a class="link-banner link-white" href="#">Iniciar Sesion</a>
                                <a class="link-banner link-transparent" href="#">Registrarse</a>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center imgs-small-banner">
                    <div class="block-banner">
                        <img src="./assets/img/banner-img3.jpg" class="img-banner">
                    </div>
                    <div class="block-banner">
                        <div class="owl-carousel owl-theme w-100">
                            
                                <img src="./assets/img/banner-img2.jpg" class="img-banner">
                                <img src="./assets/img/logo-img-banner.png" class="logo-img-banner">
                   
                            
                                <img src="./assets/img/banner-img2.jpg" class="img-banner">
                                <img src="./assets/img/logo-img-banner.png" class="logo-img-banner">
                          
                            
                                <img src="./assets/img/banner-img2.jpg" class="img-banner">
                                <img src="./assets/img/logo-img-banner.png" class="logo-img-banner">
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </section> -->
        <section id="banner">
            <div class="container-fluid">
                <div class="rows">
                    <div class="column-50">
                        <div class="img-big-banner">
                            <div class="block-banner">
                                <div class="description-banner">
                                    <h1 class="fw-bold">TIENDA<span>GAMER</span></h1>
                                    <p class="mt-3 fw-bold">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt nihil alias consectetur deserunt facilis non sequi eos exercitationem facere hic, eveniet saepe voluptate iusto ipsam ex nam. Impedit, nobis dolorem!</p>
                                    <div class="mt-3 d-flex justify-content-around py-3">
                                        <a class="link-banner link-white" href="<?=base_url?>usuario/login">Iniciar Sesion</a>
                                        <a class="link-banner link-transparent" href="<?=base_url?>usuario/register">Registrate</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column-50">
                        <div class="rows imgs-small-banner">
                            <div class="column-100 block-banner">
                                <img src="./assets/img/banner-img3.jpg" class="img-banner">
                            </div>
                            <div class="column-100 block-banner">
                                <div class="owl-carousel owl-theme w-100">
                                    <div class="item" id="item_banner1">
                                        <img src="./assets/img/banner-img2.jpg" class="img-banner">
                                        <img src="./assets/img/logo-img-banner.png" class="logo-img-banner">
                                    </div>
                                    <div class="item" id="item_banner2">
                                        <img src="./assets/img/banner-img4.jpg" class="img-banner">
                                        <img src="./assets/img/logo-img-banner2.png" class="logo-img-banner">
                                    </div>
                                    <div class="item" id="item_banner3">
                                        <img src="./assets/img/banner-img5.jpg" class="img-banner">
                                        <img src="./assets/img/logo-img-banner3.png" class="logo-img-banner big">
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  
            </div>
        </section>
        <section id="productos-destacados" class="my-5">
            <div class="container">
                <div class="rows py-5">
                    <div class="column column-100 text-center">
                        <h2 class="titulos">PRODUCTOS DESTACADOS</h2>
                    </div>                    
                </div>
                <?php $productos = Utils::showProductsFeatured(); ?>
                <div class="rows">
                    <?php while ($producto = $productos->fetch_object()): ?>
                        <div class="column column-33">

                            <div class="block-product px-3">
                                <?php if (!empty($producto->imagen)): ?>
                                    <img src="<?=base_url?>assets/uploads/imgs_products/<?=$producto->imagen?>" alt="Producto">
                                <?php else: ?>
                                    <img src="<?=base_url?>assets/img/default-img-product.jpg" alt="Producto">
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
        </section>

        <section id="news_consoles">
            <div class="container">
                <div class="block-console">
                    <div class="rows">
                        <div class="column column-100">
                            <h2 class="titulos" id="title-console1">PlayStation 5 (PS5)</h2>
                        </div>
                    </div>
                    <div class="rows">
                        <div class="column column-33 d-flex align-items-center">
                            <p id="description_new_console1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis animi labore illo neque optio, nam voluptatem consectetur alias corrupti consequuntur dolor culpa. Porro nisi unde obcaecati explicabo sed rerum deleniti quas a, aperiam dolores incidunt soluta, hic placeat quae sapiente labore vitae ullam vel qui perspiciatis. Dolor minima aperiam harum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, libero fuga blanditiis sint explicabo soluta doloremque a in nobis praesentium ab laboriosam, voluptatum natus ad architecto corrupti quod quibusdam eaque.</p>
                           
                        </div>
                        <div class="column column-66">
                            <img src="./assets/img/img-product-inicio.png" alt="PlayStation 5" id="img_new_console1">
                        </div>
                    </div>
                </div>

                <div class="block-console">
                    <div class="rows">
                        <div class="column column-100">
                            <h2 class="titulos" id="title-console2">XBOX Series X (XSX)</h2>
                        </div>
                    </div>
                    <div class="rows">
                        <div class="column column-66">
                            <img src="./assets/img/img-product-inicio2.png" alt="Xbox Series X" id="img_new_console2">
                        </div>
                        <div class="column column-33">
                            <p id="description_new_console2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis impedit, error quisquam dolorem numquam reiciendis illum iusto animi labore odio delectus velit aliquid eligendi pariatur alias ipsam unde. Officia, deleniti? Omnis illo odio, quidem fugit dicta illum rem doloribus sit eaque vel, possimus laboriosam rerum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius neque, harum officiis, omnis a voluptates, illo repudiandae fugit quae provident dolore aperiam alias. Facilis modi, dolorum iste esse tenetur qui?</p>
                            
                        </div>
                    </div>
                </div>
                
                <div class="block-console">
                    <div class="rows">
                        <div class="column column-100">
                            <h2 class="titulos" id="title-console3">Nintendo Swich (NS)</h2>
                        </div>
                    </div>
                    <div class="rows">
                        <div class="column column-33">
                            <p id="description_new_console3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus corporis, doloremque nobis consequatur facilis ducimus eos illum tempora. Dolorem ex blanditiis debitis accusantium nisi iusto, aut excepturi, libero nesciunt quisquam necessitatibus fugiat hic quod perspiciatis? Tenetur distinctio aperiam debitis minus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod error reiciendis iusto suscipit modi magni eius! Earum consectetur debitis libero, laboriosam reiciendis, hic totam inventore provident aspernatur illum ab non.</p>
                            
                        </div>
                        <div class="column column-66">
                            <img src="./assets/img/img-product-inicio3.png" alt="Nintendo Swich" id="img_new_console3">
                        </div>
                    </div>
                </div>

                <div class="block-console">
                    <div class="rows">
                        <div class="column column-100">
                            <h2 class="titulos" id="title-console4">Oculus Quest 2 (OQ2)</h2>
                        </div>
                    </div>
                    <div class="rows">
                        <div class="column column-66">
                            <img src="./assets/img/img-product-inicio4.png" alt="Oculus Quest 2" id="img_new_console4">
                        </div>
                        <div class="column column-33">
                            <p id="description_new_console4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi, enim in. Facere, iure? Natus repellat aliquid sapiente fugit, quidem deleniti officia accusantium quis, adipisci mollitia suscipit asperiores consequuntur ab recusandae at! Ipsum ratione fugiat distinctio culpa reprehenderit sequi eligendi, cumque blanditiis rerum. Quae consequuntur totam ad distinctio! Obcaecati, commodi amet. Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde voluptas ipsam nihil aliquid sed sint beatae a? Dolorem, laboriosam? Ratione vitae nobis ipsa, officiis modi quo quod, temporibus dolore alias iste repellendus explicabo placeat, sunt harum? Necessitatibus et ea soluta!</p>
                            
                        </div>
                        
                    </div>
                </div>

            </div>
        </section>
        
        <section id="services" class="mt-5">
            <div class="container">
                <div class="rows">
                    <div class="column column-100">
                        <h2 class="titulos" id="title_service">Te ofrecemos estos servicios</h2>
                    </div>
                </div>
                <div class="rows row-service">
                    <div class="column column-50">
                        <div class="block-service d-flex justify-content-end align-items-end flex-row-reverse">
                            <div class="icon-services">
                                <i class="fa-solid fa-broom"></i>
                            </div>
                            <p class="margin-bottom-service order">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam ab eum fugiat qui asperiores blanditiis voluptatum ratione, hic, laborum quis sed quasi accusamus accusantium totam? Maiores officia aspernatur sit necessitatibus atque consequatur illo doloremque, vel dolor tenetur debitis laudantium cum iure, amet exercitationem optio excepturi. In eligendi iste natus. Libero porro voluptates reiciendis ipsum ea sapiente quasi beatae rerum nobis consequatur mollitia alias eos fuga natus tempore adipisci. </p>
                            <h3 class="subtitulos text-end" id="subtitle-service1">Mantenimiento</h3>
                        </div>
                        
                    </div>
                    <div class="column column-50 ">
                        <div class="block-service d-flex justify-content-center align-items-end">
                            <div class="icon-services">
                                <i class="fa-solid fa-motorcycle"></i>
                            </div>
                            <p class="margin-bottom-service">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam ab eum fugiat qui asperiores blanditiis voluptatum ratione, hic, laborum quis sed quasi accusamus accusantium totam? Maiores officia aspernatur sit necessitatibus atque consequatur illo doloremque, vel dolor tenetur debitis laudantium cum iure, amet exercitationem optio excepturi. In eligendi iste natus. Libero porro voluptates reiciendis ips </p>
                            <h3 class="subtitulos" id="subtitle-service2">Domicilio</h3>
                        </div>
                        
                    </div>
                </div>
                <div class="rows row-center row-service">
                    <div class="column column-50">
                        <div class="block-service d-flex align-items-center flex-column">
                            <div class="icon-services mb-5">
                                <i class="fa-solid fa-trophy"></i>
                            </div>
                            
                            <p class="mover-texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam ab eum fugiat qui asperiores blanditiis voluptatum ratione, hic, laborum quis sed quasi accusamus accusantium totam? Maiores officia aspernatur sit necessitatibus atque consequatur illo doloremque, vel dolor tenetur debitis laudantium cum iure, amet exercitationem optio excepturi. In eligendi iste natus. Libero porro voluptates reiciendis ipsum ea sapiente quasi beatae rerum nobis consequatur mollitia alias eos fuga natus tempore adipisci, reprehenderit iure officia corrupti animi amet commodi inventore. Laborum libero deserunt </p>
                            <h3 class="subtitulos" id="subtitle-service3">Torneos</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="additional_information" class="py-5">
            <div class="container">
                <div class="rows">
                    <div class="column column-100">
                        <h2 class="titulos">Información adicional</h2>
                    </div>
                </div>
                <div class="rows">
                    <div class="column column-33">
                        <div class="block-additional-information">
                            <h3 class="subtitulos">Actividades</h3>
                            <ul>
                                <li>Torneos nacionales</li>
                                <li>Rifas cada aniversario</li>
                                <li>Dia de los videojuegos (21 de Julio)</li>
                                <li>Lanzamiento de nuevos videojuegos</li>
                                <li>Eventos especiales</li>
                            </ul>
                        </div>
                    </div>
                    <div class="column column-33">
                        <div class="block-additional-information">
                            <h3 class="subtitulos">Contacto</h3>
                            <h4 class="titulos-info">Direccion</h4>
                            <p>Carrera 13A #45-56 Piso N6</p>
                            <h4 class="titulos-info">Correo</h4>
                            <p>tiendagamer23@gmail.com</p>
                            <h4 class="titulos-info">Telefono</h4>
                            <p>+57 345 3233 34 23</p>
                        </div>
                    </div>
                    <div class="column column-33">
                        <div class="block-additional-information d-flex justify-content-center align-items-center h-100">
                            <i class="fa-solid fa-gamepad"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>