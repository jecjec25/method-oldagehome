<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation</title>
    <link rel="icon" type="image/png" href="/picture.png">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900|Niconne&display=swap" rel="stylesheet">
    <link href="/css/donationad.css" rel='stylesheet' type='text/css' />
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
   
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {		
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
    </script>
</head>
<body>

    <?php include_once('includes/header.php');?>
<br>
    <div class="box-main">
        <div class="secondhalf">
            <h1 class="text-big" id="monetary">Monetary Donation Instruction</h1>
            <p class="text-small"><h3>We accept donations using G-cash and bank-to-bank transactions:</h3></p>
            <p class="text-small"><b>BANK TRANSFER</b></p>
            <p class="text-small">Bank Name: Security Bank</p>
            <p class="text-small">Account Holder: Fr. Nestor J. Adalia</p>
            <p class="text-small">Account Number: 0000048463612</p>
            <br>
            <p class="text-small"><b>GCASH NUMBER</b></p>
            <p>
                <img src="images/sirpoygcashnum.jpg" class="image-qr" alt="Gcash QR Code">
            </p>
            <p class="text-small">Account Number: 09985774919</p>
            <p class="text-small">Account Holder: Lito C. Vergara</p>
        </div>
    </div>
    <br>

    <div class="box-main">
        <div class="firsthalf">
            <h1 class="text-big" id="in-kind">In-Kind Donation Instruction</h1>
            <p class="text-small">We accept donations In-Kind:</p>
            <p class="text-small">You can donate any In-Kind for our Senior Citizens at Aruga Kapatid Foundation Corporation in Managpi, Calapan City, Oriental Mindoro. In donating, you can go to our place at Managpi, Calapan City, or you can also make a shipment package to our foundation.</p>
            <a href="signin" class="cute-button">Donate Here</a>
        </div>
    </div>
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
