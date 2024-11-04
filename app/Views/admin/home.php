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
    color: #f0f0f0; /* Set a brighter color for better visibility */
    text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
    font-weight: bold; 
    background: rgba(0, 0, 0, 0.5); 
    padding: 2px 5px; 
    display: inline; 
}

/* Media Queries for Mobile Responsiveness */
@media (max-width: 768px) {
    .slider {
        max-height: 250px; /* Adjust for smaller screens */
    }
    .text {
        font-size: 14px; /* Smaller text on mobile */
    }
    .arugaGallery {
        padding-top: 5px; /* Adjust padding for smaller screens */
    }

    .wmuSlider {
        position: relative;
        overflow: hidden; /* Hide overflow for cleaner edges */
        max-height: 400px; /* Set a max height for the slider */
    }

    /* Slider Image Styles */
    .slider {
        margin-top: 500px;
        width: 100%; /* Full width of container */
        height: auto; /* Maintain aspect ratio */
        max-height: 400px; /* Maintain a max height */
        object-fit: cover; /* Cover the container while maintaining aspect ratio */
        border-radius: 5px; /* Optional: adds rounded corners to the slider images */
        display: block; /* Prevents small space under images */
        margin: 0 auto; /* Center align images */
    }
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
                        <?php foreach($home as $home): ?>
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
                        <?php endforeach; ?> 
                    </div>
                </div>
            </div>
        </div>
        <div class="letest-section">
            <div class="container">
                <div class="Events">
                    <div class="wmuSlider example1">
                        <div class="container">
                            <h3 style="color: #f0f0f0;">Gallery</h3> <!-- Ensure the heading is also visible -->
                            <?php $chunks = array_chunk($gallery, 6); ?>
                            <?php foreach($chunks as $chunk): ?>
                                <article>
                                    <div class="client-sections">
                                        <div class="event-section">
                                            <?php foreach($chunk as $image): ?>
                                                <div class="col-md-4">
                                                    <div class="client-img">
                                                        <img class="arugaGallery" src="aruga_gallery/<?= $image['image']?>" alt="image" title="" style="padding-top:10px;"/>
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
