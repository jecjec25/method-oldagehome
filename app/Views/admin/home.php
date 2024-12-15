<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <link href="./css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="/picture.png">
    
    <script src="./js/jquery-1.8.3.min.js"></script>
    <script src="./js/modernizr.custom.js"></script>
    <script src="./js/move-top.js"></script>
    <script src="./js/easing.js"></script>
</head>

<style>
/* Include your optimized and cleaned CSS styles here */
</style>

<body>
    <!-- Header -->
    <?php include_once('includes/header.php'); ?>
    <br><br>

    <div class="containered">
        <!-- Slider Section -->
        <div class="letest-sections">
            <div class="containers">
                <div class="Event">
                    <div class="wmuSlider example1">
                        <?php foreach($home as $item): ?>
                            <article>
                                <div class="client-sections">
                                    <div class="event-sections">
                                        <div class="client-img">
                                            <img class="slider" src="aslider/<?= htmlspecialchars($item['image']) ?>" alt="Slider Image" />
                                            <div class="text"><?= htmlspecialchars($item['description']) ?></div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?> 
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Section -->
        <div class="letest-section">
            <div class="container">
                <div class="Events">
                    <div class="wmuSlider example1">
                        <div class="container">
                            <h3>Gallery</h3>
                            <?php foreach(array_chunk($gallery, 6) as $chunk): ?>
                                <article>
                                    <div class="client-sections">
                                        <div class="event-section">
                                            <?php foreach($chunk as $image): ?>
                                                <div class="col-md-4">
                                                    <div class="client-img">
                                                        <img class="arugaGallery" src="aruga_gallery/<?= htmlspecialchars($image['image']) ?>" alt="Gallery Image" />
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chatbot -->
    <button id="showChatBoxBtn" class="chat-btn" aria-label="Open Chat">Chat</button>

    <div id="chatModal" class="chat-modal">
        <div class="chat-header">
            <h2>HapagArugaBot</h2>
            <button id="closeChatBtn" class="close-chat-btn" aria-label="Close Chat">&times;</button>
        </div>
        <div id="chatMessages" class="chat-messages"></div>
        <div id="chatOptionContainer" class="chat-options"></div>
        <div class="chat-input-container">
            <input id="chatInput" type="text" class="chat-input" placeholder="Type a message..." aria-label="Type a message" />
            <button id="sendMessageBtn" class="send-btn" aria-label="Send Message">Send</button>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            const chatModal = $('#chatModal');
            const chatMessages = $('#chatMessages');
            const chatInput = $('#chatInput');
            const chatOptionContainer = $('#chatOptionContainer');

            // Show Chat
            $('#showChatBoxBtn').click(() => {
                chatModal.fadeIn().addClass('show');
            });

            // Close Chat
            $('#closeChatBtn').click(() => {
                chatModal.fadeOut(() => chatModal.removeClass('show'));
            });

            // Send Message
            $('#sendMessageBtn').click(() => sendMessage(chatInput.val().trim()));
            chatInput.on('keypress', e => { if (e.key === "Enter") sendMessage(chatInput.val().trim()); });

            function sendMessage(message) {
                if (!message) return;
                chatMessages.append(`<div class="chat-message user">${message}</div>`);
                chatInput.val(''); // Clear input
                
                $.post('/chatbot/getResponse', { message }, function (data) {
                    const botResponse = data.response || "Sorry, I didn't understand that.";
                    chatMessages.append(`<div class="chat-message bot">${botResponse}</div>`);
                    chatMessages.scrollTop(chatMessages[0].scrollHeight);

                    // Add options
                    if (data.options) updateOptions(data.options);
                });
            }

            function updateOptions(options) {
                chatOptionContainer.empty();
                options.forEach(option => {
                    const button = $(`<button class="chat-option">${option.text}</button>`);
                    button.click(() => sendMessage(option.response));
                    chatOptionContainer.append(button);
                });
            }
        });
    </script>

    <script src="./js/jquery.wmuSlider.js"></script>
    <script>$('.example1').wmuSlider();</script>

    <?php include_once('includes/footer.php'); ?>
</body>
</html>
