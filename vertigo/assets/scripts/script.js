$("#burger_menu").click(function () {
  $(".top_nav").toggleClass("active");
});
$(document).ready(function(){ 
  $("#phone").inputmask("+7 (999) 999-99-99");
  $("#number_product").inputmask("9999");
  $("#time").inputmask("99:99");
  $("#date").inputmask("99.99.99");
});

let anchor = $("#welcome_arrow");
$("#welcome_arrow").on('click', function(e){
  e.preventDefault();
  var href = $(this).attr('href');
  $('html, body').animate({
    scrollTop: $(href).offset().top
  }, 'slow');
})