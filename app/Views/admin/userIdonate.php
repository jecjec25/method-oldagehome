<!DOCTYPE HTML>
<html>
<head>
    <title>Monetary Donation</title>
    <link rel="icon" type="image/png" href="/picture.png">
    <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="css/bootstrap.css" type='text/css' />
    <link rel="stylesheet" href="css/style.css" type='text/css' />
    <link rel="stylesheet" href="/css/userdonate.css" type='text/css' />

</head>
<body>
    <div class="contact_desc">
        <?php include('includes/user/sidebar.php')?>		
        <div class="container">
            <br>
            <h2>Monetary/Cash Donation</h2>
            <div class="contact-form">
                <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <form action="<?= base_url("sbmtDonation") ?>" method="post" class="left_form booking-form" enctype="multipart/form-data">
                    <?php if(isset($book['bookingId'])): ?>
                    <input type="hidden" name="bookingId" value="<?= $book['bookingId'] ?>">
                    <?php endif; ?>
                    <div>
                        <input type="hidden" name="usersignsId" value="<?= session()->get('userID') ?>">
                        <label>Name Of Establishment</label>
                        <span><input type="text" name="establishment" placeholder="Name of Establishment (Optional)" class="textbox"></span>
                        <span><label>Last Name</span></label></span>
                        <span><input name="lastname" type="text" placeholder="Enter your last name" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>First Name</span></label></span>
                        <span><input name="firstname" type="text" placeholder="Enter your first name" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Middle Name</label></span>
                        <span><input name="middlename" type="text" placeholder="Enter your middle name" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Contact Number<span class="required"></span></label></span>
                        <span><input required name="contactnum" id="contactnum" type="text" pattern="(\+?63|0)9\d{9}" maxlength="13" placeholder="Contact Number" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Receipt Number<span class="required"></span></label></span>
                        <span><input required name="referencenum" id="referencenum" type="text" placeholder="Reference Number" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Cash Donation</label></span>
                        <span><input name="cashDonation" id="cashDonation" type="text" placeholder="Amount" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Cash Check </label></span>
                        <span><input name="cashCheck" id="cashCheck" type="text" placeholder="Amount" class="textbox"></span>
                       </div>
                       <div>
                        <label>For Cash Check</label><br>
                        
                        <button type="button" id="openCamera">Open Camera</button>
                        <!-- Camera container -->
                        <div id="cameraContainer">
                            <video id="cameraFeed" autoplay></video>
                            <button type="button" id="capturePhoto">Capture Photo</button>
                            <input type="hidden" id="imageData" name="imageData">
                            <canvas id="photoCanvas"></canvas>
                        </div>
                        <br>
                        <input type="file" name="picture" id="picture">
                        <!-- Image preview container -->
                        <div>
                            <img id="imagePreview" alt="Image Preview">
                        </div>  

                    <div>
                        <span><label>Message</label></span>
                        <span><input name="message" type="text" placeholder="Message" class="textbox"></span>
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
        document.getElementById("contactnum").addEventListener("input", function(event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Camera script
        const openCameraButton = document.getElementById('openCamera');
        const cameraContainer = document.getElementById('cameraContainer');
        const cameraFeed = document.getElementById('cameraFeed');
        const capturePhotoButton = document.getElementById('capturePhoto');
        const photoCanvas = document.getElementById('photoCanvas');
        const imageDataInput = document.getElementById('imageData');
        const imagePreview = document.getElementById('imagePreview');

        openCameraButton.addEventListener('click', function() {
            cameraContainer.style.display = 'block';
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    cameraFeed.srcObject = stream;
                })
                .catch(function(error) {
                    console.error('Error accessing camera:', error);
                });
        });
        
        capturePhotoButton.addEventListener('click', function() {
            const context = photoCanvas.getContext('2d');
            photoCanvas.width = cameraFeed.videoWidth;
            photoCanvas.height = cameraFeed.videoHeight;
            context.drawImage(cameraFeed, 0, 0, photoCanvas.width, photoCanvas.height);
            const imageDataURL = photoCanvas.toDataURL('image/jpeg');
            console.log('Captured photo data URL:', imageDataURL);
            imageDataInput.value = imageDataURL;

            // Show the captured image in the image preview
            imagePreview.src = imageDataURL;
            imagePreview.style.display = 'block';
        });

        // Function to handle file input change event
        function handleFileInputChange(event) {
            const file = event.target.files[0]; // Get the selected file
            const reader = new FileReader(); // Create a FileReader object

            // Define the function to execute when FileReader finishes reading the file
            reader.onload = function(e) {
                // Set the source of the image preview to the read data URL
                imagePreview.src = e.target.result;
                // Show the image preview
                imagePreview.style.display = 'block';
            };

            // Read the file as a data URL
            reader.readAsDataURL(file);
        }

        // Add event listener to the file input element
        document.getElementById('picture').addEventListener('change', handleFileInputChange);
    </script></body>
</html>
