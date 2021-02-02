jQuery(document).ready(function(){if($(window).width()<768)
{$('#menuD').addClass('mobilenav');if($(window).width()<375)
{$('#caleG').addClass('hidden-xs');$('.tasti').addClass('hidden-xs');$('.tasti2').css("display","block");$('#caleP').css("display","block");}}else
{}
$(".bottfigo").click(function(e){$(".ripple").remove();var posX=$(this).offset().left,posY=$(this).offset().top,buttonWidth=$(this).width(),buttonHeight=$(this).height();$(this).prepend("<span class='ripple'></span>");if(buttonWidth>=buttonHeight){buttonHeight=buttonWidth;}else{buttonWidth=buttonHeight;}
var x=e.pageX-posX-buttonWidth/2;var y=e.pageY-posY-buttonHeight/2;$(".ripple").css({width:buttonWidth,height:buttonHeight,top:y+'px',left:x+'px'}).addClass("rippleEffect");});});