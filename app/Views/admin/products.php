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
    
    <script src="./js/jquery-1.8.3.min.js"></script>
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
</head>
<body>
    <?php include_once('includes/header.php'); ?>
    
    <section class="team_section layout_padding">
        <div class="containered">
            <div class="heading_container heading_center">
                <br>
                <br>
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
