jQuery(document).on('click', '.btn-next', function() { //debugger;




    //alert (jQuery(this).attr('step')+' next '+jQuery(this).attr('next'));
    //jQuery("#val-detalle"+jQuery(this).attr('step')).val()

    if (jQuery(this).attr('idform')) {

        //console.log(data.val()+' flujo:'+data.attr('idflujo')+' step:'+data.attr('idstep')+' form:'+data.attr('idform'));

        /////////////////////////////////////
        //jQuery(this).attr('idform')
        let pidform = jQuery(this).attr('idform');
        let prosa = jQuery("#val-detalle" + pidform).val();
        jQuery("input[type=hidden].wp").each(function() {
            console.log($(this).val());
            prosa = prosa.replace('@' + jQuery(this).attr('nombre') + '@', jQuery(this).val());
            //jQuery("#div-detalle"+pidform).html(prosa);
            jQuery("#val-detalle" + pidform).val(prosa);
        });
        /*

        prosa = prosa.replace('@'+jQuery(this).attr('nombre')+'@',jQuery(this).val());
        			jQuery("#div-detalle"+id.attr("idform")).html(prosa);
        			jQuery("#val-detalle"+id.attr("idform")).val(prosa);
        */
        ////////////////////////////////////
        let data = jQuery("#val-detalle" + jQuery(this).attr('idform'));
        if (jQuery("#wizard").valid()) {
            $.ajax({
                type: "post",
                url: '/wp-admin/admin-ajax.php', // Pon aquí tu URL
                data: {
                    action: "grabarTutela",
                    id_flujo: data.attr('idflujo'),
                    id_step: data.attr('idstep'),
                    id_form: data.attr('idform'),
                    id_tutela: data.attr('idtutela'),
                    valor: data.val()
                },
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {
                    // Actualiza el mensaje con la respuesta
                    console.log(response);
                }
            });
        }

    }


    if (jQuery(this).attr('next') == 0) {
        var opcion = confirm("Desea Finalizar y proceder al pago");
        if (opcion == true) {
            jQuery("#step" + jQuery(this).attr('step')).css('display', 'none');
            jQuery("#step" + jQuery(this).attr('next')).css('display', 'block');


            $.ajax({
                type: "post",
                url: '/wp-admin/admin-ajax.php', // Pon aquí tu URL
                data: {
                    action: "generaPdf",
                    id_flujo: jQuery('#idflujoh').val(),
                    id_tutela: jQuery('#idtutelah').val(),

                },
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {
                    // Actualiza el visor
                    let src = jQuery(".pdfjs-viewer").attr("src");
                    jQuery(".pdfjs-viewer").attr("src", src);
                    console.log(response);
                }
            });


        } else {
            //mensaje = "Has clickado Cancelar";
        }
    } else {
        if (jQuery(this).attr('idform')) {
            if (jQuery("#wizard").valid()) {

                jQuery("#step" + jQuery(this).attr('step')).css('display', 'none');
                jQuery("#step" + jQuery(this).attr('next')).css('display', 'block');
            }
        } else {
            jQuery("#step" + jQuery(this).attr('step')).css('display', 'none');
            jQuery("#step" + jQuery(this).attr('next')).css('display', 'block');
        }
    }


    jQuery('.componente2').removeClass('contenedor_botones');


});

jQuery(document).on('click', '.btn-back', function() {
    jQuery("#step" + jQuery(this).attr('step')).css('display', 'none');
    jQuery("#step" + jQuery(this).attr('back')).css('display', 'block');
    //alert (jQuery(this).attr('step')+' next '+jQuery(this).attr('next'));
    if (jQuery(this).attr('idform')) {
        let data = jQuery("#val-detalle" + jQuery(this).attr('idform'));
        console.log(data.val() + ' flujo:' + data.attr('idflujo') + ' step:' + data.attr('idstep') + ' form:' + data.attr('idform'));

        $.ajax({
            type: "post",
            url: '/wp-admin/admin-ajax.php', // Pon aquí tu URL
            data: {
                action: "backBorrarTutela",
                id_flujo: data.attr('idflujo'),
                id_step: data.attr('idstep'),
                id_form: data.attr('idform'),
                id_tutela: data.attr('idtutela'),
                valor: data.val()
            },
            error: function(response) {
                console.log(response);
            },
            success: function(response) {
                // Actualiza el mensaje con la respuesta
                console.log(response);
            }
        });


    }
    jQuery('.componente2').removeClass('contenedor_botones');
});

jQuery(document).on('blur', 'input,select', function() { //debugger;
    let id = jQuery(this);
    let prosa = jQuery("#text-detalle" + id.attr("idform")).val();
    jQuery("input[idform=" + id.attr("idform") + "],select[idform=" + id.attr("idform") + "]").each(function() {
        console.log($(this).val() + ' ' + $(this).attr('idform'));
        prosa = prosa.replace('@' + jQuery(this).attr('nombre') + '@', jQuery(this).val());
        jQuery("#div-detalle" + id.attr("idform")).html(prosa);
        jQuery("#val-detalle" + id.attr("idform")).val(prosa);
    });
    jQuery("input[type=hidden].wp").each(function() {
        console.log($(this).val());
        prosa = prosa.replace('@' + jQuery(this).attr('nombre') + '@', jQuery(this).val());
        jQuery("#div-detalle" + id.attr("idform")).html(prosa);
        jQuery("#val-detalle" + id.attr("idform")).val(prosa);
    });
    jQuery(this).valid();
});
jQuery(document).on('ready', function() {
    jQuery('.componente2').removeClass('contenedor_botones');
    $("#filtro").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".table tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    jQuery('.prosa').css('display', 'none');

    jQuery.extend(jQuery.validator.messages, {
        required: "Este campo es obligatorio.",
        remote: "Por favor, rellena este campo.",
        email: "Por favor, escribe una dirección de correo válida",
        url: "Por favor, escribe una URL válida.",
        date: "Por favor, escribe una fecha válida.",
        dateISO: "Por favor, escribe una fecha (ISO) válida.",
        number: "Por favor, escribe un número entero válido.",
        digits: "Por favor, escribe sólo dígitos.",
        creditcard: "Por favor, escribe un número de tarjeta válido.",
        equalTo: "Por favor, escribe el mismo valor de nuevo.",
        accept: "Por favor, escribe un valor con una extensión aceptada.",
        maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
        minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
        rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
        range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
        max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
        min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
    });
});

jQuery(document).on("click", ".btn-grid", function(e) {
    //console.log(jQuery(this).attr("flujo"));
    let flj = jQuery(this).attr("flujo");
    $.ajax({
        type: "post",
        url: '/wp-admin/admin-ajax.php', // Pon aquí tu URL
        data: {
            action: "iniciarTutela",
            id_flujo: flj
        },
        error: function(msg) {
            console.log('error' + response);
        },
        success: function(msg) { //debugger;
            $.ajax({
                type: "post",
                url: '/wp-admin/admin-ajax.php', // Pon aquí tu URL
                data: {
                    action: "test_constructor2",
                    flujo: flj,
                    tutela: msg.replaceAll('\n', '').replaceAll(' ', ''),
                    //valor : data.val()
                },
                error: function(response) {
                    console.log('error' + response);
                },
                success: function(response) { //debugger;
                    // Actualiza el mensaje con la respuesta
                    //console.log(response);
                    $("#content-full-result").html(response);
                    //$("#wizard").validate();
                    jQuery('.prosa').css('display', 'none');
                }
            });
        }
    });


});
/*jQuery(document).on('blur', 'input',  function(){
	let prosa = jQuery("#text-detalle").val().replace('@'+jQuery(this).attr('nombre')+'@',jQuery(this).val());
	jQuery("#div-detalle").html(prosa);
});

jQuery(document).on('blur', 'select',  function(){//debugger;
	let prosa = jQuery("#text-detalle").val().replace('@'+jQuery(this).attr('nombre')+'@',jQuery(this).val());
	jQuery("#div-detalle").html(prosa);
 });*/