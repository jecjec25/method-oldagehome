<!DOCTYPE html>
<html>

<head>
    <title>Event Reservation</title>
    <link rel="icon" type="image/png" href="/picture.png">
    <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="/css/userbooking.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="/css/userdonate.css" type='text/css' />
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
                        <span><label>Establishment</label></span>
                        <span><input name="establishment" type="text" placeholder="Name of Establishment (Optional)" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Last Name</label></span>
                        <span><input name="lastname" type="text" placeholder="Enter your last name" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>First Name</label></span>
                        <span><input name="firstname" type="text" placeholder="Enter your first name" class="textbox"></span>
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
                            <option value="">Select a time</option>
                        </select>
                    </div>
                    <div>
                        <span><label>Specific Equipments Needed</label></span>
                        <span><input name="equipment" type="text" placeholder="e.g., sound system, projector..." class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Questions or Comments</span></label></span>
                        <span><input name="comments" type="text" placeholder="Enter your questions or comments" class="textbox"></span>
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
        dateFormat: 'yy-mm-dd', // Adjusted to match the format of the dates in disableDates
        minDate: 0, // This disables all past dates, making the minimum selectable date today
        beforeShowDay: function (date) {
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            if (bookings[string] && bookings[string].includes('WholeDay')) {
                return [false]; // Disable the date if it's fully booked
            }
            return [true]; // Enable other dates
        },
        onSelect: function (dateText, inst) {
            var selectedDate = dateText;
            var timeSelect = document.getElementById('time');

            // Clear existing options
            timeSelect.innerHTML = '';

            // Time slots
            var times = [
                { value: "WholeDay", label: "Whole Day" },
                { value: "HalfDay-morning", label: "Half Day in the morning" },
                { value: "HalfDay-afternoon", label: "Half Day in the afternoon" },
                { value: "9:00:00 - 11:00:00", label: "9:00 AM - 11:00 AM" },
                { value: "11:00:00 - 13:00:00", label: "11:00 AM - 1:00 PM" },
                { value: "13:00:00 - 15:00:00", label: "1:00 PM - 3:00 PM" }
            ];

            // If the selected date has bookings, disable the booked times
            var booking = bookings[selectedDate];
            if (booking) {
                times.forEach(time => {
                    var option = document.createElement('option');
                    option.value = time.value;
                    option.text = time.label;

                    if (booking.includes(time.value) ||
                        (time.value === "9:00:00 - 11:00:00" && booking.includes("HalfDay-morning")) ||
                        (time.value === "11:00:00 - 13:00:00" && booking.includes("HalfDay-morning")) ||
                        (time.value === "13:00:00 - 15:00:00" && booking.includes("HalfDay-afternoon")) ||
                        (time.value === "WholeDay") ||
                        (booking.includes("HalfDay-morning") && booking.includes("HalfDay-afternoon"))) {
                        option.disabled = true;
                        option.hidden = true;
                    }

                    if (booking.includes(time.value = "9:00:00 - 11:00:00") || booking.includes(time.value = "11:00:00 - 13:00:00")) {
                        if (option.value === "HalfDay-morning") {
                            option.disabled = true;
                            option.hidden = true;
                        }
                    }

                    if (booking.includes(time.value = "13:00:00 - 15:00:00")) {
                        if (option.value === "HalfDay-afternoon") {
                            option.disabled = true;
                            option.hidden = true;
                        }
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
