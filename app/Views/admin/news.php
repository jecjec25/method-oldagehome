<!DOCTYPE HTML>
<html>
<head>
<title>News and Events</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="/css/newsan.css" rel='stylesheet' type='text/css' />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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

<section>
	<div class="leftBox">
		<div class="content">
			<h1>News and Events</h1>
			<p>Aruga Kapatid Foundation Incorporated thrives as a compassionate center in the heart of the community.</p>
		</div>
	</div>
	<div class="events">
		<ul>
			<?php foreach($news as $single_news): ?>
				<?php if ($single_news['status'] != 'Archive'): ?>
					<li>
						<div class="time">
							<h2>
								<?= date('d', strtotime($single_news['date_published'])) ?> <br>
								<span><?= date('F', strtotime($single_news['date_published'])) ?></span>
							</h2>
						</div>
						<div class="details">
							<h3><?= $single_news['title'] ?></h3>
							<img src="<?="upload/news/" . $single_news['picture'] ?>" alt="newsba"> <br>
							<a href="<?= base_url('newsvents/' . $single_news['id']) ?>">View News</a>
						</div>
						<div style="clear: both;"></div>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>

			<?php foreach($events as $mevents): ?>
				<li>
					<div class="time">
						<h2>
							<?= date('d', strtotime($mevents['Start_date'])) ?> <br>
							<span><?= date('F', strtotime($mevents['Start_date'])) ?></span>
						</h2>
					</div>
					<div class="details">
						<h3><?= $mevents['Title'] ?></h3>
						<img src="<?="/upload/events/" . $mevents['Attachments'] ?>" alt="eventsba"> <br>
						<a href="<?= base_url('newsvents/' . $mevents['EventID']) ?>">View Event</a>
					</div>
					<div style="clear: both;"></div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<?php include_once('includes/footer.php');?>

<script type="text/javascript">
	$(document).ready(function() {
		$().UItoTop({ easingType: 'easeOutQuart' });
	});
</script>

<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</body>
</html>
