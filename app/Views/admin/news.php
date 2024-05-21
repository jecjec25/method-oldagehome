<!DOCTYPE HTML>
<html>
<head>
<title>News and Events</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />

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

	<style>
		/* Styling the body */
		body {
			margin: 0;
			padding: 0;
			font-family: 'Lato', sans-serif;
		}

		/* Styling section, giving background
			image and dimensions */
		section {
			width: 100%;
			min-height: 100vh;
			background: url(tia_images/bg.jpg) no-repeat center center fixed;
			background-size: cover;
			display: flex;
		}

		/* Styling the header */
		header {
			width: 100%;
			position: fixed;
			top: 0;
			left: 0;
			z-index: 1000;
			background: rgba(0, 0, 0, 0.7);
			padding: 10px 0;
			color: #fff;
		}

		/* Styling the left floating section */
		.leftBox {
			width: 50%;
			padding: 50px;
			box-sizing: border-box;
			display: flex;
			align-items: center;
		}

		/* Styling the background of 
			left floating section */
		.leftBox .content {
			color: #fff;
			background: rgba(0, 0, 0, 0.5);
			padding: 40px;
			transition: .5s;
		}

		/* Styling the hover effect 
			of left floating section */
		.leftBox .content:hover {
			background: #e91e63;
		}

		/* Styling the header of left 
			floating section */
		.leftBox .content h1 {
			margin: 0;
			padding: 0;
			font-size: 50px;
			text-transform: uppercase;
		}

		/* Styling the paragraph of 
			left floating section */
		.leftBox .content p {
			margin: 10px 0 0;
			padding: 0;
		}

		/* Styling the three events section */
		.events {
			position: relative;
			width: 50%;
			background: rgba(0, 0, 0, 0.5);
			box-sizing: border-box;
			overflow-y: auto; /* Add scrollbar if content exceeds height */
			padding: 60px 15px 15px; /* Add padding for scrollbar and spacing */
		}

		/* Styling the links of 
		the events section */
		.events ul {
			padding: 0;
			margin: 0;
		}

		/* Styling the lists of the event section */
		.events ul li {
			list-style: none;
			background: #fff;
			box-sizing: border-box;
			margin: 15px 0;
			display: flex;
		}

		/* Styling the time class of events section */
		.events ul li .time {
			width: 30%;
			background: #262626;
			text-align: center;
			transition: .5s;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			color: #fff;
		}

		/* Styling the hover effect
			of events section */
		.events ul li:hover .time {
			background: #e91e63;
		}

		/* Styling the header of time 
			class of events section */
		.events ul li .time h2 {
			margin: 0;
			padding: 0;
			font-size: 30px;
		}

		/* Styling the texts of time 
		class of events section */
		.events ul li .time h2 span {
			font-size: 20px;
		}

		/* Styling the details 
		class of events section */
		.events ul li .details {
			padding: 20px;
			background: #fff;
			width: 70%;
			box-sizing: border-box;
		}

		/* Styling the header of the 
		details class of events section */
		.events ul li .details h3 {
			margin: 0;
			padding: 0;
			font-size: 22px;
		}

		/* Styling the lists of details 
		class of events section */
		.events ul li .details p {
			margin: 10px 0 0;
			padding: 0;
			font-size: 16px;
		}

		/* Styling the links of details
		class of events section */
		.events ul li .details a {
			display: inline-block;
			text-decoration: none;
			padding: 10px 15px;
			border: 1.5px solid #262626;
			margin-top: 8px;
			font-size: 18px;
			transition: .5s;
		}

		/* Styling the details class's hover effect */
		.events ul li .details a:hover {
			background: #e91e63;
			color: #fff;
			border-color: #e91e63;
		}

		.details img{
			width:90px;
			height:90px;
			float:right;
			align-items:center;
			margin-bottom:2	0px;
		}
	</style>
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
