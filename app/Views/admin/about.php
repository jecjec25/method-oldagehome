	<!DOCTYPE HTML>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>About</title>
	
		<link href="./css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="./css/style.css" rel="stylesheet" type="text/css" />
		<link rel="icon" type="image/png" href="/picture.png">
		<script type="application/x-javascript">
			
			addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){ window.scrollTo(0,1); }
		</script>
		<script src="./js/jquery-1.8.3.min.js"></script>
		<script src="./js/modernizr.custom.js"></script>
		<script type="text/javascript" src="./js/move-top.js"></script>
		<script type="text/javascript" src="./js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){        
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	</head>
	<body>
	<?php include_once('includes/header.php');?>
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

						<h4>MISSION</h4>
					<?php foreach($VM as $VMitems):?>
						<p><?= $VMitems['Mision']?></p>
						<?php endforeach;?>
						<div class="clearfix"> </div>  
						
			</div>
						<h4>CORE VALUES</h4>
						<?php foreach($VM as $VMitems):?>
						<p><?= $VMitems['CoreValues']?></p>
						<?php endforeach;?>

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