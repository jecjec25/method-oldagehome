<!DOCTYPE HTML>
<html>
<head>
<title>About</title>
<link rel="icon" type="image/png" href="/picture.png">
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


	<div class="About-section">
	 	<div class="container">
	 		<h3>ABOUT US</h3>
	 		<div class="about-part">
		 		<div class="about-pic">
				 <?php foreach($VM as $VMitems):?>
		 			<img class="img-responsive" src="aruga_gallery/<?= $VMitems['img']?>" alt="" />
					 <?php endforeach;?>
		 		</div>

		 		<div class="about-textside">
					
					<h4>VISION</h4>
					<?php foreach($VM as $VMitems):?>
					<p><?= $VMitems['Vision']?></p>
					<?php endforeach;?>
					<h4>CORE VALUES</h4>
					<?php foreach($VM as $VMitems):?>
						<?= $VMitems['CoreValues']?>
					<?php endforeach;?>
		</div>
				<h4>MISSION</h4>
				<?php foreach($VM as $VMitems):?>
					<?= $VMitems['Mision']?>
					<?php endforeach;?>
					<div class="clearfix"> </div>  
	 		</div>
			 <?php include_once('includes/organization.php');?>
	
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