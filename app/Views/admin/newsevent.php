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
                <h3><?= $mnews['title']; ?></h3>
                <p><h1><?= $mnews['Content']; ?></h1></p>
                <p><strong>Author:</strong> <?= $mnews['author']; ?></p>
                <p><strong>Date Published:</strong> <?= $mnews['date_published']; ?></p>
                <p><strong>Category:</strong> <?= $mnews['Category']; ?></p>
                <p><strong>Attachments:</strong> <img src="<?="/upload/news/" . $mnews['picture'] ?>" alt="newsba" style="witdh:150px; height:150px;"></p>
                <a href="/news" class="btn btn-secondary">Back</a>
            </li>
        <?php endforeach; ?>
        <?php foreach ($events as $mevents): ?>
            <li>
                <h2>Events</h2>
                <h3><?= $mevents['Title']; ?></h3>
                <p><h1><?= $mevents['Description']; ?></h1></p>
                <p><strong>Organizer:</strong> <?= $mevents['Organizer']; ?></p>
                <p><strong>Category:</strong> <?= $mevents['Category']; ?></p>
                <p><strong>Attendees:</strong> <?= $mevents['Atendees']; ?></p>
                <p><strong>Attachments:</strong> <img src="<?="/upload/events/" . $mevents['Attachments']?>" alt="eventsba" style="witdh:150px; height:150px;"></td></p>
                <p><strong>Start Date:</strong> <?= $mevents['Start_date']; ?></p>
                <p><strong>End Date:</strong> <?= $mevents['End_date']; ?></p>
                <form action="<?= base_url('feedback')?>" method="post">
                
                <input type="hidden" name="usersignsId" value="<?= session()->get('id')?>">
                <input type="hidden" name="eventid" value="<?= $mevents['EventID']?>">
                <textarea disabled name="feedback" id="" cols="30" rows="10" placeholder="Please Login Before you write a Feedback"></textarea>
                <a href="<?= base_url('signin')?>" class="button">Login</a>
                </form>
                <br>
                <a href="/news" class="btn btn-secondary">Back</a>
              
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
