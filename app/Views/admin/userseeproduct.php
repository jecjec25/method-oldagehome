<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    
    <link rel="icon" type="image/png" href="/picture.png">

    <link href="./css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
    <link href="./css/styles.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic,400italic,700italic|Niconne' rel='stylesheet' type='text/css'>

    <script src="./js/jquery-1.8.3.min.js"></script>
    <script src="./js/modernizr.custom.js"></script>
    <script type="text/javascript" src="./js/move-top.js"></script>
    <script type="text/javascript" src="./js/easing.js"></script>

    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar() { window.scrollTo(0, 1); }
    </script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {        
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
    </script>

    <style>
        /* Modal Styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0,0,0,0.9); 
            justify-content: center; /* Center modal content horizontally */
            align-items: center; /* Center modal content vertically */
        }

        .modal-content {
            max-width: 90%; /* Max width of the modal image */
            max-height: 90%; /* Max height of the modal image */
            margin: auto; /* Center the image in modal */
            display: block;
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }

        /* Gallery image styling */
        .gallery img {
            width: 100%; /* Make images responsive in the gallery */
            height: auto; /* Maintain aspect ratio */
            max-width: 200px; /* Limit the maximum size of the thumbnails */
            cursor: pointer; /* Show pointer on hover */
        }
    </style>
</head>
<body>
<?php include_once('includes/user/sidebar.php');?>

	
    <section class="team_section layout_padding">
        <div class="containered">
            <div class="heading_container heading_center">
                <h2>Product</h2>
                <p style="color:black;">
                    Creating products for old age homes involves considering the unique needs and challenges faced by seniors.
                </p>
            </div>
            <div class="gallery">
                <?php foreach($prodimg as $prods): ?>
                <div class="content">
                    <a href="javascript:void(0)" onclick="openModal('upload/product/<?= $prods['prodpic'] ?>')">
                        <img name="Picture" src="upload/product/<?= $prods['prodpic'] ?>" alt="product Image">
                    </a>
                    <h3 name="ProductName"><?= $prods['name'] ?></h3>
                    <h4 name="ProductName"><?= $prods['description'] ?></h4>
                    <h3 name="Price"><?= $prods['price'] ?></h3>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    <?php include_once('includes/footer.php'); ?>
    
    <!-- Modal for image preview -->
    <div id="imageModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <script type="text/javascript">
        function openModal(imageSrc) {
            const modal = document.getElementById("imageModal");
            const modalImage = document.getElementById("modalImage");
            modal.style.display = "flex"; // Use flex to center the modal content
            modalImage.src = imageSrc;
        }

        function closeModal() {
            const modal = document.getElementById("imageModal");
            modal.style.display = "none";
        }

        $(document).ready(function() {
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>

    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</body>
</html>
