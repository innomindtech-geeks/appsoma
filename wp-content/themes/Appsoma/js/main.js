			
$(document).ready(function(e) {
	var pathname = window.location.protocol + "//" + window.location.hostname;	
	
	 $("#request_form").validationEngine('attach',{
            onValidationComplete:function(form,status){
				
                if(status== true){
					
		          
                    $.ajax({
                        type:'POST',
                        url:pathname+"/wp-content/plugins/RequestDemo/request_save.php",
                        data:jQuery("#request_form").serialize(),
                        success:function(html){
							
							
                            if(html == 'success'){
                           	                  
                            $("#request").slideUp("slow");
                            $("#request").attr("disabled","disabled");
                            $("#request").html("<h4 id='send_message2' style='color:#00989d;padding:25px;text-align:center;'>Thank you for your Request, we will get in touch with you soon!</h4>");
                            $("#request").fadeIn("slow");
                            }else{
                                alert("Message sending failed");
                            }
                         },
                        dataType:"text"
                    });
                }else{
                    return false;
                }
            }
        });
		
		
		

	 $("#sign_up").validationEngine('attach',{
            onValidationComplete:function(form,status){
				
                if(status== true){
					
		          
                    $.ajax({
                        type:'POST',
                        url: pathname+ "/wp-content/themes/Appsoma/register_save.php",
                        data:jQuery("#sign_up").serialize(),
                        success:function(response){	
						                   
                           	                 
                            $("#sign_up").slideUp("slow");
                            $("#sign_up").attr("disabled","disabled");
                            $("#sign_up").html("<h4 id='send_message3' style='color:#00989d;padding:25px;text-align:center;'>Registered Successfully!</h4>");
                            $("#sign_up").fadeIn("slow");                           
                              
							 
                         },
                        dataType:"text"
                    });
                }else{
                    return false;
                }
            }
        });
		
		
	$("#loginform").validationEngine('attach',{
            onValidationComplete:function(form,status){
				
                if(status== true){
										
		                 $.ajax({
                        type:'POST',
                        url: pathname + "/wp-content/themes/Appsoma/login_save.php",
                        data:jQuery("#loginform").serialize(),
                        success:function(html){									
                           
                           	                  
                            if(html == 'success'){ 
							$("#login").slideUp("slow");                          
						    window.location.assign( pathname )                          
							  }
							  else{
								   alert("Login failed");
							  }
							  
                                                  
                              
                            
                         },
                        dataType:"text"
                    });
               
                }else{
                    return false;
                }
            }
        });
	
	
	

	/*$('#mobileNavIcon').sidr({
      name: 'sidr-nav',
	  side: 'right',
      source: '#headerNavArea'
    });*/
	
	/*var myScroll;
	function loaded () {
		myScroll = new IScroll('#company-tabs-scroll', { scrollX: true, scrollY: false, mouseWheel: true });
	}
	document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);  */
	
		$('#headerNavArea').slicknav({
				label:'',
				prependTo:'#mastHead'
		});
		
	
	
/*Position footer */
	$(window).bind("load", function() { 
	   
       var footerHeight = 0,
           footerTop = 0,
           $footer = $("#pageFooter");
           
       positionFooter();
       
       function positionFooter() {
       
                footerHeight = $footer.height();
                footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";
       
               if ( ($(document.body).height()+footerHeight) < $(window).height()) {
                   $footer.css({
                        position: "fixed"
                   })
               } else {
                   $footer.css({
                        position: "static"
                   })
               }
               
       }

       $(window)
               .scroll(positionFooter)
               .resize(positionFooter)
               
		});
		
		
/* Mobile Menu */

		
			
		$('.scorllDown').click(function(){
			$('html, body').animate({
				scrollTop: $('.homeCont').offset().top
			}, 1000, 'easeInOutExpo');
			return false;
		});

/* Set Splash Height */    
		setSplashHeight();
		
		function setSplashHeight(){
			var height = $(window).height();
			//var headHeight = $('#headerWrap').outerHeight();
			//var splashHeight = height-headHeight;
			var splashHeight = height;
			$('#homeSplash').css({'height': splashHeight});
		}
		
		$(window).resize(function(e) {
		 	setSplashHeight();
		});
		
		
/* Toggle Alignment */

		$('.contCategory:even').addClass('alternate');
		$('.contCategory').last().css({'border-bottom':0, 'margin-bottom':0});

		$('.homeCont .contCategory').removeClass('alternate');
		$('.homeCont .contCategory:odd').addClass('alternate');
		
		
		$('.company-tabs a').first().css({'margin-left':0});
		$('.company-tabs a').last().css({'margin-right':0});
		
		/* Make company tabs scrollable on smaller screens */
		if($(window).width() < 550){
			$("#company-tabs-scroll").smoothTouchScroll();
		}
		$(window).resize(function(e) {
			$("#company-tabs-scroll").smoothTouchScroll();
			if($(window).width() > 550){
				$("#company-tabs-scroll").smoothTouchScroll("destroy");
			}
		});

		
		$('.createAcc').click(function() {
            $('#login').modal('hide');
			$('#signup').delay(2000).modal('show');
        });
		$('.existLogin').click(function() {
            $('#signup').modal('hide');
			$('#login').delay(2000).modal('show');
        });
		
		
		
/* Nav arrow postioning in Feature-Company pages */
		
		setNavArrow();
		
		function setNavArrow(){
			if(($('.feature-tabs').length) || ($('.company-tabs').length) ){
			var width = $(window).width();
			if($('.feature-tabs').length){
				var tab =$('.feature-tabs').find('a.actv');
			}else if($('.company-tabs').length){
				var tab =$('.company-tabs').find('a.actv');
			}
			//console.log((tab).outerWidth());
			var tWidth =(tab.outerWidth())/2;			
			var offset = tab.offset();
			var perc = (((offset.left+tWidth)/width)*100)+'%';
			
			$('#feature-select .pointer').stop().animate({'left':perc},2000, 'easeOutExpo');
			$('#company-select .pointer').stop().animate({'left':perc},2000, 'easeOutExpo');
			
		}
		
		}
		
		$(window).resize(function(e) {
		 	setNavArrow();
		});
		
/* Contact */
		
		$('.contactCatg').last().css({'border-bottom':0, 'margin-bottom':0});
		$('.featuresTableRow').last().find('.col1,.col2,.col3').css({'border-bottom':0});
		
});

