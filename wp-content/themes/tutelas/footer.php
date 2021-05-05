<div class="container-fluid div_azul_footer">
    <div class="container margenes">
        <div class="row text-left">
            <div class="col-md-4 mb-4 pl-5">
                <p>Nuestra información de</p>
                <h3>contacto </h5>
            </div>
        <div class="col-md-4 mb-4">
            <div class="row text-left">
                <div class="col-2">
                    <img  src="<?php echo  get_template_directory_uri(); ?>/img/correo.png" >
                   
                </div>
                <div class="col-10">
                    <p>Correo electrónico</p>
                    <p class="titulo_blanco">info@tutelas.com</p>

                </div>

            </div>
            
        </div>
        <div class="col-md-4 ">
            <div class="row text-left">
                <div class="col-2">
                    <img  src="<?php echo  get_template_directory_uri(); ?>/img/llamada.png" >
                </div>
                <div class="col-10">
                    <p>Teléfono</p>
                    <p class="titulo_blanco">45067758</p>
                </div>

            </div>
            
        </div>

        </div>

       
    </div>


</div>  


<script>
    
    var contenedor_test = document.querySelector('#content-full-result');
    contenedor_test.classList.add('text-center');
   
   
      var boton = document.querySelector('#btn2');
            boton.style.backgroundColor = "#5cdaed";
       
 
     
     
     
 
    
    
</script>


<footer class="footer">
        <div class="container imagen-footer">   
     
          
             
            <div class="row justify-content-between ">
                <div class="col-md-4">

                    <img class="logo_footer" src="<?php echo  get_template_directory_uri(); ?>/img/logo@2x.png" >
                    <p class="text-left texto_footer">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable. 
                    </p>
                </div>
                <div class="col-md-4">

                    <h6 class="text-left titulo_menu">Menu</h6>
                   

                        <?php
                        $args = array(
                            'menu_class' => 'nav nav-footer  text-left',                            
                            'theme_location' => 'menu_footer'
                        );
                        wp_nav_menu($args);
                        ?> 
                </div>
                <div class="col-md-4">
                   
                   
                </div>
            </div>
        </div>
       
</footer>
<div class="container-fluid linea_footer text-center">
            <h6 class="copyright">Copyright &#169 <?php echo date('Y')?> Branch</h6>
</div>

<?php wp_footer(); ?>

</body>
</html>
