$(document).ready(function(){
	$("a.mobile").click(function(){
		$(".sidebar").slideToggle('fast');
	});
	window.onresize = function(event) {
		if ($(window).width() > 320) {
			$(".sidebar").show();
		}
	};
});

( function( $ ) {
$( document ).ready(function() {
$(document).ready(function(){

$('.sidebar ul ul li:odd').addClass('odd');
$('.sidebar ul ul li:even').addClass('even');
$('.sidebar > ul > li > a').click(function() {
  $('.sidebar li').removeClass('active');
  $(this).closest('li').addClass('active');	
  var checkElement = $(this).next();
  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    $(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    $('.sidebar ul ul:visible').slideUp('normal');
    checkElement.slideDown('normal');
  }
  if($(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false;	
  }		
});

});

});
} )( jQuery );