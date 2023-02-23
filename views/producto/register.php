
<?php if (isset($producto) && is_object($producto)):
    $url = base_url."producto/save&id=".$producto->id_producto;
    $titulo = "Editar producto";
    $button = "Actualizar";
    
    if (!empty($producto->id_categoria) && $producto->id_categoria == 2) {
        $class_tipo = '';
    }else{     
       $class_tipo = 'd-none';
    }
    
else:
    $url = base_url."producto/save";
    $titulo = "Nuevo producto";
    $button = "Registrar";
    $class_tipo = 'd-none';
endif; ?>
<form action="<?=$url?>" method="POST" id="form" enctype="multipart/form-data" class="w-100">
    <h3 class="subtitulos mb-4 text-center"><?=$titulo?></h3>
    <div class="row mt-3">
        <div class="column column-50">
            <div class="my-2">
                <div class="position-relative">
                    <input type="text" class="form-input" name="nombre" <?= isset($producto) && is_object($producto) ? 'value="'.$producto->nombre .'"' : ""; ?> required>
                    <label for="nombre">Nombre</label>
                </div>
                <?= isset($_SESSION['errores']['nombre']) ? Utils::errores($_SESSION['errores'], 'nombre') : "";?>
            </div>
        </div>
        <div class="column column-50">
            <div class="my-2">
                <div class="position-relative">
                    <input type="text" class="form-input" name="descripcion" <?= isset($producto) && is_object($producto) ? 'value="'.$producto->descripcion .'"' : ""; ?>>
                    <label for="descripcion">Descripcion</label>
                </div>
                <?= isset($_SESSION['errores']['descripcion']) ? Utils::errores($_SESSION['errores'], 'descripcion') : "";?>
            </div>
        </div>
    </div>
    
    <div class="row mt-3">
        <div class="column column-50">
            <div class="my-2">
                <div class="position-relative">
                    <?php $plataformas = Utils::showPlatforms(); ?>
                    <select name="plataforma" class="form-input">
                        <option value="">Seleccionar plataforma</option>
                        <?php while($plataforma = $plataformas->fetch_object()): ?>
                            <option value="<?=$plataforma->id_plataforma?>" <?=isset($producto) && is_object($producto) && $plataforma->id_plataforma == $producto->id_plataforma ? "selected" : "";?>><?=$plataforma->nombre?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <?= isset($_SESSION['errores']['plataforma']) ? Utils::errores($_SESSION['errores'], 'plataforma') : "";?>
            </div>
        </div>
        <div class="column column-50">
            <div class="my-2">
                <div class="position-relative">
                    <?php $categorias = Utils::showCategories(); ?>
                    <select name="categoria" class="form-input" id="categoria">
                        <option value="">Seleccionar Categoria</option>
                        <?php while($categoria = $categorias->fetch_object()): ?>
                            <option value="<?=$categoria->id_categoria?>" <?=isset($producto) && is_object($producto) && $producto->id_categoria == $categoria->id_categoria ? "selected" : "";?>><?=$categoria->nombre?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <?= isset($_SESSION['errores']['categoria']) ? Utils::errores($_SESSION['errores'], 'categoria') : "";?>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="column column-50">
            <div class="my-2">
                <div class="position-relative">
                    <input type="number" class="form-input" name="precio" <?= isset($producto) && is_object($producto) ? 'value="'.$producto->precio .'"' : ""; ?> required>
                    <label for="precio">Precio</label>
                </div>
                <?= isset($_SESSION['errores']['precio']) ? Utils::errores($_SESSION['errores'], 'precio') : "";?>
            </div>
        </div>
        <div class="column column-50">
            <div class="my-2">
                <div class="position-relative">
                    <input type="number" class="form-input" name="stock" <?= isset($producto) && is_object($producto) ? 'value="'.$producto->stock .'"' : ""; ?> required>
                    <label for="stock">Stock</label>
                </div>
                <?= isset($_SESSION['errores']['stock']) ? Utils::errores($_SESSION['errores'], 'stock') : "";?>
            </div>
        </div>
    </div>
    
   <div class="row mt-3">
        <div class="column column-50">
            <div class="my-2">
                <div class="position-relative">
                    <input type="text" class="form-input" name="oferta" <?= isset($producto) && is_object($producto) ? 'value="'.$producto->oferta .'"' : ""; ?>>
                    <label for="oferta">Oferta</label>
                </div>
                <?= isset($_SESSION['errores']['oferta']) ? Utils::errores($_SESSION['errores'], 'oferta') : "";?>
            </div>
        </div>
        <div class="column column-50">
            <div class="my-2">
                
                <div class="position-relative mt-2">
                    <input type="file" class="form-input" name="imagen">
                    <?php if (isset($producto) && is_object($producto) && !empty($producto->imagen)): ?>
                    <div class="p-3">
                        <img src="<?=base_url?>assets/uploads/imgs_products/<?=$producto->imagen;?>" alt="Imagen producto">
                    </div>
                    <?php elseif(isset($producto) && is_object($producto)): ?>
                    <div class="p-3">
                        <img src="<?=base_url?>assets/img/default-img-product.jpg" alt="Imagen producto">
                    </div>
                    <?php endif; ?>
                </div>
                <?= isset($_SESSION['errores']['imagen']) ? Utils::errores($_SESSION['errores'], 'imagen') : "";?>
            </div>
        </div>
    </div>
    
    <div class="row mt-3 <?=$class_tipo?>" id="row_type">
        <div class="column column-100">
            <div class="my-2">
                <div class="position-relative">
                    <select name="tipo" class="form-input" id="tipo_videojuego">
                        <option value="">Seleccionar el tipo de videojuego</option>
                        <option value="accion" <?=isset($producto) && is_object($producto) && $producto->tipo == "accion" ? "selected" : "";?>>Accion</option>
                        <option value="aventura" <?=isset($producto) && is_object($producto) && $producto->tipo == "aventura" ? "selected" : "";?>>Aventura</option>
                        <option value="terror" <?=isset($producto) && is_object($producto) && $producto->tipo == "terror" ? "selected" : "";?>>Terror</option>
                        <option value="deporte" <?=isset($producto) && is_object($producto) && $producto->tipo == "deporte" ? "selected" : "";?>>Deporte</option>
                        <option value="estrategia" <?=isset($producto) && is_object($producto) && $producto->tipo == "estrategia" ? "selected" : "";?>>Estrategia</option>
                    </select>
                    
                </div>
                
            </div>
        </div>     
    </div>
    
    <div class="my-4">
        <input type="submit" name="submit" value="<?=$button?>">
    </div>
    
    
 
    <?php Utils::deleteSession('errores'); ?>
    
       
</form>

