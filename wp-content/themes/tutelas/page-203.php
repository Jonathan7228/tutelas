<?php get_header(); ?>
   
   <div class="container-fluid"> 
   
       <div class="row contenido_registro">
            <div class="col-md-6 text-center imagen_registro" style="z-index: -500; background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_registro_imagen_registro', true); ?>);">
                <?php echo get_post_meta(get_the_ID(),'tut_registro_titulo_imagen', true); ?>
                <?php echo get_post_meta(get_the_ID(),'tut_registro_texto_imagen', true); ?>        
            </div>
            <div class="col-md-6">
              <div class="row encabezado_inicio_sesion">
                
                <div class="col-12">
                        <?php echo get_post_meta(get_the_ID(),'tut_registro_titulo_formulario', true); ?>
                 </div>
                 
                 
                  <div class="cuadroazul"></div>
                 
                 
                
                <div class="col-12">
                      <?php echo get_post_meta(get_the_ID(),'tut_registro_texto_formulario', true); ?>
                </div>
                    
                   
            </div>
               
                
               <?php echo do_shortcode('[ultimatemember form_id="159"]'); ?>
           </div>
       </div>
   </div>
   
<?php get_footer(); ?>


<script type="text/javascript">
console.log("hola mundo desde javascript en la pagnia registro");
var boton = document.querySelector('#um-submit-btn');
boton.style.backgroundColor = "black"; 
boton.style.color = "white"; 
boton.value = "INICIAR AHORA"; 
console.log(boton.value)
boton.classList.add('prueba_boton_largo');
console.log(boton)
var err = document.querySelector(".um-notice");
var div = document.querySelector(".um-field-checkbox");
div.style.position = "relative";
div.style.top = "-240px";
var div2 = document.querySelector(".um-col-alt");
div2.style.position = "relative";
div2.style.top = "-160px";
var div3 = document.querySelector(".um-right .um-button")
div3.style.backgroundColor = "white !important";
div3.classList.add('prueba_boton');
div3.innerHTML = "¿Ya tienes cuenta?   Inicio sesión"

var left = document.querySelector(".um-left");
left.classList.add('prueba_boton_ancho');



console.log(left)


div_azul_footer
</script>





