<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link rel="icon" type="image/png" href="/picture.png">
    <link href="/css/eventslogin.css" rel='stylesheet' type='text/css' />
    <style>
        .alert {
            padding: 20px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            border-radius: 4px;
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
            opacity: 1;
            transition: opacity 2s ease-in-out;
            width: 30rem;
        }
        .alert.fade-out {
            opacity: 0;
        }

        /* Resize the image */
        .event-attachment {
            width: 80px;
            height: 80px;
            margin-right: 5px;
            cursor: pointer;
        }

        /* Preview the image on hover */
        .image-preview {
            display: none;
            position: absolute;
            border: 1px solid #ccc;
            background: white;
            z-index: 1000;
        }

        .event-attachment:hover + .image-preview {
            display: block;
        }
    </style>
</head>
<body>

<div class="container">
    <ul>
        <?php foreach ($events as $mevents): ?>
            <li>
                <h2>Events</h2>
                <h3 class="mean"><?= $mevents['Title']; ?></h3>
                <p class="dist"><strong>Description:</strong> <?= $mevents['Description']; ?></p>
                <p><strong>Organizer:</strong> <?= $mevents['Organizer']; ?></p>
                <p><strong>Category:</strong> <?= $mevents['Category']; ?></p>
                <p><strong>Attendees:</strong> <?= $mevents['Atendees']; ?></p>
                <p><strong>Attachments:</strong>  
                    <?php if (!empty($mevents['Attachments'])): ?>
                        <?php foreach ($mevents['Attachments'] as $attachment): ?>
                            <?php
                                // Trim any unwanted spaces or characters from the attachment name
                                $imagePath = base_url("/upload/events/") . trim($attachment);
                            ?>
                            <div style="position:relative; display:inline-block;">
                                <img src="<?= $imagePath ?>" alt="event image" class="event-attachment">
                                <!-- Preview of the image -->
                                <img src="<?= $imagePath ?>" alt="event preview" class="image-preview" style="width:300px; height:auto;">
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No attachments available</p>
                    <?php endif; ?>
                </p>

                <p><strong>Start Date:</strong> <?= $mevents['Start_date']; ?></p>
                <p><strong>End Date:</strong> <?= $mevents['End_date']; ?></p>
                <form action="<?= base_url('feedback')?>" method="post">
                    <input type="hidden" name="usersignsId" value="<?= session()->get('userID')?>">
                    <input type="hidden" name="eventid" value="<?= $mevents['EventID']?>">
                    <textarea name="feedback" id="" cols="60" rows="10" placeholder="Feedback"></textarea>
                    <button class="btn" type="submit" onclick="return confirm('Are you sure you want to submit this form?')">Send</button>
                    <?php if(session()->getFlashdata('feedback_message')): ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('feedback_message') ?>
                        </div>
                    <?php endif; ?>
                </form>
                <br><br>
                <a href="/userViewpost" class="btn btn-secondary">Back</a>
            </li>
            <br>
        <?php endforeach; ?>
        
        <?php foreach($feedback as $feed):?>
            <ul>
                <li>
                   <?= $feed['Username']?>: <?= $feed['feedback']?>
                </li>
            </ul>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
