<!DOCTYPE HTML>
<html>
<head>
<title>News and Events</title>
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
    <div>
<?php include_once('includes/header.php');?>
<?php foreach($news as $news):?>
	<ul>
		<li>
			<?= $news['title'];?> <br><?= $news['picture']?> <br><?= $news['author']?> <br> <?= $news['description']?>
		</li>
	</ul>

	<?php endforeach;?>
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