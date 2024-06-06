<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Announcement</title>
    <link href="/css/viewannounce.css" rel='stylesheet' type='text/css' />
</head>
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

</style>
<body>

<div class="container">

    <ul>
        <?php foreach ($announce as $pannounce): ?>
            <li>
                <h2>Announcement</h2>
                <h3><?= $pannounce['Title']; ?></h3>
                <p><img src="<?="/upload/announcement/" . $pannounce['Attachments']?>" alt="announcementba" style="witdh:150px; height:150px;"></p>
                <p><strong>Title:</strong> <?= $pannounce['Title']; ?></p>
                <p><strong>Content:</strong> <?= $pannounce['Content']; ?></p>
                <p><strong>Author:</strong> <?= $pannounce['Author']; ?></p>
                <p><strong>Category:</strong> <?= $pannounce['Category']; ?></p>
                <p><strong>Priority:</strong> <?= $pannounce['Priority']; ?></p>
                <p><strong>Start Date:</strong> <?= $pannounce['Start_date']; ?></p>
                <p><strong>End Date:</strong> <?= $pannounce['End_date']; ?></p>
                <form action="<?= base_url('feedbackannounce')?>" method="post">
                <input type="hidden" name="AnnounceID" value="<?= $pannounce['AnnounceID']?>">
                <textarea name="feedback" id="" cols="30" rows="10" placeholder="Feedback"></textarea>
                
                <button type="submit" onclick="return confirm('Are you sure you want to submit this form?')">Send</button>
                <?php if(session()->getFlashdata('feedback_message')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('feedback_message') ?>
                </div>
                <?php endif; ?>
                </form>
                <br>
            
                <p>Feedback(Unknown):</p>
                <?php foreach($feedback as $feed):?>
                <ul>
                    <li>
                        <?= $feed['feedback']?>
                    </li>
                </ul>
        <?php endforeach;?>
        <a href="/announcement" class="btn btn-secondary">Back</a>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
