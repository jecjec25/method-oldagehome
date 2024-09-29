<!DOCTYPE HTML>
<html>
<head>
    <title>Necessity</title>
    <link rel="icon" type="image/png" href="/picture.png">
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="/css/menu.css" rel='stylesheet' type='text/css' />

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
   

    <div class="content">
    <div class="blog">
        <div class="container">    
            <div class="blog-top">       
                <h3>What do our Elders needs?</h3>
            </div>

    <div class="col-md-12" style="margin-top:4%;padding-top:4%;padding-bottom:4%;border:solid;border-radius:28px;color:rgb(201, 68, 103);;background-color:#c9c7c1">
            <div class="col-md-4 service-images">
              <img src="aruga_gallery/<?= $mes[1]['img'] ?>" class="img-responsive" alt=""/>
            </div>
            <div class="col-md-8 service-images-text">
              <div class="inner-textes">
                <h3>Dear Community Members,</h3>
                <p>As we navigate through life, it's essential to remember the valued members of our
                    community—the seniors who have contributed so much wisdom, experience, and love over
                    the years. Many of our elderly neighbors reside in homes for the aged, where they deserve 
                    our unwavering support and care.
                    <br>
                    <br>
                    Each senior has a unique story to tell, a lifetime of memories to cherish, and a wealth of knowledge to share.
                    Let's come together to ensure they receive the respect, dignity, and compassion they deserve in their golden years.
                        
                </p>
                <p></p>
            </div>

        </div>

        </div> 
        <div class="clearfix"> </div> 
        <br><br>
        <div class="form">
        <span class="how-to-make-difference">What do our elders need:</span>
        <span><?php foreach($menu as $menu):?></span>
        <ul><li><span class="middle"><?= $menu['need'] ?></span>: </b><span class="fins"><?= $menu['description'] ?></span></li></ul>
                    <?php endforeach;?>
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
