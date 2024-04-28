<!DOCTYPE HTML>
<html>
<head>
    <title>Menu</title>
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
        .box-main {
            background-color: beige;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
            margin: 0 auto; /* Center align content */
        }
        .secondhalf {
            width: 100%;
            display: flex;
            flex-direction: column;
            margin-left: 100px;
            justify-content: center;
        }
        .text-big {
            font-family: 'Piazzolla', serif;
            font-weight: bold;
            font-size: 35px;
        }
        .text-small {
            font-size: 18px;
        }
        .image-qr {
            width: 60vh;
            height: 60vh;
        }
        /* Add this style to align the text to the left */
        .how-to-make-difference {
            text-align: left;
        }
        .hello{
            font-size:20px;
            text-align:justify;
            font:black;
            color:black;
            margin-left:10px;
        }
    </style>
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
              <img src="aruga_gallery/g21.jpg" class="img-responsive" alt=""/>
            </div>
            <div class="col-md-8 service-images-text">
              <div class="inner-text" style="text-align:justify;">
                <h3>Dear Community Members,</h3>
                <p>As we navigate through life, it's essential to remember the valued members of our
                    community—the seniors who have contributed so much wisdom, experience, and love over
                    the years. Many of our elderly neighbors reside in homes for the aged, where they deserve 
                    our unwavering support and care.
                    <br>
                    <br>
                    Each senior has a unique story to tell, a lifetime of memories to cherish, and a wealth of knowledge to share.
                    Let's come together to ensure they receive the respect, 
                        
                </p>
                <p></p>
            </div>

        </div>
        <div class="hello">
        dignity, and compassion they deserve in their golden years.<br><br>
                    <span class="how-to-make-difference">Here's how you can make a difference:<br><span>
                    <br>
                    <span><b>1. Offer Your Time: </b>Volunteer at local homes for the aged. Spend time chatting with seniors, playing games,
                    or simply lending a listening ear. Your presence can brighten their day and alleviate feelings of loneliness.<br><span>
                    <span><b>2. Share Your Skills: </b>Do you have a talent or hobby you can teach? Consider leading a workshop or class for seniors.
                    Whether it's painting, gardening, or storytelling, your expertise can enrich their lives and foster a sense of accomplishment.<br><span>
                    <span><b>3. Stay Connected: </b>Reach out to elderly neighbors or family friends regularly. A simple phone call, letter, or visit
                    can make a world of difference in their day. Let them know they are valued and remembered.<br><span>
                    <span><b>4. Support Caregivers: </b>Caregiving can be physically and emotionally demanding. Offer assistance to caregivers by providing
                    respite care, running errands, or offering a listening ear. Your support can ease their burden and show appreciation for their dedication.<br><span>
                    <span><b>5. Advocate for Senior Rights: </b>Be an advocate for policies and initiatives that support the well-being and rights of seniors. Raise awareness
                    about issues such as elder abuse, healthcare access, and social isolation.<br><span>
                    <span><b>6. Celebrate Their Contributions: </b>Recognize and celebrate the achievements and contributions of seniors in your community. Host events, share stories,
                    and honor their legacy for future generations to appreciate.<br><span>
                        <br>
                    <span>Together, let's create a community where seniors are valued, respected, and cherished. Your kindness and compassion can make a meaningful difference
                    in the lives of our beloved elders.<br><span>
                        <br>
                    <span>With gratitude,</span>
                        <br>
                    <span>Aruga Kapatid Foundation Incorporated <br>
                    Home for the Aged</span>
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
