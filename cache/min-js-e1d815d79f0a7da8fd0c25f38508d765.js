jQuery(document).ready(function($){$('.newsletter_subscription_submit').live('click',function(){var $parent=$(this).parents('.newsletter_subscription_box');if(!validateEmail($parent.find('.newsletter_subscription_email').val())){$parent.find('.newsletter_subscription_messages *').hide();$parent.find('.newsletter_subscription_messages .newsletter_subscription_message_wrong_email').show();return false;}
var current_name='';if($parent.find('.newsletter_subscription_name').length>0){current_name=$parent.find('.newsletter_subscription_name').val();}
$parent.find('.newsletter_subscription_form').hide();$parent.find('.newsletter_subscription_ajax').show();$.post(tf_script.ajaxurl,{action:'tfuse_ajax_newsletter',tf_action:'tfuse_ajax_newsletter_save_email',email:$parent.find('.newsletter_subscription_email').val(),name:current_name},function(data){$parent.find('.newsletter_subscription_ajax').hide();$parent.find('.newsletter_subscription_form').show();if(data.status==-2){$parent.find('.newsletter_subscription_messages *').hide();$parent.find('.newsletter_subscription_messages .newsletter_subscription_message_wrong_email').show();}
else if(data.status==-1){$parent.find('.newsletter_subscription_messages *').hide();$parent.find('.newsletter_subscription_messages .newsletter_subscription_message_failed').show();setTimeout(function(){$parent.find('.newsletter_subscription_messages *').hide();$parent.find('.newsletter_subscription_messages .newsletter_subscription_message_initial').show();},3000);}
else if(data.status==1){$parent.find('.newsletter_subscription_messages *').hide();$parent.find('.newsletter_subscription_messages .newsletter_subscription_message_success').show();}},'json');return false;});function validateEmail(email){if(!email)
return false;var emailReg=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;if(!emailReg.test(email)){return false;}else{return true;}}});
/* end of /wp-content/themes/medica-parent/framework/extensions/newsletter/static/js/newsletter_clientside.js */
(function($){$.fn.playSlider=function(options){var defaults={content:".slide-content",children:"li",transition:"fade",animationSpeed:300,easing:'swing',indicatorEasing:'linear',autoplay:false,autoplaySpeed:tf_slider_interval.interval,navigation:true,arrows:true,arrowsHide:false,keyBrowse:true,preloadImages:true,itemSize:{width:960,height:496},prev:"prev",next:"next",play:"play",pause:"pause",running:false,auto_running:false,speed:0,animationStart:function(){},animationComplete:function(){}};var option=$.extend({},defaults,options);return this.each(function(){var $t=$(this),item=$t.children(option.content).children(option.children),item_img=item.find('img'),sliderContent=$t.find(option.content),l=item.length-1,w=item.width(),h=item.height(),allImage=[],step=0,indicator=jQuery('.progressIndicator'),is_stop=false,front_item,front_item_img,next_item,next_item_img,navigation,arrows,z,on,bullet,evt,cc=0;var slider={init:function(){if(option.preloadImages){$(".prealoadImages").remove();$t.append('<img src="'+tf_script.img_url+'/theme_config/extensions/slider/designs/play/static/images/loading.gif" class="prealoadImages" />');item_img.hide();item_img.each(function(i){allImage[i]=$(this).attr('src');});slider.preLoadImages(allImage,function(){item_img.show();$("img.prealoadImages").hide();slider.load_slider();});}else{slider.load_slider();}},load_slider:function(){slider.data();if(option.navigation===true){slider.navigation.create();}
if(option.arrows===true){slider.arrows.create();}
if(option.autoplay===true){slider.autoplay();}
slider.triggers();},data:function(){item.each(function(i){var $this=$(this);$this.css("z-index",-(i-l));$this.find('img').css("opacity",0);});if(option.transition==="fade"){item.eq(0).addClass('on').find('img').css("opacity",1);}},preLoadImages:function(imageList,callback){var pic=[],i,total,loaded=0;if(typeof imageList!=='undefined'){if($.isArray(imageList)){total=imageList.length;for(i=0;i<total;i++){pic[i]=new Image();pic[i].onload=function(){loaded++;if(loaded===total){if($.isFunction(callback)){callback();}}}
pic[i].src=imageList[i];}}
else{pic[0]=new Image();pic[0].onload=function(){if($.isFunction(callback)){callback();}};pic[0].src=imageList;}}
pic=undefined;},zindex:{prev:function(){if(step===l){item.eq(0).css("z-index",l+3);}else{item.css("z-index",l+1);}
item.eq(step).css("z-index",l+4).next(item).css("z-index",l+2);},next:function(){item.css("z-index",l+1).eq(step).css("z-index",l+3).prev(item).css("z-index",l+2);},navigation:function(){item.css("z-index",l+1).eq(on).css("z-index",l+2);item.eq(step).css("z-index",l+3);},trigger:function(){if(z===1){slider.zindex.next();}else{if(z===-1){slider.zindex.prev();}else{if(z===0){slider.zindex.navigation();}}}}},slide:{progressBar:function(fromStart){if(option.auto_running===true)return false;var onElement=navigation.find('li').eq(step),onElement_pos=onElement.position(),toLeft=parseInt(onElement_pos.left)<0?0:parseInt(onElement_pos.left);navigation.find('.textOverlay').animate({left:toLeft+"px"},(option.animationSpeed/2));sliderContent.find('.on').removeClass('on');navigation.find('.on').removeClass('on');navigation.find('li').eq(step).find('a').addClass('on');var toWidth=0;if(w<768)
{toWidth=w;}
else
{toWidth=(parseInt(onElement.width())*(parseInt(step)+1));}
if(fromStart===true){indicator.css({width:toLeft+"px"});}
if(is_stop==true)return false;var space=toWidth-indicator.width();if(option.speed==0){option.speed=toWidth/option.autoplaySpeed;}
var new_time=(space/option.speed);indicator.animate({width:toWidth},{duration:new_time,easing:option.indicatorEasing,complete:function(){slider.animation.next_item(true);}});},fade:function(fromStart){option.animationStart.call(this);front_item=sliderContent.find('.on');front_item_img=front_item.find('img');next_item=item.eq(step);next_item_img=next_item.find('img');slider.zindex.trigger();slider.slide.progressBar(fromStart===true?true:false);next_item.addClass('on');front_item_img.animate({opacity:0},option.animationSpeed,option.easing);next_item_img.animate({opacity:1},option.animationSpeed,option.easing,function(){option.animationComplete.call(this);option.running=false;});}},animation:{previous:function(fromStart){if(step===0){step=l;}else{step--;}
z=-1;switch(option.transition){case"fade":slider.slide.fade(fromStart);break;}},next_item:function(fromStart){if(step>=l){step=0;}else{step++;}
z=1;switch(option.transition){case"fade":slider.slide.fade(fromStart);break;}}},keyBrowse:function(){$(document).keyup(function(e){if(e.keyCode===37){if(option.running){return false;}
option.running=true;option.auto_running=false;indicator.stop();slider.animation.previous(true);if(option.navigation===true){slider.navigation.update();}
return false;}
if(e.keyCode===39){if(option.running){return false;}
option.running=true;option.auto_running=false;indicator.stop();slider.animation.next_item(true);if(option.navigation===true){slider.navigation.update();}
return false;}
return false;});},autoplay:function(){if(option.autoplay===true){slider.slide.progressBar(true);}},navigation:{create:function(){$t.find(".navigation").remove();$t.append($("<ul />").addClass("navigation"));navigation=$t.find(".navigation");for(i=0;i<=l;i++){navigation.append($("<li />").css({width:(w/(l+1))+"px",overflow:'hidden'}).append($("<a />").attr({href:"#",rel:i}).text(item.eq(i).find('h3').text())));}
navigation.find('a:last').css('background','none');navigation.append($("<li />").addClass('textOverlay').css({width:(w/(l+1))+"px",height:'49px',left:'0px'}));},trigger:function(){bullet=navigation.find("a");bullet.eq(0).addClass("on");bullet.click(function(){var b=$(this),rel=b.attr("rel");on=bullet.filter(".on").attr("rel");step=rel;sign=rel>on?"+":"-";option.auto_running=false;z=0;if(!b.hasClass("on")){switch(option.transition){case"fade":indicator.stop();slider.slide.fade(true);break;}}
bullet.removeClass("on");b.addClass("on");return false;});},update:function(){bullet.removeClass("on").eq(step).addClass("on");}},arrows:{create:function(){$(".nextBackControllers").remove();$t.append($("<div />").addClass("nextBackControllers"));arrows=$t.find(".nextBackControllers");arrows.append($("<a />").attr("href","#").addClass(option.prev).text("Previous"));arrows.append($("<a />").attr("href","#").addClass(option.pause).text("Pause").css('display',(option.autoplay===true?'block':'none')));arrows.append($("<a />").attr("href","#").addClass(option.play).text("Play").css('display',(option.autoplay!==true?'block':'none')));arrows.append($("<a />").attr("href","#").addClass(option.next).text("Next"));},trigger:function(){arrows.find("."+option.pause).click(function(){if(option.auto_running){return false;}
option.auto_running=true;is_stop=true;$(this).css('display','none')
arrows.find("."+option.play).css('display','block')
indicator.stop();return false;});arrows.find("."+option.play).click(function(){option.auto_running=false;is_stop=false;$(this).css('display','none')
arrows.find("."+option.pause).css('display','block')
slider.slide.progressBar(false);return false;});arrows.find("."+option.prev).click(function(){if(option.running){return false;}
option.running=true;option.auto_running=false;indicator.stop();slider.animation.previous(true);if(option.navigation===true){slider.navigation.update();}
return false;});arrows.find("."+option.next).click(function(){if(option.running){return false;}
option.running=true;option.auto_running=false;indicator.stop();slider.animation.next_item(true);if(option.navigation===true){slider.navigation.update();}
return false;});if(option.arrowsHide===true){arrows.find('a').hide();$t.hover(function(){$t.mousemove(function(e){var offset=$(this).offset();var x=e.pageX-(offset.left);if(x<w/2){arrows.find("."+option.next).hide();arrows.find("."+option.prev).fadeIn(150);}else{arrows.find("."+option.prev).hide();arrows.find("."+option.next).fadeIn(150);}});},function(){arrows.find('a').hide();});}}},triggers:function(){if(option.arrows===true){slider.arrows.trigger();}
if(option.navigation===true){slider.navigation.trigger();}
if(option.keyBrowse===true){slider.keyBrowse();}}};slider.init();});};}(jQuery));if(typeof(console)==='undefined'){var console={}
console.log=console.error=console.info=console.debug=console.warn=console.trace=console.dir=console.dirxml=console.group=console.groupEnd=console.time=console.timeEnd=console.assert=console.profile=function(){};}
/* end of /wp-content/themes/medica-parent/theme_config/extensions/slider/designs/play/static/js/playSlider.js */
jQuery(document).ready(function($){var showcase_dup=jQuery('.playSlider').clone();showcase_dup.attr('id','playSlider-dup');showcase_dup.hide();function Defaults()
{var screenRes=jQuery(window).width();var sliderWidth;var sliderHeight;if(screenRes>=960)
{sliderWidth=960;sliderHeight=444;}
if(screenRes<959)
{sliderWidth=768;sliderHeight=444;}
if(screenRes<767)
{sliderWidth=480;sliderHeight=444;}
if(screenRes<479)
{sliderWidth=320;sliderHeight=148;}
if(screenRes<319)
{sliderWidth=960;sliderHeight=444;}
$('.playSlider').playSlider({content:".slide-content",children:"li",transition:"fade",animationSpeed:1000,easing:'',autoplay:true,autoplaySpeed:tf_slider_interval.interval,bullets:false,arrows:true,arrowsHide:false,keyBrowse:true,preloadImages:true,itemSize:{width:sliderWidth,height:sliderHeight},animationStart:function(){},animationComplete:function(){}});}
Defaults();jQuery(window).resize(function()
{jQuery('.playSlider').replaceWith(showcase_dup.clone().attr('class','playSlider').show());Defaults();})});
/* end of /wp-content/themes/medica-parent/theme_config/extensions/slider/designs/play/static/js/playSliderOptions.js */
