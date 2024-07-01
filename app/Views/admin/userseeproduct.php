<!DOCTYPE HTML>
	<html>
	<head>
	<title>Products</title>
	<link href="./css/bootstrap.css" rel='stylesheet' type='text/css' />


	<script src="./js/jquery-1.8.3.min.js"></script>
	<script src="./js/modernizr.custom.js"></script>


	<script type="text/javascript" src="./js/move-top.js"></script>
	<script type="text/javascript" src="./js/easing.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  	<link href="css/font-awesome.min.css" rel="stylesheet" />
      <link href="css/style.css" rel="stylesheet" />
      <link href="css/styles.css" rel="stylesheet" />
			
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
  <?php include_once('includes/user/sidebar.php');?>
	
<section class="team_section layout_padding">
    <div class="containered">
      <div class="heading_container heading_center">
        <h2>
          Product
        </h2>
        <p style="color:black;">
        Creating products for old age homes involves considering the unique needs and challenges faced by seniors.
        </p>
      </div>
        <div class="gallery">
            <div class="content">
              <img name="Picture" src="images/<?= $prods['image']?>" alt="">
              <h3 name="ProductName"> <?= $prods['description']?> </h3>
        
              <h6 name="Price"><?= $prods['price']?></h6>
              <?= $prods['other']?>         
             
              </a>  
            </div>

   
          <div class="gallery">
                        <?php foreach($prodimg as $prods):?>
            <div class="content">
             
              <img name="Picture" src="images/<?= $prods['image']?>" alt="">
              <h3 name="ProductName"> <?= $prods['description']?> </h3>
        
              <h6 name="Price"><?= $prods['price']?></h6>
              <?= $prods['other']?>         
             
            </div>
          
            <?php endforeach;?>
          </div>
          
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