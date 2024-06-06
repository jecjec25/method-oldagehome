<!DOCTYPE HTML>
<html>
<head>
<title>View Event</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="/css/userview.css" rel='stylesheet' type='text/css' />

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
h2 {
    font-family: 'Lato', sans-serif;
    font-weight: 700;
    color: #A3C9D2;
    text-transform: uppercase;
    margin-bottom: 20px;
    border-bottom: 2px solid #f39c12;
    padding-bottom: 10px;
    text-align: center;
}
</style>

<body>
    <div>
<?php include_once('includes/user/sidebar.php');?>

<section>
        <div class="leftBox">
           	 <div class="content">
                <h1>
                    Events Posting
                </h1>
                <p>
				Aruga Kapatid Foundation Incorporated thrives as a compassionate center in the heart of the community.
                </p>
            </div>
        </div>
        <div class="events">
            <ul>
			<h2>Main Event</h2>
			<?php foreach($eventadmin as $mevents): ?>
               <li>
                    <div class="time">
					<h2>
						<?= date('d', strtotime($mevents['Start_date'])) ?> <br><span><?= date('F', strtotime($mevents['Start_date'])) ?></span>
					</h2>
					</div>
                    <div class="details">
                        <h3>
						<?=$mevents['Title'] ?><br>
                        </h3>
                            
						<img src="<?="/upload/events/". $mevents['Attachments'] ?>" alt=""><br>
						<a href="<?= base_url('eventForUsers/' . $mevents['EventID'])?>">View Event</a>
                    </div>
                </li>
				<?php endforeach; ?>
            </ul>
			<ul>
		<h2>User Event</h2>
			<?php foreach($eventuser as $mevents): ?>
               <li>
                    <div class="time">
					<h2>
						<?= date('d', strtotime($mevents['Start_date'])) ?> <br><span><?= date('F', strtotime($mevents['Start_date'])) ?></span>
					</h2>
					</div>
                    <div class="details">
                        <h3>
						<?=$mevents['Title'] ?><br>
                        </h3>
                            
						<img src="<?="/upload/events/". $mevents['Attachments'] ?>" alt=""><br>
						<a href="<?= base_url('eventForUsers/' . $mevents['EventID'])?>">View Event</a>
                    </div>
                </li>
				<?php endforeach; ?>
            </ul>
        </div>
    </section>
	<br>
<?php include_once('includes/footer.php');?>	
								<script type="text/javascript">
									$(document).ready(function() {
										
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
					<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</body>
</html>		