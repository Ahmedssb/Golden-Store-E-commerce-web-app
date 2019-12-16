$.noConflict();

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	jQuery('.selectpicker').selectpicker;


	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	// $('.user-area> a').on('click', function(event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	$('.user-menu').parent().removeClass('open');
	// 	$('.user-menu').parent().toggleClass('open');
	// });


});

jQuery(document).ready(function(){
	   //validate admin password update form
     jQuery('#password_update').validate({
		 rules:{
			  current_pwd:{
				 required:true,
			 },
			 new_pwd:{
				 required:true,
				 minlength:6,
 				 
			 }
			 ,
			 confirm_pwd:{
				 required:true,
				 minlength:6,
				 equalTo:"#new_pwd"
 				 
			 }
		 },
		 
		 messages:{
 		  current_pwd:{
			 required:'please enter the current password',
 		 },
		 new_pwd:{
			 required:'please enter new passowrd',
			 minlength:'password must be at least 6 char'
 		 },
		 confirm_pwd:{
			 required:'please enter new passowrd',
			 minlength:'password must be at least 6 char',
			 equalTo:'password doesnot match'
 		 }
	 }
		 
		 
	 })
	 
	 
	
	 
});


  // check current password is correct
  jQuery('#current_pwd').keyup(function(){
	  var current_pwd = jQuery(this).val();
	  console.log(current_pwd);
	  jQuery.ajax({
		    headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
		  type:'post',
		  url:'/Admin/check-password',
		  data:{current_pwd:current_pwd },
		  success:function(resp){
			 if(resp=='false'){
				jQuery("#check_pwd").html("Current password is incorrect").css("color", "red");
			 }else{
				jQuery("#check_pwd").html(" Current password is correct").css("color", "green");
 
			 }
		  },error:function(){
			 alert('error');
		  }
            		  
	   
	  });
	  
  });
  
  
  
  

