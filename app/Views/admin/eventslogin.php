<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News and Events</title>
    <style>
        /* Basic styling for demonstration purposes */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0; /* Light gray background */
        }
        .container {
            background-color: #fff; /* White background */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Soft shadow effect */
        }
        h2 {
            margin-top: 0; /* Remove default margin from heading */
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff; /* Blue color */
            color: #fff; /* White text color */
            text-decoration: none; /* Remove underline */
            border: none; /* Remove border */
            border-radius: 5px;
            transition: 0.3s ease; /* Smooth transition */
        }
        .btn:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }
    </style>
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
                <p><strong>Start Date:</strong> <?= $mevents['Start_date']; ?></p>
                <p><strong>End Date:</strong> <?= $mevents['End_date']; ?></p>
                <p><strong>Category:</strong> <?= $mevents['Category']; ?></p>
                <p><strong>Status:</strong> <?= $mevents['Status']; ?></p>
                <p><strong>Attendees:</strong> <?= $mevents['Atendees']; ?></p>
                <p><strong>Attachments:</strong> <?= $mevents['Attachments']; ?></p>
                <form action="<?= base_url('feedback')?>" method="post">
                
                <input type="hidden" name="usersignsId" value="<?= session()->get('userID')?>">
                <input type="hidden" name="eventid" value="<?= $mevents['EventID']?>">
                <textarea name="feedback" id="" cols="30" rows="10" placeholder="Feedback"></textarea>
                <button type="submit">send</button>
                </form>
                <br>
                <a href="/userViewpost" class="btn btn-secondary">Back</a>
              
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
