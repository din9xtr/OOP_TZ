
var conn = new WebSocket('ws://localhost:8080');

conn.onopen = function (e) {
    console.log("Connection established!");
};

conn.onmessage = function (e) {
    var data = JSON.parse(e.data);

    if (data.recentMessages) {

        var chatBox = document.getElementById('chatBox');
        data.recentMessages.forEach(function (msg) {
            var messageElement = document.createElement('div');
            messageElement.classList.add('message');
            messageElement.innerHTML =
                '<strong>' + msg.login + ':</strong> ' +
                msg.message +
                '<span class="message-date">' + msg.date + '</span>';
            chatBox.appendChild(messageElement);
        });
        chatBox.scrollTop = chatBox.scrollHeight;
    } else if (data.error) {
        alert(data.error);
    } else {
        var chatBox = document.getElementById('chatBox');
        var messageElement = document.createElement('div');
        messageElement.classList.add('message');
        messageElement.innerHTML =
            '<strong>' + data.login + ':</strong> ' +
            data.message +
            '<span class="message-date">' + data.date + '</span>';

        chatBox.appendChild(messageElement);
        chatBox.scrollTop = chatBox.scrollHeight;
    }
};

document.getElementById('chatForm').addEventListener('submit', function (e) {
    e.preventDefault();
    var message = document.getElementById('messageInput').value;
    if (message.trim() !== '') {
        var userId = document.getElementById('user_id').value;
        conn.send(JSON.stringify({ userId: userId, message: message }));
        document.getElementById('messageInput').value = '';
    }
});