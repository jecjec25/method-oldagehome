<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
        }
    </style>
</head>
<body>

<script>
    // Get modal elements
    const chatModal = document.getElementById("chatModal");
    const showChatBoxBtn = document.getElementById("showChatBoxBtn");
    const closeChatBtn = document.getElementById("closeChatBtn");
    const chatMessages = document.getElementById("chatMessages");
    const chatOptionContainer = document.getElementById("chatOptionContainer");

    // Show the chat box when the button is clicked
    showChatBoxBtn.addEventListener("click", () => {
        chatModal.style.display = "flex";
        chatModal.classList.add("show");
    });

    // Close the chat box when the close button is clicked
    closeChatBtn.addEventListener("click", () => {
        chatModal.classList.remove("show");
        setTimeout(() => {
            chatModal.style.display = "none";
        }, 300);  // Ensure the smooth closing transition
    });

    // Handle dynamic button options from PHP
    $(document).ready(function () {
        // Example: Assume we have this PHP array (encoded as JSON) passed to JavaScript
        const options = <?php echo json_encode(array_column($chat, 'Questions')); ?>;

        // Flatten the array to get all questions
        const allOptions = options.flat();

        // Append buttons to the button container
        allOptions.forEach(option => {
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

</body>
</html>
