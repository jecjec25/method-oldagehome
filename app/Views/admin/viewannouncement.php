<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Announcement</title>
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
            transition: background-color 0.3s ease; /* Smooth transition */
        }
        .btn:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }
    </style>
</head>
<body>

<div class="container">
    <ul>
        <?php foreach ($announce as $pannounce): ?>
            <li>
                <h2>Announcement</h2>
                <h3><?= $pannounce['Title']; ?></h3>
                <p><?= $pannounce['Attachments']; ?></p>
                <p><strong>Title</strong> <?= $pannounce['Title']; ?></p>
                <p><strong>Content:</strong> <?= $pannounce['Content']; ?></p>
                <p><strong>Author:</strong> <?= $pannounce['Author']; ?></p>
                <p><strong>Category:</strong> <?= $pannounce['Category']; ?></p>
                <p><strong>Priority:</strong> <?= $pannounce['Priority']; ?></p>
                <p><strong>Attachments:</strong> <img src="<?="/upload/announcement/" . $pannounce['Attachments']?>" alt="announcementba" style="witdh:150px; height:150px;"></td></p>
                <form action="<?= base_url('feedbackannounce')?>" method="post">
                <input type="hidden" name="AnnounceID" value="<?= $pannounce['AnnounceID']?>">
                <textarea name="feedback" id="" cols="30" rows="10" placeholder="Feedback"></textarea>
                <button type="submit">send</button>
                </form>
                <br>
                <a href="/announcement" class="btn btn-secondary">Back</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
