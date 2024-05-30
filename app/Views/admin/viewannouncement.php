<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/viewannounce.css" rel='stylesheet' type='text/css' />
    <title>View Announcement</title>

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
