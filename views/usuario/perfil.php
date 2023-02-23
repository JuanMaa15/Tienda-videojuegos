<section id="perfil">
<div class="container">
<div class="rows">
    <div class="column column-100">
        <h2 class="titulos">Mi perfil</h2>
    </div>
</div>
<div class="rows">
    <div class="column column-33">
        <div class="block_perfil1">
            <div class="my-4">
                <img src="<?= base_url ?>assets/img/perfil_default.webp" alt="Foto">
            </div>
            <?php $id = $_SESSION['user']->id_usuario; ?>
            <div class="mb-4">
                <a href="<?=base_url?>usuario/editar&id=<?=$id?>" class="link-product">Mis datos</a>
                <a href="<?=base_url?>usuario/editarPass&id=<?=$id?>" class="link-product">Cambiar contraseña</a>
                <a href="<?=base_url?>pedido/misPedidos&id=<?=$id?>" class="link-product">Mis pedidos</a>
                <?php if(isset($_SESSION['admin'])): ?>
                <a href="<?=base_url?>categoria/index" class="link-product">Gestión categorias</a>
                <a href="<?=base_url?>tipoplataforma/index" class="link-product">Gestión tipo plataforma</a>
                <a href="<?=base_url?>plataforma/index" class="link-product">Gestion de plataformas</a>
                <a href="<?=base_url?>estadopedido/index" class="link-product">Gestión de estados</a>
                <a href="<?=base_url?>producto/listado" class="link-product">Gestión Productos</a>
                <a href="<?=base_url?>pedido/listado" class="link-product">Gestión Pedidos</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="column column-66">
 <div class="block_perfil2">

