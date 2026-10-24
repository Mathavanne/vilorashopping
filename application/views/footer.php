<!--    <a  style="    position: fixed;left: 0;bottom: 28px;z-index: 99;" class="  text-dark"  href="<?=adminpath?>cart">   <span class="basket_div  " href="#"><i class="fa fa-shopping-cart mr-2"></i>  <span class="cartitems text-white" style="background:var(--primarycolor);" >0 </span> </span> </a> -->

<a  style="    position: fixed;
    left: 13px;
    bottom: 26px;
    z-index: 99;
    background: #d4a762;
    border-radius: 50%;
    padding: 10px;
    width: 40px;
    height: 40px;"    href="<?php	echo base_url();?> ">  <i style="font-size: 20px;
    color: #fff" class="fa fa-home "></i>   </a>

    <a class="sendquery text-white"  href="<?php echo base_url(); ?>contact"> <i class="fa fa-paper-plane "></i> </a>

</div>

    <section class="footer p-3" style="
	/* background-image: url('assets/img/foot.png'),url('assets/img/paper.gif'); */
  background-position: right bottom, left top;
  background-repeat: no-repeat, repeat;
  background-color:#fffcf8;
	">
	<div class="container">
	<div class="row footer_menu">
		<div class="col-md-3">
			<h6 style="    font-family: 'Playball', cursive !important;    font-size: 25px;">Categories</h6>
			<ul>
	 
				<?php $sd=0; foreach ($category as $key => $valuess) {?>
					<li><i class="fa fa-check text-primary me-2" style="color:#d4a762!!important;"></i>&nbsp;<a class="text-capitalize"  href="<?=base_url;?>productlist/<?php  echo clean($valuess['category_name'] );   ?>/<?php  echo  $valuess['randid']  ;   ?> "  ><?php echo $valuess['category_name']; ?> </a></li>	 
				<?php $sd++;
if($sd==5) break;} ?>
				
			 
			 
			</ul>
		</div>

		<div class="col-md-3  "><h6 style="    font-family: 'Playball', cursive !important;    font-size: 25px;">Our Policies</h6>
			<ul>
				<li><i class="fa fa-check text-primary me-2" style="color:#d4a762!!important;    "></i>&nbsp;<a href="<?php echo base_url(); ?>privacy">Privacy Policy</a></li>
		 
	 
					<li><i class="fa fa-check text-primary me-2" style="color:#d4a762!!important;    "></i>&nbsp;<a href="<?php echo base_url(); ?>contact">Contact Us</a></li>
			 
			 
			</ul>
		</div>
		<div class="col-md-3 " ><h6 style="    font-family: 'Playball', cursive !important;    font-size: 25px;">Download Our App</h6>
			<ul>
				<li><a href="http://www.viloratechnologies.com/app/canabadyApp.apk"><img src="<?=assets?>img/googleplay.png"></a> </li>
			</ul>
		</div>
		<div class="col-md-3 "><h6 style="    font-family: 'Playball', cursive !important;    font-size: 25px;">Contact Us</h6>

			<ul>
				<li><i class="fas fa-envelope text-primary me-2"></i> &nbsp; Email: <a href="mailto:viloratech@gmail.com">viloratech@gmail.com</a></li>
				<li><i class="fa fa-whatsapp  text-primary me-2"></i>  &nbsp; <a href="https://api.whatsapp.com/send?phone=918778155468" title="whatsapp 8778155468">87781 55468 </a>	 </li>
				<li><i class="fa fa-mobile text-primary me-2"></i>&nbsp; &nbsp;   <a href="tel://+08778155468" title="Call 9944025562" target="_blank">9944025562</a>  </li> </ul></div>

	
 
		 
</div>


<div class="socialandapp">
	<div class="row">
		<div class="col-md-12">
			<ul>
				<li style="color: #7f1416;
    font-size: initial;">Keep in Touch</li>
				<li><a href=""><i class="fa fa-facebook"></i></a> </li>
				<li><a href=""><i class="fa fa-twitter"></i></a></li>
					<li><a href=""><i class="fa fa-instagram"></i></a></li>
			 
			</ul>
		</div>
		<!-- <div class="col-md-7">
			<ul>
				<li>Payment Method  </li>
				<li><img src="<?=assets?>img/payment.png"> </li>
				 
			 
			</ul>
		</div> -->
		 
	</div>
</div>
  
</div>
</section> 

<section class="copyright text-center" style="    background: linear-gradient(to right, #190A05, #870000);
    background-color: #1E1F29;">
	<ul> <li> <span class="coprightsymbol">©</span> <span class="Year"></span> Vilora Shopping. &nbsp;All rights reserved. </li> <li>|</li> 
<li><a href="<?php echo base_url(); ?>privacy ">  Privacy Policy </a></li>   <li>|</li> 
<li>Developed By <a   target="_blank" href="https://www.viloratechnologies.com"> Vilora Technologies</a></li>  
 
</ul>
</section>
<script>
	let year=new Date().getFullYear()
	// console.log(year)
	document.querySelector(".Year").innerHTML= year;
</script>



    <!-- Footer Section Begin -->
     
    <!-- Footer Section End -->

    <!-- Js Plugins -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="<?=assets?>js/bootstrap.min.js"></script>
 

    <script src="<?=assets?>js/homepage/owl.carousel.min.js"></script>
    <script src="<?=assets?>js/homepage/jquery.validate.min.js"></script>
    <script type='text/javascript' src='<?=assets?>js/homepage/jquery.marquee.min.js'></script>
    
 <script src="<?=assets?>js/homepage/main.js"></script>
 <style type="text/css">.marquee {
    width: 100%;
    margin: 0;
    overflow: hidden;
    padding: 5px;
    color:var(--primarycolor);
 
}</style>
 <script type="text/javascript">$(document).ready(function() {
  $(".megamenu").on("click", function(e) {
    e.stopPropagation();
  });
//   $('.dropdown').hover(function(){ 
//   $('.dropdown-toggle', this).trigger('click'); 
// });
  
});
 $('.marquee').marquee({
  direction: 'left',
   duration: 10000,
gap: 20,
 pauseOnHover:true
 });
</script>

 
</body>

</html>