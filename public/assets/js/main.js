document.addEventListener("DOMContentLoaded", function() {
    // DOM elements
    var sendBtn = document.getElementById("sendBtn");
    var textbox = document.getElementById("textbox");
    var chatContainer = document.getElementById("chatContainer");
    var httpRequest = new XMLHttpRequest();

    // Initial chatbot message after delay
    setTimeout(function() {
        chatbotSendMessage("Hi! I'm Chatbot. Your employer is currently offline.");
    }, 1000);

    // Function to send a message from Chatbot with delay
    function chatbotSendMessage(messageText) {
        var messageElement = createMessageElement("Chatbot", messageText, "chatbot-message");
        setTimeout(function() {
            appendMessageWithDelay(messageElement);
        }, 1000); // Delay before chatbot responds
    }

    // Function to send a user message
    function sendMessage(messageText) {
        var messageElement = createMessageElement("You", messageText, "user-message");
        appendMessageWithDelay(messageElement);
        makeRequest(messageText);
    }

    // Helper function to create message element
    function createMessageElement(sender, messageText, styleClass) {
        var messageElement = document.createElement('div');
        messageElement.classList.add('chat-message', styleClass);
        var formattedTime = new Date().toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
        messageElement.innerHTML = `
            <div>
                <span class="message-sender">${sender}</span>
                <span class="message-text">${messageText}</span>
                <span class="message-time">${formattedTime}</span>
            </div>
        `;
        return messageElement;
    }

    // Function to append message with delay and animate
    function appendMessageWithDelay(messageElement) {
        messageElement.style.opacity = 0;
        chatContainer.appendChild(messageElement);
        setTimeout(function() {
            messageElement.style.opacity = 1;
            scrollToBottom();
        }, 200); // Delay before showing message with animation
    }

    // Function to handle server response
    function server_response() {
        if (httpRequest.readyState == XMLHttpRequest.DONE && httpRequest.status == 200) {
            var result = JSON.parse(httpRequest.responseText);
            var messageText = result.response_message;
            var messageElement = createMessageElement("Chatbot", messageText, "chatbot-message");
            setTimeout(function() {
                appendMessageWithDelay(messageElement);
            }, 1000); // Delay before chatbot responds
        }
    }

    // Function to make HTTP request
    function makeRequest(messageText) {
        httpRequest.open('GET', 'JobseekerController/get_response?message=' + encodeURIComponent(messageText), true);
        httpRequest.onreadystatechange = server_response;
        httpRequest.send();
    }

    // Event listener for send button
    sendBtn.addEventListener("click", function(e) {
        var messageText = textbox.value.trim();
        if (messageText !== "") {
            sendMessage(messageText);
            textbox.value = "";
        }
    });

    // Event listener for Enter key press in textbox
    textbox.addEventListener("keypress", function(e) {
        if (e.key === "Enter") {
            e.preventDefault();
            var messageText = textbox.value.trim();
            if (messageText !== "") {
                sendMessage(messageText);
                textbox.value = "";
            }
        }
    });

    // Function to scroll chat container to bottom
    function scrollToBottom() {
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }
});
