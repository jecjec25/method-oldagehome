<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link href="/css/eventslogin.css" rel='stylesheet' type='text/css' />
</head>
<body>

<div class="container">
    <ul>
        <?php foreach ($events as $mevents): ?>
            <li>
                <h2>Events</h2>
                <h3><?= $mevents['Title']; ?></h3>
                <p><?= $mevents['Description']; ?></p>
                <p><strong>Organizer:</strong> <?= $mevents['Organizer']; ?></p>
                <p><strong>Category:</strong> <?= $mevents['Category']; ?></p>
                <p><strong>Attendees:</strong> <?= $mevents['Atendees']; ?></p>
                <p><strong>Attachments:</strong> <img src="<?="/upload/events/" . $mevents['Attachments']?>" alt="eventsba" style="witdh:150px; height:150px;"></td></p>
                <p><strong>Start Date:</strong> <?= $mevents['Start_date']; ?></p>
                <p><strong>End Date:</strong> <?= $mevents['End_date']; ?></p>
                <form action="<?= base_url('feedback')?>" method="post">
                
                <input type="hidden" name="usersignsId" value="<?= session()->get('userID')?>">
                <input type="hidden" name="eventid" value="<?= $mevents['EventID']?>">
                <textarea name="feedback" id="" cols="30" rows="10" placeholder="Feedback"></textarea>
                <button type="submit">Send</button>
                </form>
                <br>
                <a href="/userViewpost" class="btn btn-secondary">Back</a>
              
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
