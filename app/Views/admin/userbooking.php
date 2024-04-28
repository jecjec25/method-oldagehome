<!DOCTYPE HTML>
<html>
<head>
    <title>Event Booking</title>
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
            <h2>Event Reservation</h2>
            <div class="contact-form">
                <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <form action="<?= base_url("checkbooks") ?>" method="post" class="left_form booking-form">
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
                        <span><input required="true" name="contactnum" id="contactnum" type="text" pattern="(\+?63|0)9\d{9}" maxlength="13" placeholder="Contact number" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Type of Event<span class="required"></span></label></span>
                        <span><input required="true" name="event" type="text"  placeholder="Type of event" class="textbox"></span>
                    </div>
                    <div>
                        <label for="prefferdate">Preferred Date<span class="required">*</span></label>
                        <input required="true" id="prefferdate" name="prefferdate" type="date" class="textbox">
                    </div>
                    <div>
                        <label for="time">Preferred Time<span class="required">*</span></label>
                        <select name="Time" id="time">
                            <option value="9am-11am">9AM-11AM</option>
                            <option value="11am-1pm">11AM-1PM</option>
                            <option value="1pm-3pm">1PM-3PM</option>
                        </select>
                    </div>
                    <div>
                        <span><label>Specific Equipments Needed<span class="required"></span></label></span>
                        <span><input required="true" name="equipment" type="text" placeholder="e.g., sound system, projector..." class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Questions or Comments<span class="required"></span></label></span>
                        <span><input required="true" name="comments" type="text" placeholder="Enter your questions or comments" class="textbox"></span>
                    </div>
					<br>
                    <div>
                        <input type="submit" value="Submit" onclick="return confirm('Are you sure you want to submit this form?')" name="bookcheck">
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

        document.addEventListener('DOMContentLoaded', function() {
            var form = document.querySelector('.booking-form');
            form.addEventListener('submit', function(event) {
                var appointmentDate = new Date(form.querySelector('input[name="prefferdate"]').value);
                var currentDate = new Date();

                if (appointmentDate <= currentDate) {
                    event.preventDefault();
                    alert('Please select a valid date and time for reservation. Reservations must be made for a future time.');
                    return;
                }

                var selectedTime = form.querySelector('select[name="Time"]').value;
                var existingReservations = <?php echo json_encode($book); ?>;
                
                for (var i = 0; i < existingReservations.length; i++) {
                    var reservedDate = new Date(existingReservations[i]['preferdate']);
                    var reservedTime = existingReservations[i]['Time'];
                    var status = existingReservations[i]['status'];

                    if (reservedDate.getFullYear() === appointmentDate.getFullYear() &&
                        reservedDate.getMonth() === appointmentDate.getMonth() &&
                        reservedDate.getDate() === appointmentDate.getDate() &&
                        reservedTime === selectedTime &&
                        status === 'Accepted') {
                        event.preventDefault();
                        alert('This date and time is already reserved and accepted.');
                        return;
                    }
                }
            });
        });
    </script>
</body>
</html>
