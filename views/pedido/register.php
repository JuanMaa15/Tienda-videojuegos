<section id="pedido">
    <div class="container">
        <div class="rows">
            <div class="column column-66">
                <table class="table mt-4">
                    <thead>
                      <tr>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">PLATAFORMA</th>
                        <th scope="col">UNIDADES</th>
                         <th scope="col">PRECIO</th>
                         <th scope="col">IMAGEN</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($_SESSION['carrito'] as $index => $element) : ?>
                        <tr class="tr-pedido">
                        <th><?=$element['producto']->nombre?></th>
                        <td><?=$element['producto']->plataforma?></td>
                        <td><?=$element['unidades']?></td>
                        <td><?=$element['producto']->precio?> $</td>
                        <td class="p-2">
                            <?php if(!empty($element['producto']->imagen)): ?>
                            <img src="<?=base_url?>assets/uploads/imgs_products/<?=$element['producto']->imagen?>">
                            <?php else: ?>
                                <img src="<?=base_url?>assets/img/default-img-product.jpg">
                            <?php endif; ?>
                        </td>
                        
                      </tr>

                      <?php endforeach; ?>

                    </tbody>
                </table>
                <?php $datos_carrito = Utils::statisticsCart(); ?>
                <div class="d-flex justify-content-end py-3">
                    <h3 class="subtitulos">Total: <?=$datos_carrito['total']?> $</h3>
                </div>
            </div>
            <div class="column column-33">
                <form action="<?=base_url?>pedido/register" id="form" class="w-100">
                    <h3 class="subtitulos mb-4 text-center">Ingresar datos para el pedido</h3>

                    <div class="my-2">
                        <div class="position-relative">
                            <input type="text" class="form-input" id="provincia" required>
                            <label for="provincia">Provincia</label>
                        </div>
                        <div class="alerta alert-red"></div>
                    </div>
                    <div class="my-2">
                        <div class="position-relative">
                            <input type="text" class="form-input" id="ciudad" required>
                            <label for="ciudad">Ciudad</label>
                        </div>
                        <div class="alerta alert-red"></div>
                    </div>
                    <div class="my-2">
                        <div class="position-relative">
                            <input type="text" class="form-input" id="direccion" required>
                            <label for="direccion">Direccion</label>
                        </div>
                        <div class="alerta alert-red"></div>
                    </div>


                    <div class="my-4">
                        <input type="button" id="btn_save_order" value="Enviar">
                    </div>

                    <div id="respuesta">

                    </div>

                       <!-- <div class="my-2 alert-general">
                            El usuario NO se ha actualizado 
                        </div> -->

                </form>
                
                
            </div>
            
        </div>
    </div>
</section>
<?=Utils::styles("header", "background-color", "rgb(29, 26, 49);")?>