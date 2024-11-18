<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link rel="icon" type="image/png" href="/picture.png">
    <link href="/css/eventslogin.css" rel="stylesheet" type="text/css" />
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
            padding: 5px;
        }

        .event-attachment:hover + .image-preview {
            display: block;
        }

        /* Basic styling for the container */
        .container {
            width: 80%;
            margin: 0 auto;
        }

        /* Styling for event and feedback display */
        li {
            list-style-type: none;
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 8px;
            background: #f9f9f9;
        }

        .mean {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .dist {
            font-size: 1.1rem;
            margin-bottom: 15px;
        }

        .btn, .btn-secondary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<div class="container">
            <!-- Display News -->
            <?php foreach ($news as $mnews): ?>
            <li>
                <h2>News</h2>
                <h3 class="mean"><?= $mnews['title']; ?></h3>
                <h4 class="mean"><strong>Author:</strong> <?= $mnews['author']; ?></h4>
                <p class="dist"><strong>Content:</strong> <?= $mnews['Content']; ?></p>
                <p><strong>Date Published:</strong> <?= $mnews['date_published']; ?></p>
                <p><strong>Category:</strong> <?= $mnews['Category']; ?></p>
                <p><strong>Attachment:</strong><br><img class="sinc" src="<?="/upload/news/" . $mnews['picture'] ?>" alt="news image"></p>
                <a href="/news" class="btn">Back</a>
            </li>
        <?php endforeach; ?>

    <ul>
        <!-- Display Events -->
        <?php foreach ($events as $mevents): ?>
            <li>
                <h2>Event Details</h2>
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
                                <div class="image-preview">
                                    <img src="<?= $imagePath ?>" alt="event preview" style="width:300px; height:auto;">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No attachments available</p>
                    <?php endif; ?>
                </p>

                <p><strong>Start Date:</strong> <?= $mevents['Start_date']; ?></p>
                <p><strong>End Date:</strong> <?= $mevents['End_date']; ?></p>

                <!-- Feedback Form -->
                <form action="<?= base_url('feedback')?>" method="post">
                    <input type="hidden" name="usersignsId" value="<?= session()->get('userID')?>">
                    <input type="hidden" name="eventid" value="<?= $mevents['EventID']?>">
                    <textarea name="feedback" cols="60" rows="10" placeholder="Leave your feedback"></textarea>
                    <button class="btn" type="submit" onclick="return confirm('Are you sure you want to submit this form?')">Send</button>
                    <?php if(session()->getFlashdata('feedback_message')): ?>
                        <div class="alert">
                            <?= session()->getFlashdata('feedback_message') ?>
                        </div>
                    <?php endif; ?>
                </form>
                <br><br>
                <a href="/news" class="btn btn-secondary">Back</a>
            </li>
        <?php endforeach; ?>

        <!-- Display Feedbacks -->
        <?php foreach($feedback as $feed):?>
            <ul>
                <li>
                   <strong><?= $feed['Username']?>:</strong> <?= $feed['feedback']?>
                </li>
            </ul>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
