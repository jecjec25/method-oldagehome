<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900|Niconne&display=swap" rel="stylesheet">
    
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <style>
        .firstsection, .secondsection {
            border-style: outset;
            margin: 20px auto;
            padding: 20px;
        }
        .firstsection {
            background-color: beige;
            max-height: 400px;
            overflow-y: auto; /* Add scrollbar if content exceeds height */
        }
        .secondsection {
            background-color: cornsilk;
            max-height: 300px;
            overflow-y: auto; /* Add scrollbar if content exceeds height */
        }
        .box-main {
            background-color: beige;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
            margin: 20px auto; /* Center align content */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .firsthalf, .secondhalf {
            width: 100%;
            display: flex;
            flex-direction: column;
            margin-left: 20px;
            justify-content: center;
        }
        .text-big {
            font-family: 'Lato', serif;
            font-weight: bold;
            font-size: 35px;
            text-align: center;
        }
        .text-small {
            font-size: 18px;
            margin: 10px 0;
        }
        .image-qr {
            width: 100%;
            max-width: 300px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .cute-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #ff69b4;
            border: none;
            border-radius: 25px;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s;
            margin: 10px auto;
            display: block;
        }
        .cute-button:hover {
            background-color: #ff1493;
            transform: translateY(-2px);
        }
        .cute-button:active {
            background-color: #ff1493;
            transform: translateY(0);
        }
    </style>
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

    <div class="box-main">
        <div class="secondhalf">
            <h1 class="text-big" id="monetary">Monetary Donation Instruction</h1>
            <p class="text-small">We accept donations using G-cash and bank-to-bank transactions:</p>
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

    <div class="box-main">
        <div class="firsthalf">
            <h1 class="text-big" id="in-kind">In-Kind Donation Instruction</h1>
            <p class="text-small">We accept donations In-Kind:</p>
            <p class="text-small">You can donate any In-Kind for our Senior Citizens at Aruga Kapatid Foundation Corporation in Managpi, Calapan City, Oriental Mindoro. In donating, you can go to our place at Managpi, Calapan City, or you can also make a shipment package to our foundation.</p>
            <a href="signin" class="cute-button">Donate Here</a>
        </div>
    </div>

    <?php include_once('includes/footer.php');?>

    <script type="text/javascript">
        $(document).ready(function() {
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

</body>
</html>
