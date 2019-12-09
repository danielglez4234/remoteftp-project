/*------------------------Nav Fixed-------------------------------*/
$(window).scroll(function(){
    if ($(window).scrollTop() >= 1) {
       $('.nav_fixed').addClass('fixed-header');
       $('.logo').addClass('logo_fixed');
    }
    else {
       $('.nav_fixed').removeClass('fixed-header');
       $('.logo').removeClass('logo_fixed');
    }
});
// ----------------------FIN Nav Fixed-----------------------------
// ---------------------Menu Responsive----------------------------
(function($) {
$.fn.menumaker = function(options) {
 var cssmenu = $(this), settings = $.extend({
   format: "dropdown",
   sticky: false
 }, options);
 return this.each(function() {
   $(this).find(".button").on('click', function(){
     $(this).toggleClass('menu-opened');
     var mainmenu = $(this).next('ul');
     if (mainmenu.hasClass('open')) {
       mainmenu.slideToggle().removeClass('open');
     }
     else {
       mainmenu.slideToggle().addClass('open');
       if (settings.format === "dropdown") {
         mainmenu.find('ul').show();
       }
     }
   });
   cssmenu.find('li ul').parent().addClass('has-sub');
multiTg = function() {
     cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
     cssmenu.find('.submenu-button').on('click', function() {
       $(this).toggleClass('submenu-opened');
       if ($(this).siblings('ul').hasClass('open')) {
         $(this).siblings('ul').removeClass('open').slideToggle();
       }
       else {
         $(this).siblings('ul').addClass('open').slideToggle();
       }
     });
   };
   if (settings.format === 'multitoggle') multiTg();
   else cssmenu.addClass('dropdown');
   if (settings.sticky === true) cssmenu.css('position', 'fixed');
resizeFix = function() {
  var mediasize = 1000;
     if ($( window ).width() > mediasize) {
       cssmenu.find('ul').show();
     }
     if ($(window).width() <= mediasize) {
       cssmenu.find('ul').hide().removeClass('open');
     }
   };
   resizeFix();
   return $(window).on('resize', resizeFix);
 });
  };
})(jQuery);

(function($){
$(document).ready(function(){
$(".cssmenu").menumaker({
   format: "multitoggle"
});
});
})(jQuery);
// ---------------------FIN MENU RESPONSIVE----------------------------

// ------------------Formulario Registrate-------------------
var modal = document.getElementById('id01');
var modal2 = document.getElementById('id02');
var modal3 = document.getElementById('id03');
var modal4 = document.getElementById('edit_producto');
var modal5 = document.getElementById('modificar_producto');
var modal6 = document.getElementById('boton_mostar_prodct');
var modal6 = document.getElementById('modificar_cliente');

// Se cierra cundo se toca fuera del div
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
    if (event.target == modal3) {
        modal3.style.display = "none";
    }
}
//----------------------FIN Formulario Registrate------------------------------------------
//--------------------Slider imaganes descripcion------------------------------------------
jQuery(document).ready(function ($) {

  $('#checkbox').change(function(){
    setInterval(function () {
        moveRight();
    }, 3000);
  });

	var slideCount = $('#slider ul li').length;
	var slideWidth = $('#slider ul li').width();
	var sliderUlWidth = slideCount * slideWidth;

	$('#slider').css({ width: slideWidth});

	$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

});
//-----------------------------------------Busqueda automatica------------------------------------------------------
// $(document).ready(function(){
//   $('#search').focus()
//
//   $('#search').on('keyup', function(){
//     var search = $('#search').val()
//     $.ajax({
//       type: 'POST',
//       url: 'php/search.php',
//       data: {'search': search}
//     })
//     .done(function(resultado){
//       $('#result').html(resultado)
//     })
//     .fail(function(){
//       alert('Hubo un error :( coñooooo')
//     })
//   })
// })
