<!DOCTYPE HTML>
<html>
<head>
<title>Services</title>
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

	<div class="content">
	<div class="blog">
		<div class="container">	
			<div class="blog-top">		
				<h3>Services offered by Aruga Kapatid</h3>
			</div>

    <div class="col-md-12" style="margin-top:4%;padding-top:4%;padding-bottom:4%;border:solid;border-radius:28px;color:rgb(201, 68, 103);;background-color:#c9c7c1">
            <div class="col-md-4 service-images">
              <img src="aruga_gallery/<?= $service[1]['img'] ?>" class="img-responsive" alt=""/>
            </div>
            <div class="col-md-8 service-images-text">
              <div class="inner-text">
				<h4>SERVICES</h4>
				<h3>I. MEDICAL NEEDS</h3>
					<span>Providing healthcare services, medication management, and emergency assistance.<span>
				<h3>II. PERSONAL HYGIENE</h3>
					<span>Assisting with bathing, grooming, and maintaining cleanliness.<span>
				<h3>III. FEEDING</h3>
					<span>Ensuring proper nutrition by assisting with meal planning, preparation, and feeding.<span>
				<h3>IV. PHYSICAL ACTIVITIES</h3>
					<span>Organizing exercises and games to promote well-being.<span>
				<h3>V. FUNERAL SERVICES</h3>
					<span>Providing guidance and support during bereavement.</span>
			</div>

		</div>
		</div>
		</div>	
	</div>
	<script src="./js/jquery.wmuSlider.js"></script> 
					<script>
       				     $('.example1').wmuSlider();         
   					</script> 	           	      


	<?php include_once('includes/footer.php');?>
								<script type="text/javascript">
									$(document).ready(function() {
										
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
					<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>






</body>
</html>			