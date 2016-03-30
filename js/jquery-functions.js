$(document).ready(function(){

	// MOBILE NAV	
	$('#icon-main-menu').click(
		function(){		
			$('nav').slideToggle(200);
			$(this).toggleClass('open');		
		}
	);
	
	
	//SMOOTH SCROLL	
	$(".scroll").click(function(event){
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top}, 1200);
	});
	
	
	//var $header = $('header');
		
	/*$(document).scroll(function() {
		$('.header-top').addClass('scrolled');
	});*/


	$headerTop = $('.header-top');
	var scrollState = 'top';
	
	$(window).scroll(function(){ 
	
		var scrollPos = $(window).scrollTop();
		
			if( ( scrollPos > 10 ) && ( scrollState === 'top' ) ) {
				$headerTop.addClass('scrolled');
				scrollState = 'scrolled';
				}       
			else if( ( scrollPos < 10 ) && ( scrollState === 'scrolled' ) ) {
				$headerTop.removeClass('scrolled');
				scrollState = 'top';
				}
	});

// WRAP CONTENT TABLES WITH CONTAINER DIV FOR MOBILE SCROLL PURPOSES	
	//$(".contentTable").not(".contentTable.stockQuote").wrap("<div class='contentTableContainer'></div>");

	
	/*// EXPAND & COLLAPSE	
	$(".expand-link").click(
		function(){		
			$(this).parent().find(".expand-content").slideToggle(400);
			$(this).toggleClass("active");
		}
	);*/	
	

});



function submitForm()
{
	//console.log(window.grecaptcha.getResponse());
	
	if (window.grecaptcha.getResponse() != 'g-recaptcha-response')
	{
		return true;
	}
	else
	{
		alert('Please click the Google Captcha');
		return false;
	}
}


