 jQuery("#carousel").owlCarousel({
  autoplay: true,
  lazyLoad: true,
  loop: true,
  margin: 20,
   /*
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  */
  dots:false,
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  items: 1
}); 
  jQuery("#carousel1").owlCarousel({
  autoplay: true,
  lazyLoad: true,
  loop: true,
  margin: 20,
   /*
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  */
  dots:false,
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  items: 1
}); 
    jQuery("#singleproduct").owlCarousel({
  autoplay: true,
  lazyLoad: true,
  loop: true,
  margin: 20,
   
  dots:false,
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  items: 1
}); 

 jQuery(".owlcarousel_js").owlCarousel({
  autoplay: false,
  lazyLoad: true,
  loop: false,
  margin: 20,
   /*
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  */
  dots:false,
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  
     responsive:{
        0:{
            items:1,
            nav:true
        },
          500:{
            items:2,
            nav:false
        },

        768:{
            items:3,
            nav:false
        },
        1000:{
            items:4,
            nav:true,
            loop:false
        },
        1200:{
            items:5,
            nav:true,
            loop:false
        }
    }
}); 
   
 
 $(document).on('click', '.deliverylocation', function(){
$('#myModal').modal('show');
   });
   
$(document).on('click', '.citymentu li a', function(){  
 var baseurl=$('[name=base_url]').val();
      var city = $(this).attr("title"); 
      $(".statediv").show(); 
      $(".statediv").css("display","inline-block");  
      $.ajax({
       url: baseurl+'Home/getCityDepartment',
        method: 'post',
        data: {city: city},
        dataType: 'json',
        success: function(response){ 
         
          $('.droepsdfm').find('li').remove(); 
        
          $.each(response,function(index,data){
             $('.droepsdfm').append('<li><a href="#" >'+data['name']+'</a></li>');
           });
        }
     });
   });

     
  $(document).on('click', '.droepsdfm li a', function(){ 
        var text=$(this).text(); 
         var baseurl=$('[name=base_url]').val();
        $.ajax({
            url: baseurl+'Home/setlocation', //this is the submit URL
            type:"post", 
           data: {location:text}, 
            success: function(data){ 
              location.reload(); 
            }
        });

      });
 $(window).resize(function() {

   $("section.menu").css("padding-top", $("section.logo").height());
}).resize();
  $(document).ready(function()
  {
    console.log($(document.body));
      $("section.menu").css("padding-top", $("section.logo").height());
        $(".cart_items").hide();
        $(".basket_div").click(function(){
        $(".cart_items").toggle("slow");
        });

        $('.bottombar').click(function(){
  $('.signupdivs').show();
$('.logindiv').hide();
}); 
 $('.bottombar1').click(function(){
  $('.signupdivs').hide();
$('.logindiv').show();
});
    });

 

  $(function(){
         var sessionid=$('[name=base_url]').val();
        var baseurl=$('[name=base_url]').val();
   
 
        $('#myform').validate({ // initialize the plugin
        rules: {
            username: {
                required: true,
               
            },
            email: {
                required: true,
            
            },
             password: {
                required: true,
                minlength: 5
            },
             phone: {
                required: true,
                minlength: 10,
                digits: true
            },
        },
         submitHandler: function(form) {

          //alert(baseurl);
                 function makeid(l)
                {
                var text = "";
                var char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                for(var i=0; i < l; i++ )
                {  
                text += char_list.charAt(Math.floor(Math.random() * char_list.length));
                }
                return text;
                }
 
        var referalcode = makeid(8);
        
         
          $.ajax({
            url: baseurl+'Userlogin/registration', //this is the submit URL
            type:"post", 
           data: $(form).serialize()+ "&referalcode=" + referalcode,

            success: function(data){
              alert(data,"dataval");
              location.reload();
 
 
               
            }
        });
    }
    });

  $('#loginform').validate({ // initialize the plugin
        rules: {
          
            loginusername: {
                required: true,
                minlength: 5
            },
             loginpassword: {
                required: true,
                minlength: 5
            },
              
        },
         submitHandler: function(form1) {
          //alert(baseurl);  
         //alert($(form1).serialize());
          $.ajax({
            url: baseurl+'Userlogin/login_validation', //this is the submit URL
            type:"post", 
           data: $(form1).serialize(),
            success: function(result){
             alert(result);
              location.reload();
             // if(result=="Account Verified"){
             //  alert("FAsdfds");
             // }
 
 
               
            }
        });
    }
    });

    $('#forgotpassword').validate({ // initialize the plugin
        rules: {
          
            forgotpassworddf: {
                required: true,
              
            },
              
              
        },
         submitHandler: function(form1) {
     
         //alert($(form1).serialize());
          $.ajax({
            url: baseurl+'Mail/forgotpassword', //this is the submit URL
            type:"post", 
           data: $(form1).serialize(),
            success: function(result){
             //alert(result);
            location.reload();
              
            }
        });
    }
    });

   $('#addressadd').validate({ // initialize the plugin
        rules: {
          
            address1: {
                required: true,
                minlength: 5
            },
             address2: {
                required: true,
                minlength: 5
            },
              area: {
                required: true,
               
            },
              city: {
                required: true,
               
            },
              
        },
         submitHandler: function(form1) {
          //alert(baseurl);  
      // alert($(form1).serialize());
          $.ajax({
            url: baseurl+'Home/addaddress', //this is the submit URL
            type:"post", 
           data: $(form1).serialize(),
            success: function(result){
             //alert(result);
              location.reload();
             // if(result=="Account Verified"){
             //  alert("FAsdfds");
             // }
 
 
               
            }
        });
    }
    });
  $('#contactforms').validate({ // initialize the plugin
        rules: {
            txtName: {
                required: true,
               
            },
            txtEmail: {
                required: true,
            
            },
             txtMsg: {
                required: true,
               
            },
             txtPhone: {
                required: true,
                minlength: 10,
                digits: true
            },
        },
         submitHandler: function(form) {
 
 
 
         
          $.ajax({
            url: baseurl+'Mail/sendcontactmail', //this is the submit URL
            type:"post", 
           data: $(form).serialize() ,

            success: function(data){
              //alert(data,"dataval");
$(".validate_success").show();
  location.reload();
 
 
               
            }
        });
    }
    });
      
});


 

 

 
   $(document).on('click','.add',function(){
        var $qty=$(this).closest('p').find('.quantity');
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal)) {
            $qty.val(currentVal + 1);
        }
    });

    $(document).on('click','.minus',function(){
        var $qty=$(this).closest('p').find('.quantity');
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal) && currentVal > 1) {
            $qty.val(currentVal - 1);
        }
    });
 
 
 
$(document).ready(function(){

  $(".btnforgot").on("click",function(){
$('#forgotpass').modal('toggle');
  });

  var baseurl=$(".base_url").val();
  //alert(baseurl);
 
 $('.add_cart').click(function(){ 
  //alert("SAFD");

  
  var parent=$(this).parents(".product_list"); 
  var quantity = parent.find('input').val();
  var product_id = $(this).data("productid");
  var product_name = $(this).data("productname"); 
 var customer_id = $(this).data("customerid"); 
 var imagename =parent.find('img').data("imagename");
  var variableproduct = $(this).data("variableproduct");
 var variantid = parent.find('.listdrowdo option:selected', this).attr('for'); 
 if(variableproduct==2){
 var product_price = parent.find(".listdrowdo").val();
  var quantitys = parent.find('.listdrowdo option:selected', this).attr('title');
 } 
 else{
     var product_price = $(this).data("price");
  var quantitys = $(this).data("quantity");
 }
 // alert(quantitys);
  if(quantity != '' && quantity > 0)
  {
   $.ajax({
    url:baseurl+"Home/add",
    method:"POST",
    data:{product_id:product_id, customer_id:customer_id, quantity:quantity,
      product_name:product_name,product_price:product_price,imagename:imagename,variableproduct:variableproduct,
      quantitys:quantitys,variantid:variantid},
    success:function(data)
 {
  //alert(data);
 $('.cart_details').html(data);
 var numItems = $('.cart_items .carddiv').length;
$('.cartitems').text(numItems);
if(numItems<=0){
$('.basket_div i,.cartitems').removeClass("shaking");
}
else{
$('.basket_div i,.cartitems').addClass("shaking");
}
    }
   });
  }
  else
  {
   alert("Please Enter quantity");
  }
 });

  $('.add_cartsinglepage').click(function(){
  //alert("SAFD");
  var parent=$(this).parents(".product_details");  
  var quantity = parent.find('input').val(); 
  var product_id = $(this).data("productid"); 
  var product_name = $(this).data("productname"); 
 var customer_id = $(this).data("customerid");  
 var imagename =parent.find('img').data("imagename");
 var variableproduct = $(this).data("variableproduct");
 var variantid = parent.find('.listdrowdown option:selected', this).attr('for'); 
 if(variableproduct==2){ 
 var product_price = parent.find(".listdrowdown").val();
  var quantitys = parent.find('.listdrowdown option:selected', this).attr('title');
 } 
 else{
   var product_price = $(this).data("price");
  var quantitys = $(this).data("quantity");
 }
 
 
  if(quantity != '' && quantity > 0)
  {
   $.ajax({
    url:baseurl+"Home/add",
    method:"POST",
    data:{product_id:product_id, customer_id:customer_id, quantity:quantity,
      product_name:product_name,product_price:product_price,imagename:imagename,variableproduct:variableproduct,
      quantitys:quantitys,variantid:variantid},
    success:function(data)
    {
 $('.cart_details').html(data);
var numItems = $('.cart_items .carddiv').length;
 $('.cartitems').text(numItems);
 if(numItems<=0){
$('.basket_div i,.cartitems').removeClass("shaking");
}
else{
$('.basket_div i,.cartitems').addClass("shaking");
}
    }
   });
  }
  else
  {
   alert("Please Enter quantity");
  }
 });

  $('.cart_details').load(baseurl+"Home/load");

 $(document).on('click', '.remove_inventory', function(){
  var row_id = $(this).attr("id");
  // if(confirm("Are you sure you want to remove this?"))
  // {
   $.ajax({
    url:baseurl+"Home/remove",
    method:"POST",
    data:{row_id:row_id},
    success:function(data)
    { 
 $('.cart_details').html(data);
 var numItems = $('.cart_items .carddiv').length;
$('.cartitems').text(numItems);

if(numItems<=0){
  $(".proceedtocheck").hide();
  $('.basket_div i,.cartitems').removeClass("shaking");
}
else{
  $(".proceedtocheck").show();
  $('.basket_div i,.cartitems').addClass("shaking");
}  

 


  }
   });
 
 });


$(document).on('click', '.script_cartadd ', function(){

  var row_id = $(this).attr("id").substring(4);  

var qty=$(this).closest('p').find('.quantity').val();
 
   $.ajax({
    url:baseurl+"Home/addquantity",
    method:"POST",
    data:{row_id:row_id,qty:qty},
    success:function(data)
    { 
      console.log(data);
 $('.cart_details').html(data);
   }
   });
 
 });

 $(document).on('click', '.coupon_submit ', function(){

  var coupon = $('.coupon').val();  
  console.log(coupon,"couponsss")
  if(coupon){
    $.ajax({
      url:baseurl+"Home/couponApply",
      method:"POST",
      data:{coupon:coupon},
      success:function(data)
      { 
        console.log(data,"dataaaaaaaaaaaa");
       let values= JSON.parse(data);
        if(values.status==1||values.status==2){
          if(values.data.type=="percentage"){
        var value=values.data.discount_amount/100;
        var amount= $(".count_total").text()-( $(".count_total").text()*value);
        var amount1=$(".count_total").text()-amount;
        $(".coupondiv").show();
        $(".coupon_total").text(amount1);
        $(".grand_total").text(amount);
        $("#coupon_code").val(1);
        $("#discount_amount").val(amount1);
          alert("Coupon Success");

           console.log(values,amount,$("#coupon_code").val(),"values455"); 
          }else{
            console.log($(".count_total").text(),values.data.discount_amount);
            var value=values.data.discount_amount;
          var amount=  $(".count_total").text() - value;
          $(".coupondiv").show();
          $(".coupon_total").text(values.data.discount_amount);
          $(".grand_total").text(amount);
          $("#coupon_code").val(1);
          $("#discount_amount").val(values.data.discount_amount);
            alert("Coupon Success");
  
             console.log(values,$("#coupon_code").val(),"values455");
          }
        }else if(values.status==3){
          alert(values.data);
        }else{
          alert("Invalid Coupon");
        }
     }
     });
  }else{
    alert("enter the coupon")
  }
   
 
 });

 $(document).on('click', '#clear_cart', function(){
  if(confirm("Are you sure you want to clear cart?"))
  {
   $.ajax({
    url:baseurl+"Home/clear",
    success:function(data)
    {
     alert("Your cart has been clear...");
     $('.cart_details').html(data);
    }
   });
  }
  else
  {
   return false;
  }
 });

});

setTimeout(function() {  
//alert("dfa");  
var numItems = $('.cart_items .carddiv').length;
 //alert(numItems);
$('.cartitems').text(numItems);
if(numItems<=0){
$('.basket_div i,.cartitems').removeClass("shaking");
}
else{
$('.basket_div i,.cartitems').addClass("shaking");
} 

},2000); 
  
 

 // ajax search js
  function addText(Textval){
    $('#category_search_name').val(Textval);
    $('#more_result').empty();
  }
 
  $(document).ready(function(){
      var baseurl=$(".base_url").val();
    // this focus event while you are focusing on an input element.If you enter some text on this input ,its will be passing data in the category-search-name URL.
    $('#category_search_name').on('keyup',function(){
      // Get value from the search box
      var search_text = $('#category_search_name').val();
      // check value is exist or not
      if(search_text==""){
          $('#more_result').empty();
        }else{
        $.ajax({
          type: "POST", // data pass by POST method.
        url:baseurl+"Home/category_search_name", // This is the URL link where you sent the data.
          data: {search_name: search_text}, // search_text value store in the search_name variable and pass variable data by POST method.
          success: function(html){
            console.log(html); // you can check result in the browser console.
            $("#more_result").html(html).show(); // when data get display a list "more_result" is the "UL" tag id name.
          }
        });
      }
    });
  });
 
 (function($) {

  $(".cata-sub-nav").on('scroll', function() {
      $val = $(this).scrollLeft();

      if($(this).scrollLeft() + $(this).innerWidth()>=$(this)[0].scrollWidth){
          $(".nav-next").hide();
        } else {
        $(".nav-next").show();
      }

      if($val == 0){
        $(".nav-prev").hide();
      } else {
        $(".nav-prev").show();
      }
    });
  console.log( 'init-scroll: ' + $(".nav-next").scrollLeft() );
  $(".nav-next").on("click", function(){
    $(".cata-sub-nav").animate( { scrollLeft: '+=460' }, 200);
    
  });
  $(".nav-prev").on("click", function(){
    $(".cata-sub-nav").animate( { scrollLeft: '-=460' }, 200);
  });

  

})(jQuery); 

(function() {
  // hold onto the drop down menu                                             
  var dropdownMenu;

  // and when you show it, move it to the body                                     
  $(window).on('show.bs.dropdown', function(e) {

    // grab the menu        
    dropdownMenu = $(e.target).find('.dropdown-menu');

    // detach it and append it to the body
    $('body').append(dropdownMenu.detach());   

    // grab the new offset position
    var eOffset = $(e.target).offset();

    // make sure to place it where it would normally go (this could be improved)
    dropdownMenu.css({
        'display': 'block',
        'top': eOffset.top + $(e.target).outerHeight(),
        'left': eOffset.left
    });                                                
  });

  // and when you hide it, reattach the drop down, and hide it normally                                                   
  $(window).on('hide.bs.dropdown', function(e) {        
    $(e.target).append(dropdownMenu.detach());        
    dropdownMenu.hide();                              
  });                                                   
})(); 

// $('input[type=radio][name=cash]').change(function() {
//   var baseurl=$('[name=base_url]').val();
//   if(this.value=="2"){
//     console.log("value2")

//     var totalAmount = $("#totalamount").val();
//     console.log("value2",totalAmount);

//     var url = 'http://localhost:3000/api/payment/order';
//     var params = {
//   amount: totalAmount*100,  
//   currency: "INR",
//   receipt: "su001",
//   payment_capture: '1'
// };

// var xmlHttp = new XMLHttpRequest();
// xmlHttp.onreadystatechange = function (res) {
//     if (xmlHttp.readyState === 4) {
//       res=JSON.parse(xmlHttp.responseText);
//       let orderid=res.sub.id;
//       console.log(res.sub,"res.sus")
//       var options = {
//         "key": "rzp_test_Um1zMenz3UhJ2O",  //Enter your razorpay key
//         "currency": "INR",
//         "name": "Razor Tutorial",
//         "description": "Razor Test Transaction",
//         "image": "https://previews.123rf.com/images/subhanbaghirov/subhanbaghirov1605/subhanbaghirov160500087/56875269-vector-light-bulb-icon-with-concept-of-idea-brainstorming-idea-illustration-.jpg",
//         "order_id": orderid,
//         "handler": function (response){
//           console.log(response,"response");
//           $("#orderid").val(response.razorpay_order_id);
//           $("#payid").val(response.razorpay_payment_id);
//           $("#sigid").val(response.razorpay_signature);
//         },
//         "theme": {
//             "color": "#227254"
//         }
//     };
//         var rzp1 = new Razorpay(options);
//         rzp1.open();
//         e.preventDefault();
//     }
// }
// xmlHttp.open("POST", url, true); // false for synchronous request
// xmlHttp.setRequestHeader("Content-type", "application/json");
// xmlHttp.send(JSON.stringify(params));
//   }else{
//     console.log("value1")
//   }
   
//   });



 
     
   
 