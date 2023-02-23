"use strict";

gsap.registerPlugin(ScrollTrigger);

const tl = gsap.timeline({
    scrollTrigger : {
        trigger: "#news_consoles",
        start: "top",
        end: "5000 100%",
        scrub: true,
        pin: true,
        toggleActions: "play reverse play reverse"    
        //markers: true
        
    }
});

tl.to('#description_new_console1', {opacity: 0, y: -100, duration: 1});
tl.to('#img_new_console1', {opacity: 0, duration: 0.5}, '-=1');
tl.to('#title-console1', {width: '0%', duration: 1}, '-=1.6');


tl.to('#title-console2', {width: '100%', duration: 1}, '-=0.5');
tl.to('#description_new_console2', {opacity: 1, y: 50, duration: 1}, '-=1.5');
tl.to('#img_new_console2', {opacity: 1, duration: 1}, '-=1.3');

tl.to('#title-console2', {width: '0%', duration: 1});
tl.to('#description_new_console2', {opacity: 0, y: -50, duration: 1}, '-=0.8');
tl.to('#img_new_console2', {opacity: 0, duration: 0.5}, '-=1');


tl.to('#title-console3', {width: '100%', duration: 1}, '-=0.2');
tl.to('#description_new_console3', {opacity: 1, y: 50, duration: 1}, '-=1.3');
tl.to('#img_new_console3', {opacity: 1, duration: 0.5}, '-=1');

tl.to('#title-console3', {width: '0%', duration: 1});
tl.to('#description_new_console3', {opacity: 0, y: -50, duration: 1}, '-=1');
tl.to('#img_new_console3', {opacity: 0, duration: 0.5}, '-=1');

tl.to('#title-console4', {width: '100%', duration: 1});
tl.to('#description_new_console4', {opacity: 1, y: 50, duration: 1}, '-=1.3');
tl.to('#img_new_console4', {opacity: 1, duration: 0.5}, '-=1');


const tl_s = gsap.timeline({
    scrollTrigger : {
        trigger: "#services",
        start: "top 75%",
        end: "100% 15%",
        toggleActions: "play reverse play reverse",      
       // markers: true
        
    }
});

tl_s.to('#title_service', {opacity: 1, duration: 0.8});
tl_s.to('.row-service', {opacity: 1, duration: 0.7}, '-=0.4');


var form_url = $("#form").attr("action");

var actions = {

    ready : function() {
        
        
        $("#block-icon-cart").click(actions.abrirCarrito);
        $("#btn_open_socials").click(actions.mostrarRedesSociales);
        $("#link_perfil").click(actions.mostrarListaPerfil);
        $("#btn_save_category").click(actions.registrarCategoria);
        $("#btn_save_type_platform").click(actions.guardarTipoPlataforma);
        $("#btn_save_platform").click(actions.guardarPlataforma);
        $("#btn_save_status").click(actions.guardarEstadoPedido);
        $("#btn_save_order").click(actions.guardarPedido);
        
        $("#btn_save_status_order").click(actions.actualizarEstadoPedido);
        
        $("#btn-remove-product").click(actions.eliminarProductoCarrito);
        $("#btn-remove-products").click(actions.eliminarProductosCarrito);
        
        $("#categoria").on("change", actions.mostrarTipoVideojuego);
        
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav: true,
            doots: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    },
    
    eliminarProductosCarrito : function () {
        
        let href = $("#btn-remove-products").attr("href");
        
        $.ajax({
            method: "POST",
            url: href,
            data: {
                'submit_js': "submit"
            }
        }).done(function(data){
            location.reload();
        });
    },
    
    eliminarProductoCarrito : function () {
        
        let href = $("#btn-remove-product").attr("href");
        
        $.ajax({
            method: "POST",
            url: href,
            data: {
                'submit_js': "submit"
            }
        }).done(function(data){
            location.reload();
        });
    },
    
    
    actualizarEstadoPedido : function() {
        let estado = $("#estado").val();
        
        $.ajax({
            method: "POST",
            url: form_url,
            data: {
                'estado': estado,
                'submit_js': "submit"
            },
            dataType: 'json'
            
        }).done(function(data){
            if (data.tipo === 1) {
                    
                if (data.mensaje === "complete") {
                    $("#respuesta").html('<div class="my-2 alert-general green">El estado se actualizó correctamente</div>');
                    actions.recargar(data.url);
                }else if(data.mensaje === "failed"){
                    $("#respuesta").html('<div class="my-2 alert-general red">El pedido NO se guardo</div>');
                }
                
                $(".alerta").html("");

            }else{ 
                 $(".alerta").html("");
                $.each(data.errores, function(index, element){
                    $("#" + element.id).parent().next().html(element.error);
                    
                });
            }
        });
    },
    
    guardarPedido : function() {
      
        let provincia = $("#provincia").val();
        let ciudad = $("#ciudad").val();
        let direccion = $("#direccion").val();
        
        $.ajax({
            method: "POST",
            url: form_url,
            data: {
                'provincia': provincia,
                'ciudad': ciudad,
                'direccion': direccion,
                'submit_js': "submit"
            },
            dataType: 'json'
        }).done(function(data){
          
            if (data.tipo === 1) {
                    
                if (data.mensaje === "complete") {
                    
                    actions.recargar(data.url);
                }else if(data.mensaje === "failed"){
                    $("#respuesta").html('<div class="my-2 alert-general red">El pedido NO se guardo</div>');
                }
                
                $(".alerta").html("");

            }else{ 
                 $(".alerta").html("");
                $.each(data.errores, function(index, element){
                    $("#" + element.id).parent().next().html(element.error);
                    
                });
            }
            
        });
    },
    
    
    guardarEstadoPedido : function () {
        let nombre = $("#nombre").val();
        
        $.ajax({
            method: "POST",
            url: form_url,
            data: {
                'nombre': nombre,
                'submit_js': "submit"
            },
            dataType: 'json'
        }).done(function(data){
            
            if (data.tipo === 1) {
                    
                if (data.mensaje === "complete") {
                    
                    $("#respuesta").html('<div class="my-2 alert-general green">El estado para los pedidos se guardo correctamente</div>');
                    actions.recargar(data.url);
                }else{
                    $("#respuesta").html('<div class="my-2 alert-general red">El estado para los pedidos NO se guardo</div>');
                }
                
                $(".alerta").html("");

            }else{ 
               
                $.each(data.errores, function(index, element){
                    $("#" + element.id).parent().next().html(element.error);
                });
            }
            
        });
    },
    
    guardarPlataforma : function () {
        
        
        let nombre = $("#nombre").val();
        let tipo_plataforma = $("#tipo_plataforma").val();
        
        $.ajax({
            method: "POST",
            url: form_url,
            data: {
                'nombre': nombre,
                'tipo_plataforma': tipo_plataforma,
                'submit_js': "submit"
            },
            dataType: 'json'
        }).done(function(data){
            
            if (data.tipo === 1) {
                    
                if (data.mensaje === "complete") {
                    
                    $("#respuesta").html('<div class="my-2 alert-general green">La plataforma se guardo correctamente</div>');
                    actions.recargar(data.url);
                }else{
                    $("#respuesta").html('<div class="my-2 alert-general red">La plataforma NO se guardo</div>');
                }
                
                $(".alerta").html("");

            }else{ 
                $(".alerta").html("");
                $.each(data.errores, function(index, element){
                    $("#" + element.id).parent().next().html(element.error);
                });
            }
            
        });
    },
    
    guardarTipoPlataforma : function() {
        
        let nombre = $("#nombre").val();
        
        $.ajax({
            method: "POST",
            url: form_url,
            data: {
                'nombre': nombre,
                'submit_js': "submit"
            },
            dataType: 'json'
        }).done(function(data){
            
            if (data.tipo === 1) {
                    
                if (data.mensaje === "complete") {
                    
                    $("#respuesta").html('<div class="my-2 alert-general green">El tipo de plataforma se guardo correctamente</div>');
                    actions.recargar(data.url);
                }else{
                    $("#respuesta").html('<div class="my-2 alert-general red">El tipo de plataforma NO se guardo</div>');
                }
                
                $(".alerta").html("");

            }else{ 
                
                $.each(data.errores, function(index, element){
                    $("#" + element.id).parent().next().html(element.error);
                });
            }
            
        });
        
    },

    registrarCategoria : function() {
        
        let nombre = $("#nombre").val();

        $.ajax({
           method: "POST",
           url: form_url,
           data: {
               'nombre': nombre,
               'submit_js': "submit"
           },
            dataType: 'json'
        }).done(function(data) {
        
            if (data.tipo === 1) {
                    
                if (data.mensaje === "complete") {
                    
                    $("#respuesta").html('<div class="my-2 alert-general green">La categoría se guardo correctamente</div>');
                    actions.recargar(data.url);
                }else{
                    $("#respuesta").html('<div class="my-2 alert-general red">La categoría NO se guardo</div>');
                }
                
                $(".alerta").html("");

            }else{ 
                $.each(data.errores, function(index, element){
                    $("#" + element.id).parent().next().html(element.error);
                });
            }
            
        });
        
    },
    
    mostrarTipoVideojuego : function() {
      let categoria = $(this).val();
      let tipo = $("#row_type");
      let tipo_videojuego = $("#tipo_videojuego");

      if (categoria === "2") {
          tipo.removeClass("d-none");
          tipo.addClass("d-block");
      }else{
          tipo.removeClass("d-block");
          tipo.addClass("d-none");
          
          if (tipo_videojuego.val().length !== 0 ) {
              $("#tipo_videojuego option:first-child").remove();
              tipo_videojuego.prepend('<option value="" selected>Seleccionar tipo de videojuego</option>');
          }
          
      }
    },
    
    mostrarListaPerfil : function(e) {
        e.preventDefault();
        $("#list_perfil").toggleClass("mostrar-lista");
        
    },

    mostrarRedesSociales : function (){
        $(this).toggleClass("rotate");
        $(".links_social").toggleClass("open");
    },

    abrirCarrito : function() {

        let cont_card = $("#cart");
        let icon_card = $(this);
        let cont_total = $("#block-total-cart");
        let trama = $(".trama");

        cont_card.toggleClass("open-cart");
        icon_card.toggleClass("move-icon");
        cont_total.toggleClass("move-total");
        trama.fadeToggle("fast", () =>{
            $("body").toggleClass("hidden");
        });

        /* if (!cont_card.hasClass("open-cart")) {
            cont_card.addClass("open-cart");
            icon_card.addClass("move-icon");
            cont_total.addClass("move-total");
        }else{
            cont_card.removeClass("open-cart");
            icon_card.removeClass("move-icon");
            cont_total.removeClass("move-total");
        } */

    },
    
    recargar : function(url) {
        setTimeout(function(){
            window.location.href = url;
        },3000);
    },

    load : function() {

    },

    scroll : function() {

        let scrollVertical = $(window).scrollTop();

        // ----- Para el boton volver arriba
        let icon_back_up = $("#go_back_up");
        let height_banner = $("#banner").innerHeight(); 

        if (scrollVertical > height_banner) {
            icon_back_up.fadeIn("fast");
        }else{
            icon_back_up.fadeOut("fast");
        }

        // Para el header fijo 
        let header = $("#header");
        let height_header = $("#header").innerHeight();

        if (scrollVertical > height_header) {
            header.addClass("oscuro");
        }else{
            header.removeClass("oscuro");
        }

    }

}

$(document).ready(actions.ready);
$(window).load("on", actions.load);
$(window).scroll(actions.scroll);