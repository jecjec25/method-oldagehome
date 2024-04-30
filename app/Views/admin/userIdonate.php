<!DOCTYPE HTML>
<html>
<head>
    <title>User Donation</title>
    <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
    <link rel="stylesheet" >
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <style>
        .required::after {
            content: "*";
            color: red;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="contact_desc">
        <?php include('includes/user/sidebar.php')?>		
        <div class="container">
            <br>
            <h2>User Donation</h2>
            <div class="contact-form">
                <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <form action="<?= base_url("sbmtDonation") ?>" method="post" class="left_form booking-form">
                    <?php if(isset($book['bookingId'])): ?>
                    <input type="hidden" name="bookingId" value="<?= $book['bookingId'] ?>">
                    <?php endif; ?>
                    <div>
                        <input type="hidden" name="usersignsId" value="<?= session()->get('id') ?>">
                        <span><label>Last Name<span class="required"></span></label></span>
                        <span><input required="true" name="lastname" type="text" placeholder="Enter your last name" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>First Name<span class="required"></span></label></span>
                        <span><input required="true" name="firstname" type="text"  placeholder="Enter your first name" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Middle Name</label></span>
                        <span><input required="true" name="middlename" type="text" placeholder="Enter your middle name" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Contact Number<span class="required"></span></label></span>
                        <span><input required="true" name="contactnum" id="contactnum" type="text" pattern="(\+?63|0)9\d{9}" maxlength="13" placeholder="Contact Number" class="textbox"></span>
                    </div>
                    <div>
                        <label for="donationdate">Schedule Date<span class="required">*</span></label>
                        <input required="true" id="donationdate" name="donationdate" type="date" class="textbox">
                    </div>
                    <div>
                        <span><label>I donate...<span class="required"></span></label></span>
                        <span><input required="true" name="nameofdonation" type="text" placeholder="I donate..." class="textbox"></span>
                    </div>
                    <button id="openCamera">Open Camera</button>
                    <input type="file" span class="required" name="picture">
                    <!-- Camera container -->
                    <div id="cameraContainer">
                        <video id="cameraFeed" autoplay></video>
                        <button id="capturePhoto">Capture Photo</button>
                        <input type="hidden" id="imageData">
                        <canvas id="photoCanvas"></canvas>
                    </div>

                    <div>
                        <span><label>Reference Number</label><span class="required"></span>
                        <span><input required="true" name="referencenum" type="text" placeholder="Reference Number" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Message</label><span class="required"></span>
                        <span><input required="true" name="message" type="text" placeholder="Message" class="textbox"></span>
                    </div>
					<br>
                    <div>
                        <input type="submit" value="Submit" onclick="return confirm('Are you sure you want to submit this form?')">
                    </div>
					<br>
                </form>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <?php include_once('includes/footer.php');?>
    
    <script src="js/jquery-1.8.3.min.js"></script>
    
	<script>
        var inputs = document.getElementById("contactnum");
        inputs.addEventListener("input", function(event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>

    <script>
        // Get references to DOM elements
        const openCameraButton = document.getElementById('openCamera');
        const cameraContainer = document.getElementById('cameraContainer');
        const cameraFeed = document.getElementById('cameraFeed');
        const capturePhotoButton = document.getElementById('capturePhoto');
        const photoCanvas = document.getElementById('photoCanvas');
        const ImageDataInput = document.getElementById('imageData');
        // Event listener for opening the camera
        openCameraButton.addEventListener('click', function() {
            // Show the camera container
            cameraContainer.style.display = 'block';

            // Get user media (i.e., access the camera)
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    cameraFeed.srcObject = stream;
                })
                .catch(function(error) {
                    console.error('Error accessing camera:', error);
                });
        });

        // Event listener for capturing a photo
        capturePhotoButton.addEventListener('click', function() {
            // Draw the current video frame onto the canvas
            const context = photoCanvas.getContext('2d');
            context.drawImage(cameraFeed, 0, 0, photoCanvas.width, photoCanvas.height);

            // Convert the canvas content to a data URL representing the image
            const imageDataURL = photoCanvas.toDataURL('image/jpeg');
            console.log('Captured photo data URL:', imageDataURL);
            ImageDataInput.value = canvas.toDataURL('img/png');
            // Here you can send the imageDataURL to the server for further processing, e.g., uploading to the server or saving to a database
        });
    </script>
</body>
</html>
