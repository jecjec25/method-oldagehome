<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Announcement</title>   
    <link rel="icon" type="image/png" href="/picture.png">
    <link href="/css/viewannounce.css" rel='stylesheet' type='text/css' />
</head>
<body>

<div class="container">
    <ul>
        <?php foreach ($announce as $pannounce): ?>
            <li>
                <h2>Announcement</h2>
                <h3><?= $pannounce['Title']; ?></h3>
                <p><img src="<?="/upload/announcement/" . $pannounce['Attachments']?>" alt="announcement image"></p>
                <p><strong>Content:</strong> <?= $pannounce['Content']; ?></p>
                <p><strong>Author:</strong> <?= $pannounce['Author']; ?></p>
                <p><strong>Category:</strong> <?= $pannounce['Category']; ?></p>
                <p><strong>Priority:</strong> <?= $pannounce['Priority']; ?></p>
                <p><strong>Start Date:</strong> <?= $pannounce['Start_date']; ?></p>
                <p><strong>End Date:</strong> <?= $pannounce['End_date']; ?></p>
                <form action="<?= base_url('feedbackannounce')?>" method="post">
                    <input type="hidden" name="AnnounceID" value="<?= $pannounce['AnnounceID']?>">
                    <textarea name="feedback" cols="50" rows="5" placeholder="Feedback"></textarea>
                    <button class="btn" type="submit" onclick="return confirm('Are you sure you want to submit this form?')">Send</button>
                    <?php if(session()->getFlashdata('feedback_message')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('feedback_message') ?>
                    </div>
                    <?php endif; ?>
                </form>
                <p>Feedback(Unknown):</p>
                <?php foreach($feedback as $feed): ?>
                    <ul>
                        <li><?= $feed['feedback']?></li>
                    </ul>
                <?php endforeach; ?>
                <a href="/announcement" class="btn">Back</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
