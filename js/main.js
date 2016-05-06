jQuery(document).ready(function($){


 	 $("a.scrollto").click(function(){

			event.preventDefault();
			 			  
			var scrollamount =$($(this).attr("href")).offset().top; 

			$('html,body').animate({scrollTop:scrollamount},800,"swing");
		});

});

 