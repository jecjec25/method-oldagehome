<!DOCTYPE HTML>
<html>
<head>
    <title>User Posting</title>
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
            <h2>User Event Posting</h2>
            <div class="contact-form">
                <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <form action="<?= base_url("usersavepost") ?>" method="post" class="left_form booking-form">
                    <div>
                        <input type="hidden" name="usersignsId" value="<?= session()->get('userID') ?>">
                        <span><label>Title<span class="required"></span></label></span>
                        <span><input required="true" name="Title" type="text" placeholder="Title" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Description<span class="required"></span></label></span>
                        <span><input required="true" name="Description" type="text"  placeholder="Description" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>Organizer<span class="required"></label></span>
                        <span><input required="true" name="Organizer" type="text" placeholder="Organizer" class="textbox"></span>
                    </div>
                    <div>
                        <label for="Start_date">Start Date<span class="required">*</span></label>
                        <input required="true" id="Start_date" name="Start_date" type="date" class="textbox">
                    </div>
					<div>
                        <label for="End_date">End Date<span class="required">*</span></label>
                        <input required="true" id="End_date" name="End_date" type="date" class="textbox">
                    </div>
                   <div>
				   <label for="Category">Category<span class="required"></label><br>
                    <input type="checkbox" id="social" name="Category[]" value="Social">
                    <label for="social"> Social</label><br>
                    <input type="checkbox" id="recreational" name="Category[]" value="Recreational">
                    <label for="recreational"> Recreational</label><br>
                    <input type="checkbox" id="educational" name="Category[]" value="Educational">
                    <label for="educational"> Educational</label><br>
                    <input type="checkbox" id="health" name="Category[]" value="Health">
                    <label for="Health"> Health and Wellness</label><br>
                    <input type="checkbox" id="outreach" name="Category[]" value="Outreach">
                    <label for="Outreach"> Community Outreach</label><br>
                    <input type="checkbox" id="cultural" name="Category[]" value="Cultural">
                    <label for="Cultural"> Cultural</label><br>
                    <input type="checkbox" id="special" name="Category[]" value="Special">
                    <label for="Special"> Special</label><br>
				   </div>
				   <div>
                        <span><label>Attendees<span class="required"></span></label></span>
                        <span><input required="true" name="Atendees" type="text"  placeholder="Attendees" class="textbox"></span>
                    </div>
					<div>
					<label for="Attachments">Attachments<span class="required"></label><br>
                    <input id="Attachments" name="Attachments" type="file" required="true" >
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
    
</body>
</html>