<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link rel="stylesheet" href="/css/eventslogin.css">
    <link rel="icon" type="image/png" href="/LogoHapagAruga.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
        }

        .event-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .event-card h2 {
            margin: 0;
            color: #333;
        }

        .event-card h3 {
            color: #555;
            margin-bottom: 10px;
        }

        .event-details p {
            margin: 8px 0;
            color: #666;
            line-height: 1.6;
        }

        .event-details strong {
            color: #333;
        }

        .attachments {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .attachments img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .attachments img:hover {
            transform: scale(1.1);
        }

        .feedback-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .btn {
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-secondary {
            background: #6c757d;
        }

        .btn:hover {
            background: #0056b3;
        }

        .feedback-comments {
            margin-top: 20px;
            padding: 10px;
            border-top: 1px solid #ddd;
        }

        .feedback-comments ul {
            list-style: none;
            padding: 0;
        }

        .feedback-comments li {
            margin: 10px 0;
            padding: 10px;
            background: #f5f5f5;
            border-radius: 5px;
        }

        /* Modal styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            display: block;
            margin: 50px auto;
            max-width: 90%;
            max-height: 90%;
            border-radius: 10px;
        }

        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: white;
            font-size: 40px;
            cursor: pointer;
        }

        .close:hover {
            color: #ccc;
        }
    </style>
</head>
<body>

<div class="container">
    <?php foreach ($events as $mevents): ?>
        <div class="event-card">
            <h2><?= $mevents['Title']; ?></h2>
            <h3><?= $mevents['Category']; ?></h3>
            <div class="event-details">
                <p><strong>Description:</strong> <?= $mevents['Description']; ?></p>
                <p><strong>Organizer:</strong> <?= $mevents['Organizer']; ?></p>
                <p><strong>Attendees:</strong> <?= $mevents['Atendees']; ?></p>
                <p><strong>Start Date:</strong> <?= $mevents['Start_date']; ?></p>
                <p><strong>End Date:</strong> <?= $mevents['End_date']; ?></p>
            </div>
            <div class="attachments">
                <?php if (!empty($mevents['Attachments'])): ?>
                    <?php foreach ($mevents['Attachments'] as $attachment): ?>
                        <?php $imagePath = base_url("/upload/events/") . trim($attachment); ?>
                        <img src="<?= $imagePath ?>" alt="event image" onclick="openModal('<?= $imagePath ?>')">
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No attachments available</p>
                <?php endif; ?>
            </div>

            <div class="feedback-form">
            <form action="<?= base_url('feedback') ?>" method="post" onsubmit="return validateForm()">
                <input type="hidden" name="usersignsId" value="<?= session()->get('userID') ?>">
                <input type="hidden" name="eventid" value="<?= $mevents['EventID'] ?>">
                <textarea name="feedback" id="feedback" rows="5" placeholder="Leave your feedback here..." required></textarea>
                <?php if (session()->getFlashdata('feedback_message')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('feedback_message') ?>
                    </div>
                <?php endif; ?>
                <button class="btn" type="submit">Send</button>
            </form>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="feedback-comments">
        <h3>Feedback</h3>
        <ul>
            <?php foreach ($feedback as $feed): ?>
                <li>
                    <strong><?= $feed['Username'] ?>:</strong> <?= $feed['feedback'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<!-- Modal -->
<div id="imageModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img id="modalContent" class="modal-content">
</div>

<script>
    // Open the modal
    function openModal(imageSrc) {
        const modal = document.getElementById("imageModal");
        const modalImg = document.getElementById("modalContent");
        modal.style.display = "block";
        modalImg.src = imageSrc;
    }

    // Close the modal
    function closeModal() {
        const modal = document.getElementById("imageModal");
        modal.style.display = "none";
    }
</script>

<script>
    function validateForm() {
        const feedback = document.getElementById('feedback').value.trim();
        if (!feedback) {
            alert('Feedback cannot be empty. Please provide your comments.');
            return false; // Prevent form submission
        }
        return true;
    }
</script>


</body>
</html>
