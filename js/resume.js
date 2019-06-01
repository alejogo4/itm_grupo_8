(function($) {
    "use strict"; // Start of use strict

    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: (target.offset().top)
                }, 1000, "easeInOutExpo");
                return false;
            }
        }
    });

    // Closes responsive menu when a scroll trigger link is clicked
    $('.js-scroll-trigger').click(function() {
        $('.navbar-collapse').collapse('hide');
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
        target: '#sideNav'
    });

    $(".nav-link").click(function() {

        $.ajax({
            url: 'php/activarActividad.php',
            data: { actividad: 'actividad' },
            type: 'post',
            success: function(output) {

            }
        });

    })




})(jQuery); // End of use strict


function traerDatos(emails) {
    $.post("php/datos_user.php", { email: emails }, function(datos) {
        var data = JSON.parse(datos);
        for (var i = 0; i < data.length; i++) {

            if (emails == data[i].email) {
                console.log(data[i]);
            }
        }

        //Si entra en esta funcion limpio los campos
        /*$("#asuntoI").val("");
        $("#mensajeI").val("");

        $(".mensajeExito").fadeIn(1000).fadeOut(6000);*/

    })
}