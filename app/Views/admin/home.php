<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
   
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

<style>
.text {
    color: white;
    text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
    font-weight: bold; 
    background: rgba(0, 0, 0, 0.5); 
    padding: 2px 5px; 
    display: inline; 
}

</style>
<body>
    <?php include_once('includes/header.php'); ?>
    <br>
    <br>
    <div class="containered">
        <div class="letest-sections">
            <div class="containers">
                <div class="Event">
                    
                    <div class="wmuSlider example1">
                        
                <?php foreach($home as $home):?>
                        <article>
                            <div class="client-sections">
                                <div class="event-sections">
                                    <div class="client-img">
                                        <img class="slider" src="aslider/<?= $home['image']?>" title="" />
                                        <div class="text"><?= $home['description']?></div>
                                    </div>
                                   
                                </div>
                            </div>
                        </article> 
                        
                    <?php endforeach;?> 
                    </div>
                </div>
            </div>
        </div>
        <div class="letest-section">
            <div class="container">
                <div class="Events">
                    <div class="wmuSlider example1">
                        <div class="container">
                            <h3>Gallery</h3>
                            <?php $chunks = array_chunk($gallery, 6); ?>
                            <?php foreach($chunks as $chunk): ?>
                            <article>
                                <div class="client-sections">
                                    <div class="event-section">
                                        <?php foreach($chunk as $image): ?>
                                        <div class="col-md-4">
                                            <div class="client-img">
                                                <img class="arugaGallery" src="aruga_gallery/<?= $image['image']?>" title="" />
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </article>
                            <?php endforeach; ?>
                        </div>
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
