<!DOCTYPE HTML>
<html>
<head>
<title>Contact</title>
<link rel="icon" type="image/png" href="/picture.png">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="/css/contact.css" rel='stylesheet' type='text/css' />



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
		    <div class="contact_desc">
		        <div class="container">
					
				<?php if(session()->getFlashdata('success')): ?>
					<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
					<?php endif; ?>
				<h2>Contact Us</h2>
				<div class="contact-form">
		        	
			         
				  	   <form action="<?= base_url("check") ?>" method="post" class="left_form">
						 <?php if(isset($cont['Id'])){?>
                      		<input type="hidden" name="Id" value="<?=$cont['Id']?>">
                    	 <?php }?>
						    <div>
						    	<span><label>Full Name<span class="required"></span></label></span>
						    	<span><input required="true" name="Name" type="text"  value="<?= isset($cont['Name']) ? $cont['Name'] : '' ?>" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Contact Number<span class="required"></span></label></span>
						    	<span><input required="true" name="Phone" id="Phone" pattern="(\+?63|0)9\d{9}" maxlength="13" type="text" value="<?= isset($cont['Phone']) ? $cont['Phone'] : '' ?>" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL<span class="required"></span></label></span>
						    	<span><input required="true" name="Email" type="text" value="<?= isset($cont['Email']) ? $cont['Email'] : '' ?>" class="textbox"></span>
						    </div>
					        <div>					    	
						    	<span><label>Message<span class="required"></span></label></span>
						    	<span><textarea required="true" name="Message" value="<?= isset($cont['Message']) ? $cont['Message'] : '' ?>" > </textarea></span>
						    </div>
						   <div>
						   		<input type="submit" value="Submit" name="submitted"  onclick="return confirm('Are you sure you want to submit this form?')" />
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
				<script>
		var inputs = document.getElementById("Phone");

	inputs.addEventListener("input", function(event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});
</script>


</body>
</html>		