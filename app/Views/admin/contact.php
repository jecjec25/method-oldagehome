<!DOCTYPE HTML>
<html>
<head>
<title>Senior Care Management System || Contact Us Page</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<link href="css/style.css" rel='stylesheet' type='text/css' />



<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
		
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>

	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic,400italic,700italic|Niconne' rel='stylesheet' type='text/css'>
	
</head>
<body>

	<?php include_once('includes/header.php');?>
	</div>	
</div>	
		
		    <div class="contact_desc">
		        <div class="container">
		        	<h2>Contact Us</h2>
			         <div class="contact-form">
				  	   <form method="post" class="left_form">
					    	<div>
						    	<span><label>First Name</label></span>
						    	<span><input required="true" name="FirstName" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Last Name</label></span>
						    	<span><input required="true" name="LastName" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Contact Number</label></span>
						    	<span><input required="true" name="Phone" pattern="[0-9]+" maxlength="10" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input required="" name="Email" type="text" class="textbox"></span>
						    </div>
						   
					   
					        <div>					    	
						    	<span><label>Message</label></span>
						    	<span><textarea required="true" name="Message"> </textarea></span>
						    </div>
						   <div>
						   		<input type="submit" value="Submit " name="submit" />
						  </div>
					    </form>
					    <div class="clearfix"></div>
				  </div>
	
	
				      <div class="clearfix"></div>
	                </div>	
	             </div>  
	          </div>
	
	<?php include_once('includes/footer.php');?>
								<script type="text/javascript">
									$(document).ready(function() {
										
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
					<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>



</body>
</html>		