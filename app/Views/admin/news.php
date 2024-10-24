<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Event</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/picture.png">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- Custom Styles -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="/css/userview.css" rel="stylesheet" type="text/css" />

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic,400italic,700italic|Niconne' rel='stylesheet' type='text/css'>

    <!-- jQuery -->
    <script src="js/jquery-1.8.3.min.js"></script>

    <!-- Modernizr -->
    <script src="js/modernizr.custom.js"></script>

    <!-- Move Top and Easing Scripts -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>

    <!-- Hide URL Bar on Load -->
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar() { window.scrollTo(0, 1); }
    </script>

    <!-- Scroll Animation Script -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){        
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>

    <!-- Custom Styles for the Event View Page -->
    <style>
        h2 {
            font-family: 'Lato', sans-serif;
            font-weight: 700;
            color: #A3C9D2;
            text-transform: uppercase;
            margin-bottom: 20px;
            border-bottom: 2px solid #f39c12;
            padding-bottom: 10px;
            text-align: center;
        }

        .leftBox {
            text-align: center;
        }

        .events {
            align-items: center;
        }

        section {
            width: 100%;
        }
    </style>

</head>

<body>
    <div>
        <?php include_once('includes/header.php'); ?>
        <br>
        <br>
        
        <section>
            <div class="events">
                <div class="leftBox">
                    <div class="content">
                        <h1>News And Events</h1>
                        <p>Aruga Kapatid Foundation Incorporated thrives as a compassionate center in the heart of the community.</p>
                    </div>
                </div>

                <ul>
                    <h2>News</h2>
                    <?php foreach ($news as $mnews): ?>
                        <li>
                            <div class="time">
                                <h2>
                                    <?= date('d', strtotime($mnews['date_published'])) ?> <br>
                                    <span><?= date('F', strtotime($mnews['date_published'])) ?></span>
                                </h2>
                            </div>
                            <div class="details">
                                <h3><?= $mnews['title'] ?> <br></h3>
                                <img src="<?= "/upload/news/" . $mnews['picture'] ?>" alt="news"><br>
                                <a href="<?= base_url('newsvents/' . $mnews['id']) ?>" class="btn btn-secondary">View News</a>
                            </div>
                            <div style="clear: both;"></div>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <?php
                $hasMainEvents = false;
                $hasUserEvents = false;
                if (empty($eventadmin) && empty($eventuser)): ?>
                    <p>No upcoming events.</p>
                <?php else: ?>
                    <!-- Main Event -->
                    <?php if (!empty($eventadmin)): ?>
                        <h2>Main Event</h2>
                        <ul>
                            <?php foreach ($eventadmin as $mevents): ?>
                                <?php if ($mevents['End_date'] >= $currentDate): ?>
                                    <?php $hasMainEvents = true; ?>
                                    <li>
                                        <div class="time">
                                            <h2><?= date('d', strtotime($mevents['Start_date'])) ?> <br><span><?= date('F', strtotime($mevents['Start_date'])) ?></span></h2>
                                        </div>
                                        <div class="details">
                                            <h3><?= $mevents['Title'] ?><br></h3>
                                            <img src="<?= "/upload/events/" . $mevents['Attachments'] ?>" alt=""><br>
                                            <a href="<?= base_url('newsvents/' . $mevents['EventID']) ?>">View Event</a>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php if (!$hasMainEvents): ?>
                                <li><h2>We have No Main Events</h2></li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>

                    <!-- User Event -->
                    <?php if (!empty($eventuser)): ?>
                        <h2>User Event</h2>
                        <ul>
                            <?php foreach ($eventuser as $mevents): ?>
                                <?php if ($mevents['End_date'] >= $currentDate): ?>
                                    <?php $hasUserEvents = true; ?>
                                    <li>
                                        <div class="time">
                                            <h2><?= date('d', strtotime($mevents['Start_date'])) ?> <br><span><?= date('F', strtotime($mevents['Start_date'])) ?></span></h2>
                                        </div>
                                        <div class="details">
                                            <h3><?= $mevents['Title'] ?><br></h3>
                                            <img src="<?= "/upload/events/" . $mevents['Attachments'] ?>" alt=""><br>
                                            <a href="<?= base_url('newsvents/' . $mevents['EventID']) ?>">View Event</a>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php if (!$hasUserEvents): ?>
                                <li><h2>We have No User Events</h2></li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </section>
        <br>
        <?php include_once('includes/footer.php'); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $().UItoTop({ easingType: 'easeOutQuart' });
            });
        </script>
        <a href="#home" id="toTop" class="scroll" style="display: block;"> 
            <span id="toTopHover" style="opacity: 1;"> </span>
        </a>
    </div>
</body>
</html>
