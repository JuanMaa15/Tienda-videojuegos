<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tienda Gamer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" ></script>
        <script src="https://kit.fontawesome.com/4240342587.js" crossorigin="anonymous"></script>
        <script src="<?= base_url ?>assets/js/jquery.js"></script>
        <script src="<?= base_url ?>assets/libs/owl/owl.carousel.js"></script>
        <link rel="stylesheet" href="<?=base_url?>assets/libs/owl/owl.carousel.css">
        <link rel="stylesheet" href="<?=base_url?>assets/libs/owl/owl.theme.default.css">
        <link rel="stylesheet" href="<?=base_url?>assets/css/style.css">
    </head>
    <body>
        <header id="header">
            <div class="container-fluid">
                <nav id="nav">
                    <ul>
                        <li><a href="<?=base_url?>" class="seleccionado">Inicio</a></li>
                        <li class="position-relative" id="link_product">
                            <a href="<?=base_url?>producto/index" >Productos</a>
                            <?php $categorias_pl = Utils::showCategories(); ?>
                            <?php $categorias_xb = Utils::showCategories(); ?>
                            <?php $categorias_ni = Utils::showCategories(); ?>
                            <ul class="nav-list-platforms">
                                <li>
                                    <a href="<?=base_url?>producto/index&tipo_plataforma=1"><i class="fa-brands fa-playstation"></i> PlayStation</a>
                                    <ul class="nav-list-categories">
                                        <?php while ($categoria = $categorias_pl->fetch_object()): ?>
                                            <li> <a href="<?=base_url?>producto/index&tipo_plataforma=1&categoria=<?=$categoria->id_categoria?>"><?= $categoria->nombre ?></a> </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=base_url?>producto/index&tipo_plataforma=2"><i class="fa-brands fa-xbox"></i> Xbox</a>
                                    <ul class="nav-list-categories">
                                        <?php while ($categoria = $categorias_xb->fetch_object()): ?>
                                            <li> <a href="<?=base_url?>producto/index&tipo_plataforma=2&categoria=<?=$categoria->id_categoria?>"><?= $categoria->nombre ?></a> </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=base_url?>producto/index&tipo_plataforma=3"><i class="fa-solid fa-gamepad"></i> Nintendo</a>
                                    <ul class="nav-list-categories">
                                        <?php while ($categoria = $categorias_ni->fetch_object()): ?>
                                            <li> <a href="<?=base_url?>producto/index&tipo_plataforma=3&categoria=<?=$categoria->id_categoria?>"><?=$categoria->nombre?></a> </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Sobre nosotros</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </nav>
                <div id="link-log-in">
                    <?php if (isset($_SESSION['user'])): ?>
                        <div class="position-relative">
                            <a href="#" id="link_perfil" class="link-perfil">
                                <i class="fa-solid fa-user"></i> <?= $_SESSION['user']->nombre ?>
                            </a>
                            <ul class="nav-list-platforms mt-2" id="list_perfil">
                                <li><a href="<?=base_url?>usuario/perfil">Mi perfil</a></li>
                                <li><a href="<?=base_url?>pedido/misPedidos&id=<?=$_SESSION['user']->id_usuario?>">Mis pedidos</a></li>
                                <li><a href="<?=base_url?>usuario/logout">Cerrar Sesion</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="<?=base_url?>usuario/login">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i> Iniciar Sesion
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        </header>
        <main>