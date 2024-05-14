<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        #chatContainer {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            width: 300px;
            max-height: 500px;
            overflow-y: auto;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0,0,0,.1);
            border-radius: 0.25rem;
            padding: 15px;
            display: none;
        }
        .chat-message {
            max-width: 75%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 20px;
        }
        .chatbot-message {
            background-color: #e9ecef;
            margin-right: auto;
        }
        .user-message {
            background-color: #007bff;
            color: #fff;
            margin-left: auto;
            text-align: right;
        }
        .input-group {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <button id="openChatBtn" type="button" class="btn btn-primary">Open Chat</button>

    <div id="chatContainer">
        <div class="container py-3">
            <h5 class="text-center mb-4">PESO-Link Chatbot</h5>
            <div id="chatMessages"></div>
            <div class="input-group">
                <input id="textbox" type="text" class="form-control" placeholder="Type a message...">
                <button id="sendBtn" type="button" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <script src="assets/js/main.js"></script>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    var openChatBtn = document.getElementById("openChatBtn");
    var chatContainer = document.getElementById("chatContainer");
    var sendBtn = document.getElementById("sendBtn");
    var textbox = document.getElementById("textbox");
    var chatMessages = document.getElementById("chatMessages");

    openChatBtn.addEventListener("click", function() {
        chatContainer.style.display = "block";
        openChatBtn.style.display = "none";
    });

    sendBtn.addEventListener("click", function() {
        var messageText = textbox.value.trim();
        if (messageText !== "") {
            sendMessage(messageText);
            textbox.value = "";
            // Call the function to get the bot response
            getBotResponse(messageText);
        }
    });

    function sendMessage(messageText) {
        var messageElement = createMessageElement("You", messageText, "user-message");
        appendMessage(messageElement);
    }

    function getBotResponse(messageText) {
        // Make an AJAX request to your CodeIgniter controller
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    var botResponse = response.response_message;
                    var botMessageElement = createMessageElement("Bot", botResponse, "chatbot-message");
                    appendMessage(botMessageElement);
                } else {
                    console.error('Error:', xhr.statusText);
                }
            }
        };
        xhr.open("GET", "<?php echo base_url('JobseekerController/get_response'); ?>?message=" + encodeURIComponent(messageText), true);
        xhr.send();
    }

    function createMessageElement(sender, messageText, styleClass) {
        var messageElement = document.createElement('div');
        messageElement.classList.add('chat-message', styleClass);
        messageElement.innerHTML = `
            <div>
                <span class="message-sender">${sender}</span>
                <span class="message-text">${messageText}</span>
            </div>
        `;
        return messageElement;
    }

    function appendMessage(messageElement) {
        chatMessages.appendChild(messageElement);
        scrollToBottom();
    }

    function scrollToBottom() {
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
});
</script>

</body>
</html>