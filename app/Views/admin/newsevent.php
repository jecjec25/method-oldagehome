<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News and Events</title>
    <link href="/css/news.css" rel='stylesheet' type='text/css'/>
</head>
<body>

<div class="container">
    <ul>
        <?php foreach ($news as $mnews): ?>
            <li>
                <h2>News</h2>
                <h3 class="mean"><?= $mnews['title']; ?></h3>
                <p><h4 class="mean"><strong>Author:</strong> <?= $mnews['author']; ?></h4></p>
                <p class="dist"> <strong>Content:</strong> <?= $mnews['Content']; ?></p>
                <p><strong>Date Published:</strong> <?= $mnews['date_published']; ?></p>
                <p><strong>Category:</strong> <?= $mnews['Category']; ?></p>
                <p><strong>Attachment:</strong> <br><img class="sinc" src="<?="/upload/news/" . $mnews['picture'] ?>" alt="newsba"></p>
                <a href="/news" class="btn">Back</a>
            </li>
            <div style="clear: both;"></div>
        <?php endforeach; ?>
        <?php foreach ($events as $mevents): ?>
            <li>
                <h2>Events</h2>
                <h3 class="mean"><?= $mevents['Title']; ?></h3>
                <p class="dist"> <strong>Description:</strong> <?= $mevents['Description']; ?></p>
                <p ><strong>Organizer:</strong> <?= $mevents['Organizer']; ?></p>
                <p><strong>Category:</strong> <?= $mevents['Category']; ?></p>
                <p><strong>Attendees:</strong> <?= $mevents['Atendees']; ?></p>
                <p><strong>Attachments:</strong><br> <img class="sinc"src="<?="/upload/events/" . $mevents['Attachments']?>" alt="eventsba"></td></p>
                <p><strong>Start Date:</strong> <?= $mevents['Start_date']; ?></p>
                <p><strong>End Date:</strong> <?= $mevents['End_date']; ?></p>
                <form action="<?= base_url('feedback')?>" method="post">
                
                <input type="hidden" name="usersignsId" value="<?= session()->get('id')?>">
                <input type="hidden" name="eventid" value="<?= $mevents['EventID']?>">
                <textarea disabled name="feedback" id="" cols="60" rows="10" placeholder="Please Login Before you write a Feedback"></textarea>
                <b><a href="<?= base_url('signin')?>" class="button">Login</a></b>
                </form>
                <br>
                <br>
                <br>
                <br>
                <a href="/news" class="btn">Back</a>
              
            </li>
            <br>
            <br>
        <?php endforeach; ?>
        <?php foreach($feedback as $feed):?>
            <ul>
                <li>
                   <?= $feed['Username']?>: <?= $feed['feedback']?>
                </li>
            </ul>
        <?php endforeach;?>
    </ul>
</div>

</body>
</html>
