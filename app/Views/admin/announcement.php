<!DOCTYPE HTML>
<html>
<head>
    <title>Announcement</title>
    <link rel="icon" type="image/png" href="/picture.png">
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="/css/announce.css" rel='stylesheet' type='text/css' />

    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){        
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic,400italic,700italic|Niconne' rel='stylesheet' type='text/css'>
    
    <style>
        .announcement {
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
        <?php include_once('includes/header.php');?>
        
        <section>
            <div class="events">
                <div class="leftBox">
                    <div class="content">
                        <h1>Announcements</h1>
                        <p>
                            Aruga Kapatid Foundation Incorporated invites you to a community event next month celebrating
                            the wisdom and vitality of its residents. Join us for entertainment, heartfelt conversations, and
                            cherished memories as we honor their life experiences. This gathering reflects our commitment to
                            fostering connections and spreading joy. Save the date and share in the warmth at Aruga Kapatid
                            Foundation Incorporated Home for the Aged.
                        </p>
                    </div>
                </div>

                <ul>
                    <?php $hasAnnouncement = false; ?>
                    <?php foreach($announce as $announcem): ?>
                        <?php if ($announcem['Status'] != 'Archive'): ?>
                            <?php $existing = $announcem['End_date'] >= $currentDate; ?>
                            <?php if ($existing): ?>
                                <?php $hasAnnouncement = true; ?>
                                <li>
                                    <div class="time">
                                        <h2>
                                            <?= date('d', strtotime($announcem['Start_date'])) ?> <br>
                                            <span><?= date('F', strtotime($announcem['Start_date'])) ?></span>
                                        </h2>
                                    </div>
                                    <div class="details">
                                        <h3><?= $announcem['Title']?> <br></h3>
                                        <img src="<?="/upload/announcement/" . $announcem['Attachments']?>" alt="announcementba">  <br>
                                        <a href="<?= base_url('viewAnnounce/' . $announcem['AnnounceID'])?>">View Announce</a>
                                    </div>
                                    <div style="clear: both;"></div>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    
                    <?php if (!$hasAnnouncement): ?>
                        <li>
                            <h2 class="Announcement">We Have No Main Announcement. Please Wait for Several Times.</h2>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </section>

        <?php include_once('includes/footer.php');?>    

        <script type="text/javascript">
            $(document).ready(function() {
                $().UItoTop({ easingType: 'easeOutQuart' });
            });
        </script>
        <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    </div>
</body>
</html>
