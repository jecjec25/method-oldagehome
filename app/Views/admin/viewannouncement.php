<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
    <link rel="icon" type="image/png" href="/LogoHapagAruga.png/">
    <link href="/css/viewannounce.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2, h3 {
            color: #2c3e50;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        p {
            margin: 10px 0;
            color: #34495e;
        }

        .attachment-thumbnail {
            display: block;
            margin: 10px auto;
            max-width: 100%;
            border-radius: 8px;
            cursor: pointer;
        }

        .details {
            border-top: 1px solid #ddd;
            padding-top: 15px;
            margin-top: 15px;
        }

        .details p {
            margin: 5px 0;
        }

        .btn {
            display: inline-block;
            background: #3498db;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 14px;
            margin: 10px 0;
            cursor: pointer;
            border: none;
        }

        .btn:hover {
            background: #2980b9;
        }

        .feedback {
            margin-top: 20px;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: none;
            font-size: 14px;
        }

        .alert {
            padding: 10px;
            background-color: #dff0d8;
            color: #3c763d;
            border-radius: 5px;
            margin-top: 10px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            margin: auto;
            max-width: 80%;
            max-height: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content img {
            width: auto;
            height: auto;
            max-width: 50%;
            max-height: 50%;
            border-radius: 10px;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 30px;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <?php foreach ($announce as $pannounce): ?>
        <h2>Official Announcement</h2>
        <h3><?= $pannounce['Title']; ?></h3>
        <p>
            <img src="<?="/upload/announcement/" . $pannounce['Attachments']?>" 
                 alt="announcement image" 
                 class="attachment-thumbnail" 
                 onclick="openModal(this)">
        </p>
        <div class="details">
            <p><strong>Content:</strong> <?= $pannounce['Content']; ?></p>
            <p><strong>Author:</strong> <?= $pannounce['Author']; ?></p>
            <p><strong>Category:</strong> <?= $pannounce['Category']; ?></p>
            <p><strong>Priority:</strong> <?= $pannounce['Priority']; ?></p>
            <p><strong>Start Date:</strong> <?= $pannounce['Start_date']; ?></p>
            <p><strong>End Date:</strong> <?= $pannounce['End_date']; ?></p>
        </div>

        <div class="feedback">
            <form action="<?= base_url('feedbackannounce')?>" method="post">
                <input type="hidden" name="AnnounceID" value="<?= $pannounce['AnnounceID']?>">
                <textarea name="feedback" placeholder="Write your feedback here..." required></textarea>
                <button class="btn" type="submit" onclick="return confirm('Are you sure you want to submit this form?')">Send Feedback</button>
                <?php if (session()->getFlashdata('feedback_message')): ?>
                    <div class="alert"><?= session()->getFlashdata('feedback_message') ?></div>
                <?php endif; ?>
            </form>
        </div>

        <div class="past-feedback">
            <h3>Feedbacks:</h3>
            <?php foreach ($feedback as $feed): ?>
                <p>- <?= $feed['feedback']; ?></p>
            <?php endforeach; ?>
        </div>

        <a href="/announcement" class="btn">Back</a>
    <?php endforeach; ?>
</div>

<!-- Modal -->
<div id="attachmentModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <div class="modal-content">
        <img id="modalImage" src="" alt="Attachment">
    </div>
</div>

<script>
    function openModal(imgElement) {
        const modal = document.getElementById("attachmentModal");
        const modalImg = document.getElementById("modalImage");
        modal.style.display = "flex";
        modalImg.src = imgElement.src;
    }

    function closeModal() {
        const modal = document.getElementById("attachmentModal");
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        const modal = document.getElementById("attachmentModal");
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>
