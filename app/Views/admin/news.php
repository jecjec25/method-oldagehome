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

<main>
        <section class="news">
            <h2>Latest News</h2>
            <article>
				<div class="row">
				<div class="column">
                <?php foreach($news as $single_news): ?>
				    <?php if ($single_news['status'] != 'Archive'): ?>
                            <h3><?= $single_news['title'] ?></h3>
							<img class="thumb" src="<?="upload/news/" . $single_news['picture'] ?>">
                            <div style="clear: both;"></div><br>
							<a href="<?= base_url('newsvents/' . $single_news['id']) ?>" class="btn btn-secondary">View News</a>
					 <?php endif; ?>
			    <?php endforeach; ?>
				</div>
				</div>
            </article>
        </section>
        
        <section class="events">
            <h2>Upcoming Events</h2>
            <article>
			<div class="row">
				<div class="column">
            <?php foreach($events as $mevents): ?>
                
                <h3><?= $mevents['Title'] ?></h3>
				<img class="thumb" src="<?="/upload/events/" . $mevents['Attachments'] ?>">
                <div style="clear: both;"></div><br>
				<a href="<?= base_url('newsvents/' . $mevents['EventID']) ?>">View Event</a>
				
			<?php endforeach; ?>
			</div>
			</div>
            </article>
            
        </section>
    </main>

<?php include_once('includes/footer.php');?>

<script type="text/javascript">
	$(document).ready(function() {
		$().UItoTop({ easingType: 'easeOutQuart' });
	});
</script>

<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</body>
</html>
