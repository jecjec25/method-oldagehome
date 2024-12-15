<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News & Events</title>
    <link rel="icon" type="image/png" href="/LogoHapagAruga.png">
    <link href="/css/eventslogin.css" rel="stylesheet" type="text/css" />
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 10px;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        header h1 {
            font-size: 2rem;
            color: #007bff;
        }

        /* Card Layout */
        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }

        .card h2 {
            font-size: 1.8rem;
            color: #007bff;
            margin-bottom: 10px;
        }

        .card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card p {
            margin: 10px 0;
            line-height: 1.6;
        }

        .card img {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }

        /* Buttons */
        .btn, .btn-secondary {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            color: white;
            margin-top: 10px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn {
            background: #007bff;
        }

        .btn-secondary {
            background: #6c757d;
        }

        .btn:hover {
            background: #0056b3;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .modal-content img {
            width: 100%;
            max-width: 500px;
            height: auto;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 50%;
            cursor: pointer;
        }

        .close-btn:hover {
            background: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header h1 {
                font-size: 1.5rem;
            }

            .card h2, .card h3 {
                font-size: 1.2rem;
            }

            .btn, .btn-secondary {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Header -->
    <header>
        <h1>News & Events Portal</h1>
        <p>Stay updated with the latest news and events</p>
    </header>

    <!-- Display News -->
    <section id="news-section">
        <?php foreach ($news as $mnews): ?>
        <h2>Latest News</h2>
        <div class="card">
            <h3><?= $mnews['title']; ?></h3>
            <p><strong>Author:</strong> <?= $mnews['author']; ?></p>
            <p><?= $mnews['Content']; ?></p>
            <p><strong>Published On:</strong> <?= $mnews['date_published']; ?></p>
            <p><strong>Category:</strong> <?= $mnews['Category']; ?></p>
            <?php if (!empty($mnews['picture'])): ?>
            <img src="<?= "/upload/news/" . $mnews['picture'] ?>" alt="News Image" onclick="openModal(this.src)">
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </section>

    <!-- Display Events -->
    <section id="events-section">
        <?php foreach ($events as $mevents): ?>
        <h2>Events</h2>
        <div class="card">
            <h3><?= $mevents['Title']; ?></h3>
            <p><strong>Description:</strong> <?= $mevents['Description']; ?></p>
            <p><strong>Organizer:</strong> <?= $mevents['Organizer']; ?></p>
            <p><strong>Category:</strong> <?= $mevents['Category']; ?></p>
            <p><strong>Attendees:</strong> <?= $mevents['Atendees']; ?></p>
            <p><strong>Attachments:</strong></p>
            <?php if (!empty($mevents['Attachments'])): ?>
            <div>
                <?php foreach ($mevents['Attachments'] as $attachment): ?>
                <?php $imagePath = base_url("/upload/events/") . trim($attachment); ?>
                <img src="<?= $imagePath ?>" alt="Attachment Image" onclick="openModal(this.src)">
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <p>No attachments available</p>
            <?php endif; ?>
            <p><strong>Start Date:</strong> <?= $mevents['Start_date']; ?></p>
            <p><strong>End Date:</strong> <?= $mevents['End_date']; ?></p>
        </div>
        <?php endforeach; ?>
    </section>

    <!-- Display Feedback -->
    <section id="feedback-section">
    <?php foreach ($events as $mevents): ?>
    <h2>Feedback</h2>
    <ul>
        <?php foreach ($feedback as $feed): ?>
        <li>
            <strong><?= $feed['Username']; ?>:</strong> <?= $feed['feedback']; ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <p>Please <a href="/signin">sign in</a> before sending your feedback.</p>
    <?php endforeach; ?>
</section>
</div>

<!-- Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
        <button class="close-btn" onclick="closeModal()">×</button>
        <img id="modal-img" src="" alt="Full View">
    </div>
</div>

<script>
    // Function to open the modal with the image
    function openModal(src) {
        document.getElementById('modal').style.display = 'block';
        document.getElementById('modal-img').src = src;
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }

    // Close the modal if clicked outside of the image
    window.onclick = function(event) {
        if (event.target === document.getElementById('modal')) {
            closeModal();
        }
    }
</script>

</body>
</html>
