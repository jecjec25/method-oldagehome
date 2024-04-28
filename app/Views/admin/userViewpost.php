<!DOCTYPE HTML>
<html>
<head>
<title>User Event Posting</title>
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
		/* Styling the body */
		body {
			margin: 0;
			padding: 0;
		}

		/* Styling section, giving background
			image and dimensions */
		section {
			width: 100%;
			height: 100vh;
			background: url(tia_images/bg.jpg);
			background-size: cover;
		}

		/* Styling the left floating section */
		section .leftBox {
			width: 50%;
			height: 100%;
			float: left;
			padding: 50px;
			box-sizing: border-box;
		}

		/* Styling the background of 
			left floating section */
		section .leftBox .content {
			color: #fff;
			background: rgba(0, 0, 0, 0.5);
			padding: 40px;
			transition: .5s;
		}

		/* Styling the hover effect 
			of left floating section */
		section .leftBox .content:hover {
			background: #e91e63;
		}

		/* Styling the header of left 
			floating section */
		section .leftBox .content h1 {
			margin: 0;
			padding: 0;
			font-size: 50px;
			text-transform: uppercase;
		}

		/* Styling the paragraph of 
			left floating section */
		section .leftBox .content p {
			margin: 10px 0 0;
			padding: 0;
		}

		/* Styling the three events section */
		section .events {
			position: relative;
			width: 50%;
			height: 100%;
			background: rgba(0, 0, 0, 0.5);
			float: right;
			box-sizing: border-box;
		}

		/* Styling the links of 
		the events section */
		section .events ul {
			position: absolute;
			top: 50%;
			transform: translateY(-50%);
			margin: 0;
			padding: 40px;
			box-sizing: border-box;
		}

		/* Styling the lists of the event section */
		section .events ul li {
			list-style: none;
			background: #fff;
			box-sizing: border-box;
			height: 200px;
			margin: 15px 0;
		}

		/* Styling the time class of events section */
		section .events ul li .time {
			position: relative;
			padding: 20px;
			background: #262626;
			box-sizing: border-box;
			width: 30%;
			height: 100%;
			float: left;
			text-align: center;
			transition: .5s;
		}

		/* Styling the hover effect
			of events section */
		section .events ul li:hover .time {
			background: #e91e63;
		}

		/* Styling the header of time 
			class of events section */
		section .events ul li .time h2 {
			position: absolute;
			margin: 0;
			padding: 0;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			color: #fff;
			font-size: 60px;
			line-height: 30px;
		}

		/* Styling the texts of time 
		class of events section */
		section .events ul li .time h2 span {
			font-size: 30px;
		}

		/* Styling the details 
		class of events section */
		section .events ul li .details {
			padding: 20px;
			background: #fff;
			box-sizing: border-box;
			width: 70%;
			height: 100%;
			float: left;
		}

		/* Styling the header of the 
		details class of events section */
		section .events ul li .details h3 {
			position: relative;
			margin: 0;
			padding: 0;
			font-size: 22px;
		}

		/* Styling the lists of details 
		class of events section */
		section .events ul li .details p {
			position: relative;
			margin: 10px 0 0;
			padding: 0;
			font-size: 16px;
		}

		/* Styling the links of details
		class of events section */
		section .events ul li .details a {
			display: inline-block;
			text-decoration: none;
			padding: 10px 15px;
			border: 1.5px solid #262626;
			margin-top: 8px;
			font-size: 18px;
			transition: .5s;
		}

		/* Styling the details class's hover effect */
		section .events ul li .details a:hover {
			background: #e91e63;
			color: #fff;
			border-color: #e91e63;
		}
	</style>
<body>
    <div>
<?php include_once('includes/user/sidebar.php');?>

<section>
        <div class="leftBox">
           	 <div class="content">
                <h1>
                    News and Events
                </h1>
                <p>
				Aruga Kapatid Foundation Incorporated thrives as a compassionate center in the heart of the community.
                </p>
            </div>
        </div>
        <div class="events">
            <ul>
               <li>
				<?php foreach($events as $mevents): ?>
                    <div class="time">
					<h2>
						<?= date('d', strtotime($mevents['Start_date'])) ?> <br><span><?= date('F', strtotime($mevents['Start_date'])) ?></span>
					</h2>
					</div>
                    <div class="details">
                        <h3>
						<?=$mevents['Title'] ?><br>
                        </h3>
                            
						<?=$mevents['Attachments'] ?><br>
						<a href="<?= base_url('newsvents/' . $mevents['EventID'])?>">View Event</a>
                    </div>
                    <div style="clear: both;"></div>
                   
                    <?php endforeach; ?>
                </li>
               
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