<?php get_header(); ?>

<div class="container titulos_asesoria_virtual"> 

<p style="color: #5cdaed;">Agenda</p>

<h2 style="font-weight: bold;">Tu cita</h2>

 <div class="cuadroazul"></div>
 
 <p>
     Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
 </p>

</div>

<div class="container imagen_asesoria" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_asesoria_virtual_imagen_asesoriaVirtual', true); ?>);">
    
    
</div>

<div class="container div_boton_asesoria">
    <a href="https://tutelas.tmssas.com/test/?flujo=1&tutela=1" style="text-docoration: none; color: black;"> Agenda tu cita</a>
</div>

<?php get_footer(); ?>