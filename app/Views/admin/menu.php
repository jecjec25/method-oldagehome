<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Necessity</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/LogoHapagAruga.png/">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- Custom Styles -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="/css/menu.css" rel="stylesheet" type="text/css" />

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic,400italic,700italic|Niconne' rel='stylesheet' type='text/css'>

    <!-- jQuery -->
    <script src="js/jquery-1.8.3.min.js"></script>

    <!-- Modernizr -->
    <script src="js/modernizr.custom.js"></script>

    <!-- Move Top and Easing Scripts -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>

    <!-- Hide URL Bar on Load -->
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar() { window.scrollTo(0, 1); }
    </script>

    <!-- Scroll Animation Script -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){        
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>

    <style>
        .service-images img {
            max-width: 100%; /* Ensure images are responsive */
            height: auto;    /* Maintain aspect ratio */
        }

        .content {
            padding: 20px; /* Add some padding around the content */
        }

        .service-images-text {
            padding: 20px; /* Padding for text area */
            overflow: hidden; /* Hide overflow */
            text-align: left; /* Align text to the left */
            box-sizing: border-box; /* Include padding in width calculations */
        }

        .service-box {
            margin-top: 4%;
            padding: 4%;
            border: solid;
            border-radius: 28px;
            color: rgb(201, 68, 103);
            background-color: #c9c7c1;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Optional shadow for better visibility */
        }

        /* Media query for smaller devices */
        @media (max-width: 768px) {
            .service-images, .service-images-text {
                flex-basis: 100%; /* Stack items vertically on small screens */
                text-align: center; /* Center align text */
            }

            .blog-top h3 {
                font-size: 1.5rem; /* Adjust font size for headers */
            }

            .how-to-make-difference {
                font-size: 1.2rem; /* Adjust font size for smaller screens */
            }

            /* Adjust padding on smaller screens */
            .service-images-text {
                padding: 10px; /* Reduce padding on small screens */
            }
        }
    </style>
</head>

<body>
<?php include_once('includes/header.php');?> 
<div class="content">
    <div class="blog">
        <div class="container">    
            <div class="blog-top">       
                <h3>What do our Elders need?</h3>
            </div>

            <div class="col-md-12 service-box">
                <div class="col-md-4 service-images">
                    <img src="aruga_gallery/<?= $mes[1]['img'] ?>" class="img-responsive" alt=""/>
                </div>

                    <div class="inner-textes">
                        <h3>Dear Community Members,</h3>
                        <p>As we navigate through life, it's essential to remember the valued members of our
                            community—the seniors who have contributed so much wisdom, experience, and love over
                            the years. Many of our elderly neighbors reside in homes for the aged, where they deserve 
                            our unwavering support and care.
                            <br><br>
                            Each senior has a unique story to tell, a lifetime of memories to cherish, and a wealth of knowledge to share.
                            Let's come together to ensure they receive the respect, dignity, and compassion they deserve in their golden years.
                        </p>
                    </div>
                    <div class="form">
                        <br>
                <span class="how-to-make-difference">What do our elders need:</span>
                <?php foreach($menu as $menu):?>
                    <ul>
                        <li><span class="middle"><?= $menu['need'] ?></span>: <span class="fins"><?= $menu['description'] ?></span></li>
                    </ul>
                <?php endforeach;?>
            </div>
                </div>
            </div> 
            <div class="clearfix"> </div> 
            <br><br>
            
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
