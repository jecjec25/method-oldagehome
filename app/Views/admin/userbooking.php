<!DOCTYPE html>
<html>

<head>
    <title>Event Reservation</title>
    <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
    <link rel="stylesheet">
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="/css/userbooking.css" rel='stylesheet' type='text/css' />
    <link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <style type="text/css">
        .containers {
            border-radius: 5px;
            padding: 50px 20px;
            margin: 30px auto;
            width: 40%;
            border: 2px solid #bbb;
            text-align: center;
        }

        input {
            padding: 5px;
            background-color: #eeeeee;
        }

        h2 {
            text-align: left;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="contact_desc">
        <?php include('includes/user/sidebar.php') ?>
        <div class="container">
            <br>
            <h2>Event Reservation</h2>
            <div class="contact-form">
                <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <form action="<?= base_url("checkbooks") ?>" method="post" class="left_form booking-form">
                    <?php if (isset($book['bookingId'])): ?>
                    <input type="hidden" name="bookingId" value="<?= $book['bookingId'] ?>">
                    <?php endif; ?>
                    <div>
                        <input type="hidden" name="usersignsId" value="<?= session()->get('userID') ?>">
                        <span><label>Last Name<span class="required"></span></label></span>
                        <span><input required="true" name="lastname" type="text" placeholder="Enter your last name" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>First Name<span class="required"></span></label></span>
                        <span><input required="true" name="firstname" type="text" placeholder="Enter your first name" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Middle Name</label></span>
                        <span><input name="middlename" type="text" placeholder="Enter your middle name" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Contact Number<span class="required"></span></label></span>
                        <span><input required="true" name="contactnum" id="contactnum" type="text" pattern="(\+?63|0)9\d{9}" maxlength="13" placeholder="Contact number" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Type of Event<span class="required"></span></label></span>
                        <span><input required="true" name="event" type="text" placeholder="Type of event" class="textbox"></span>
                    </div>
                    <div>
                        <label for="prefferdate">Preferred Date<span class="required"></span></label>
                        <input required="true" id="prefferdate" name="prefferdate" type="text" class="dates">
                    </div>
                    <div>
                        <label for="time">Preferred Time<span class="required"></span></label>
                        <select name="Time" id="time">
                          
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
    <script type="text/javascript">
        var bookings = <?= json_encode($disableDates) ?>;

        $("input.dates").datepicker({
            dateFormat: 'dd-mm-yy',
            beforeShowDay: function (date) {
                var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                if (bookings[string] && bookings[string].length >= 3) { // Adjust if more time slots exist
                
                    return [array.indexOf(string) == -1]
                }
                return [true];
            },
            onSelect: function (dateText, inst) {
                var selectedDate = dateText;
                var timeSelect = document.getElementById('time');

                // Clear existing options
                timeSelect.innerHTML = '';

                // Time slots
                var times = [
                    { value: "9:00", label: "9 AM" },
                    { value: "11:00", label: "11 AM" },
                    { value: "13:00", label: "1 PM" }
                ];

                // If the selected date has bookings, disable the booked times
                var booking = bookings[selectedDate];
                if (booking) {
                    times.forEach(time => {
                        var option = document.createElement('option');
                        option.value = time.value;
                        option.text = time.label;
                        if (booking.includes(time.value)) {
                            option.disabled = true;
                        }
                        timeSelect.appendChild(option);
                    });
                } else {
                    // If no bookings, enable all time slots
                    times.forEach(time => {
                        var option = document.createElement('option');
                        option.value = time.value;
                        option.text = time.label;
                        timeSelect.appendChild(option);
                    });
                }
            }
        });

        var inputs = document.getElementById("contactnum");
        inputs.addEventListener("input", function (event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</body>

</html>
