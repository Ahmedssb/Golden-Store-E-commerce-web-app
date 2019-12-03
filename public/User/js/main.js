/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){

	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

/*
$(document).ready(function(){
	 // change price and stock based on the size selected 
	$('#selSize').change(function(){
		var idSize = $(this).val();
		 if(idSize == ""){
			 return false;
		 }
		 $.ajax({
			  type:'get',
			  url:'/product-price',
			  data:{idSize:idSize},
			  success:function(resp){
				  alert(resp); return false;
				 $('#getPrice').html('US'+resp);
			  },error:function(){
				  alert('error');
			  }
		 });
		 
		});
		
	
	
});*/
$(document).ready(function(){
	 // change price and stock based on the size selected 
	$('#selSize').change(function(){
		var idSize = $(this).val();
	 
		 if(idSize == ""){
			 return false;
		 }
		 $.ajax({
			  type:'get',
			  url:'/product-price',
			  data:{idSize:idSize},
			  success:function(resp){
 				  var arr = resp.split("#");
				 $('#getPrice').html('US'+arr[0]);
				 
				  if(arr[1]== 0){
					  $("#cart_btn").hide();
					  $("#availability").text("Out of Stock");
				  }else{
					  $("#cart_btn").show();
					  $("#availability").text("In Stock");
					  $("#p-price").val(arr[0]);
				  }
			  },error:function(){
				  alert('error');
			  }
		 });
		 
		});
		
	
	
});

$(document).ready(function(){
	 
	 // replace product image with alternate image 
	$('.changeImage').click(function(){
		 var image = $(this).attr('src');
		 
		  $('.mainImage').attr('src',image);
		
	});
	
	 
});


 // code for easy zooom

// Instantiate EasyZoom instances
		var $easyzoom = $('.easyzoom').easyZoom();

		// Setup thumbnails example
		var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

		$('.thumbnails').on('click', 'a', function(e) {
			var $this = $(this);
 			e.preventDefault();

			// Use EasyZoom's `swap` method
			api1.swap($this.data('standard'), $this.attr('href'));
		});

		// Setup toggles example
		var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

		$('.toggle').on('click', function() {
			var $this = $(this);

			if ($this.data("active") === true) {
				$this.text("Switch on").data("active", false);
				api2.teardown();
			} else {
				$this.text("Switch off").data("active", true);
				api2._init();
			}
		});
		
 $(document).ready(function(){
	   //validate registeration form
     $('#registerForm').validate({
		 rules:{
			 name:{
				 required:true,
				 minlength:2
			 },
			  password:{
				 required:true,
				 minlength:6
			 },
			 email:{
				 required:true,
				email:true,
				remote:'Check-Email'
				 
			 }
		 },
		 
		 messages:{
		 name:'please enter your name',
		  password:{
			 required:'enter a password',
			 minlength:'password must be at least 6 char'
		 },
		 email:{
			 required:'please enter your email',
			 email:'please enter a valid email',
			 remote: 'Email already exist'
		 }
	 }
		 
		 
	 })
	 
	 //password strength
	 $('#Password').passtrength({
 
			tooltip:true,

			textWeak:"Weak",

			textMedium:"Medium",

			textStrong:"Strong",

			textVeryStrong:"Very Strong",
			  minChars: 6,
			 eyeImg :"../User/images/Register/eye.svg" // toggle icon


			});

	
	 
});


  // check current password is correct
  $('#current_pwd').keyup(function(){
	  var current_pwd = $(this).val();
	  $.ajax({
		    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
		  type:'post',
		  url:'/User/check-password',
		  data:{current_pwd:current_pwd },
		  success:function(resp){
			 if(resp=='false'){
				$("#check_pwd").html("Current password is incorrect").css("color", "red");
			 }else{
				$("#check_pwd").html(" Current password is correct").css("color", "green");
 
			 }
		  },error:function(){
			  alert('error');
		  }		
	   
	  });
	  
  });



 $(document).ready(function(){
	   //validate login form
     $('#loginForm').validate({
		 rules:{
			  password:{
				 required:true,
				 minlength:6
			 },
			 email:{
				 required:true,
				email:true,
 				 
			 }
		 },
		 
		 messages:{
 		  password:{
			 required:'enter a password',
			 minlength:'password must be at least 6 char'
		 },
		 email:{
			 required:'please enter your email',
			 email:'please enter a valid email',
 		 }
	 }
		 
		 
	 })
	 
	 
	
	 
});


 $(document).ready(function(){
	   //validate password update form
     $('#password_reset').validate({
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

 $(document).ready(function(){
	   //validate account form
     $('#accountForm').validate({
		 rules:{
			  name:{
				 required:true,
				 accept:""
			 },
			 address:{
				 required:true, 				 
			 },
			 city:{
				 required:true, 				 
			 },
			 state:{
				 required:true,
  				 
			 },
			 country:{
				 required:true,
  				 
			 },
			 pincode:{
				 required:true,
  				 
			 },
			 phone:{
				 required:true, 				 
			 }
			 
		 },
		 
		 messages:{
 		  name:{
			 required:'enter a name',
			 accept:'Name must contain letter only'
 		 },
		 address:{
			 required:'enter  address',
			 
 		 },
		 city:{
			 required:'enter  city',
			 
 		 },
		 state:{
			 required:'enter  state',
			 
 		 },
		 country:{
			 required:'select country',
			 
 		 },
		 pincode:{
			 required:'enter  pincode',
			 
 		 },
		 phone:{
			 required:'enter  phone',
			 
 		 }
	 }
		 
		 
	 })
	 
	 
	 
});



