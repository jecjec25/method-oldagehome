<!DOCTYPE HTML>
<html>
<head>
<title>Event Booking</title>
<link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" >
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
<style>
        .required::after {
            content: "*";
            color: red;
            margin-left: 5px;
        }
    </style>
<body>
<div class="contact_desc">
				<?php include('includes/user/sidebar.php')?>		
		        <div class="container">
					<br>
					<br>
					<br>
		        	<h2>Event Reservation</h2>
					<div class="contact-form">
					<?php if(session()->getFlashdata('success')): ?>
					<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
					<?php endif; ?>
				  	   <form action="<?= base_url("checkbooks") ?>" method="post" class="left_form">
						 <?php if(isset($book['bookingId'])){?>
                      		<input type="hidden" name="bookingId" value="<?=$book['bookingId']?>">
                    	 <?php }?>
						    <div>

								<input type="hidden" name="usersignsId" value="<?= session()->get('id')?>">
						    	<span><label>Last Name<span class="required"></span>:</label></span>
						    	<span><input required="true" name="lastname" type="text"  value="<?= isset($book['lastname']) ? $book['lastname'] : '' ?>" placeholder="Enter your last name" class="textbox"></span>
						    </div>
							<div>
						    	<span><label>First Name<span class="required"></span>:</label></span>
						    	<span><input required="true" name="firstname" type="text"  value="<?= isset($book['firstname']) ? $book['firstname'] :'' ?>" placeholder="Enter your first name" class="textbox"></span>
						    </div>
							<div>
						    	<span><label>Middle Name<span class="required"></span>:</label></span>
						    	<span><input required="true" name="middlename" type="text"  value="<?= isset($book['middlename']) ? $book['middlename'] : '' ?>" placeholder="Enter your middle name" class="textbox"></span>
						    </div>
							<div>
						    	<span><label>Contact Number<span class="required"></span>:</label></span>
						    	<span><input required="true" name="contactnum" type="text" pattern="(\+?63|0)9\d{9}" maxlength="13" value="<?= isset($book['contactnum']) ? $book['contactnum'] : '' ?>" placeholder="Contact number" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Type of Event<span class="required"></span>:</label></span>
						    	<span><input required="true" name="event" type="text" value="<?= isset($book['event']) ? $book['event'] : '' ?>" placeholder="Type of event" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Preferred Date and Time<span class="required"></span>:</label></span>
						    	<span><input required="true" id="start_date" name="prefferdate" type="datetime-local" value="<?= isset($book['prefferdate']) ? $book['prefferdate'] : '' ?>" class="textbox"></span>
						    </div>
					        <div>					    	
						    	<span><label>Alternate Date and Time<span class="required"></span>:</label></span>
						    	<span><input required="true" id="end_date" name="alterdate" type="datetime-local" value="<?= isset($book['alterdate']) ? $book['alterdate'] : '' ?>" class="textbox"> </span>
						    </div>
							<div>
						    	<span><label>Specific Equipments Needed<span class="required"></span>:</label></span>
						    	<span><input required="true" name="equipment" type="text" value="<?= isset($book['equipment']) ? $book['equipment'] : '' ?>" placeholder="e.g., sound system, projector..." class="textbox"></span>
						    </div>
							<div>
						    	<span><label>Questions or Comments<span class="required"></span>:</label></span>
						    	<span><input required="true" name="comments" type="text" value="<?= isset($book['comments']) ? $book['comments'] : '' ?>" placeholder="Enter your questions or comments" class="textbox"></span>
						    </div>
						   <div>
						   		<input type="submit" value="Submit" name="bookcheck">
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


					<script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>

</body>
</html>		