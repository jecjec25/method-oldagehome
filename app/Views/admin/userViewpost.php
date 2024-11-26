<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Event</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/picture.png">

    <!-- CSS Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="/css/userview.css" rel="stylesheet" type="text/css" />

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic,400italic,700italic|Niconne' rel='stylesheet' type='text/css'>

    <!-- jQuery -->
    <script src="js/jquery-1.8.3.min.js"></script>

    <!-- Modernizr -->
    <script src="js/modernizr.custom.js"></script>

    <!-- Move Top and Easing Scripts -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>

    <!-- Hide URL Bar on Load -->
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- Scroll Animation Script -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>

    <!-- Custom Styles -->
    <style>
        h2 {
            font-family: 'Lato', sans-serif;
            font-weight: 700;
            color: #A3C9D2;
            text-transform: uppercase;
            margin-bottom: 20px;
            border-bottom: 2px solid #f39c12;
            padding-bottom: 10px;
            text-align: center;
        }

        .leftBox {
            text-align: center;
        }

        .events {
            align-items: center;
        }

        section {
            width: 100%;
        }

           /* Basic Reset */
           * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Chat Button in Lower Right Corner */
        .chat-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #5c6bc0; /* Soft blue */
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .chat-btn:hover {
            background-color: #3f51b5; /* Darker blue on hover */
            transform: scale(1.05);
        }

        /* Chat Modal Styles */
        .chat-modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1000;
            right: 20px;
            bottom: 80px;
            width: 400px;
            max-width: 100%;
            height: 500px;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            transform: translateY(10px);
            transition: transform 0.3s ease-out;
        }

        .chat-modal.show {
            transform: translateY(0);
        }

        /* Header */
        .chat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .chat-header h2 {
            font-size: 20px;
            color: #333;
            margin: 0;
        }

        /* Close Button */
        .close-chat-btn {
            font-size: 28px;
            color: #999;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .close-chat-btn:hover {
            color: #ff4081; /* Soft pink */
        }

        /* Messages Display Area */
        .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .chat-message {
            margin-bottom: 12px;
            padding: 12px;
            border-radius: 10px;
            background-color: #e3e3e3;
            max-width: 80%;
            word-wrap: break-word;
            font-size: 14px;
        }

        .chat-message.bot {
            background-color: #e0e0e0;
            align-self: flex-start;
        }

        .chat-message.user {
            background-color: #5c6bc0;
            color: white;
            align-self: flex-end;
        }

        /* Chat Option Buttons */
        .chat-option {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .chat-option:hover {
            background-color: #0056b3;
        }

        /* Input and Send Button */
        .chat-input-container {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .chat-input {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .send-btn {
            background-color: #5c6bc0;
            color: white;
            padding: 10px 15px;
            margin-left: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .send-btn:hover {
            background-color: #3f51b5;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .chat-modal {
                width: 90%;
                height: 450px;
            }

            .chat-btn {
                padding: 12px 25px;
            }

            .chat-option {
                padding: 8px 15px;
            }

            .chat-input {
                width: 70%;
            }

            .send-btn {
                padding: 8px 12px;
            }
        }
    </style>
</head>

<body>
    <div>
        <?php include_once('includes/user/sidebar.php');?>
        <br>
        <br>
        <section class="flashing-background">
            <div class="events">
                <div class="leftBox">
                    <div class="content">
                        <h1>Events</h1>
                        <p>Aruga Kapatid Foundation Incorporated thrives as a compassionate center in the heart of the community.</p>
                    </div>
                </div>

                <?php
                $noMainEvents = true;
                $noUserEvents = true;
                if (empty($eventadmin) && empty($eventuser)) : ?>
                    <p>No upcoming events.</p>
                <?php else : ?>
                    <ul>
                        <!-- Main Event -->
                        <?php if (!empty($eventadmin)) : ?>
                            <h2>Main Event</h2>
                            <ul>
                                <?php foreach ($eventadmin as $mevents) : ?>
                                    <?php if ($mevents['End_date'] >= $currentDate) : ?>
                                        <?php $noMainEvents = false; ?>
                                        <li>
                                            <div class="time">
                                                <h2><?= date('d', strtotime($mevents['Start_date'])) ?> <br><span><?= date('F', strtotime($mevents['Start_date'])) ?></span></h2>
                                            </div>
                                            <div class="details">
                                                <h3><?= $mevents['Title'] ?><br></h3>
                                                <a href="<?= base_url('eventForUsers/' . $mevents['EventID']) ?>">View Event</a>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if ($noMainEvents) : ?>
                                    <li><h2>We have No Main Events</h2></li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>

                        <!-- User Event -->
                        <?php if (!empty($eventuser)) : ?>
                            <h2>User Event</h2>
                            <?php foreach ($eventuser as $mevents) : ?>
                                <?php if ($mevents['End_date'] >= $currentDate) : ?>
                                    <?php $noUserEvents = false; ?>
                                    <li>
                                        <div class="time">
                                            <h2><?= date('d', strtotime($mevents['Start_date'])) ?> <br><span><?= date('F', strtotime($mevents['Start_date'])) ?></span></h2>
                                        </div>
                                        <div class="details">
                                            <h3><?= $mevents['Title'] ?><br></h3>
                                            <a href="<?= base_url('eventForUsers/' . $mevents['EventID']) ?>">View Event</a>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php if ($noUserEvents) : ?>
                                <li><h2>We have No User Events</h2></li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </section>
        <br>
            <!-- Chatbot Button -->
    <button id="showChatBoxBtn" class="chat-btn">Chat</button>

<!-- Chatbot Modal -->
<div id="chatModal" class="chat-modal">
    <div class="chat-header">
        <h2>HapagArugaBot</h2>
        <span id="closeChatBtn" class="close-chat-btn">&times;</span>
    </div>
    <div id="chatMessages" class="chat-messages"></div>
    <div id="chatOptionContainer" class="chat-options"></div> <!-- Container for buttons -->
    <!-- Input and Send Button -->
    <div class="chat-input-container">
        <input id="chatInput" type="text" class="chat-input" placeholder="Type a message..." />
        <button id="sendMessageBtn" class="send-btn">Send</button>
    </div>
</div>
<script>
        const showChatBoxBtn = document.getElementById("showChatBoxBtn");
        const closeChatBtn = document.getElementById("closeChatBtn");
        const chatModal = document.getElementById("chatModal");
        const chatMessages = document.getElementById("chatMessages");
        const sendMessageBtn = document.getElementById("sendMessageBtn");
        const chatInput = document.getElementById("chatInput");
        const chatOptionContainer = document.getElementById("chatOptionContainer");

        // Show chat box when clicked
        showChatBoxBtn.addEventListener("click", () => {
            chatModal.style.display = "flex";
            chatModal.classList.add("show");
        });

        // Close chat box
        closeChatBtn.addEventListener("click", () => {
            chatModal.classList.remove("show");
            setTimeout(() => {
                chatModal.style.display = "none";
            }, 300);
        });

        // Add predefined buttons to the chat
        function addButtons(options) {
            chatOptionContainer.innerHTML = '';
            options.forEach(option => {
                const button = document.createElement("button");
                button.classList.add("chat-option");
                button.textContent = option.text;
                button.onclick = () => sendMessage(option.response);
                chatOptionContainer.appendChild(button);
            });
        }

        // Send message function
        function sendMessage(message) {
            // Append user message
            chatMessages.innerHTML += `<div class="chat-message user">${message}</div>`;
            chatInput.value = ""; // Clear the input field

            // Simulate chatbot response
            $.post('/chatbot/getResponse', { message: message }, function (data) {
                const botResponse = data.response || "Sorry, I didn't understand that.";
                chatMessages.innerHTML += `<div class="chat-message bot">${botResponse}</div>`;
                chatMessages.scrollTop = chatMessages.scrollHeight; // Scroll to bottom

                // Add buttons based on response
                const options = data.options || []; // Assuming the response contains button options
                if (options.length > 0) {
                    addButtons(options);
                }
            });
        }

        // Send message when button is clicked
        sendMessageBtn.addEventListener("click", () => {
            const message = chatInput.value.trim();
            if (message) {
                sendMessage(message);
            }
        });

        // Send message when Enter key is pressed
        chatInput.addEventListener("keypress", (event) => {
            if (event.key === "Enter") {
                const message = chatInput.value.trim();
                if (message) {
                    sendMessage(message);
                }
            }
        });
        $(document).ready(function () {
    // Example: Assume we have this PHP array (encoded as JSON) passed to JavaScript
    const options = <?php echo json_encode(array_column($chat, 'Questions')); ?>;

    // Flatten the array to get all questions
    const allOptions = options.flat();

    // Limit the options to the first two questions
    const limitedOptions = allOptions.slice(0, 6); // Take only the first two options

    // Append buttons to the button container
    limitedOptions.forEach(option => {
        chatOptionContainer.innerHTML += `<button class="chat-option">${option}</button>`;
    });

    // Handle button click events
    $('.chat-option').click(function () {
        const message = $(this).text().trim();

        // Append user message to the chat
        $('#chatMessages').append('<div class="chat-message user">' + message + '</div>');

        // Simulate sending the message to the chatbot via AJAX (replace URL with actual API endpoint)
        $.post('/chatbot/getResponse', { message: message }, function (data) {
            const botResponse = data.response || "Sorry, I didn't understand that.";
            $('#chatMessages').append('<div class="chat-message bot">' + botResponse + '</div>');

            // Scroll to the bottom to show the latest messages
            $('#chatMessages').scrollTop($('#chatMessages')[0].scrollHeight);
        });

        // Automatically scroll to the bottom of the messages
        $('#chatMessages').scrollTop($('#chatMessages')[0].scrollHeight);
    });
});
    </script>

        <?php include_once('includes/footer.php'); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $().UItoTop({ easingType: 'easeOutQuart' });
            });
        </script>
        <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    </div>
</body>
</html>
