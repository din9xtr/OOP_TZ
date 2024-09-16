<?php require __DIR__ . '/../header_auth.php' ?>
<link rel="stylesheet" href="/public/css/chat.css">

<head>
    <title>Chat</title>
</head>
<?php //var_dump($user_id) ?>
<input type="hidden" name="user_id" id="user_id" value="<?= $user_id ?>">

<body>

    <div id="chatBox" class="chat-box">

    </div>

    <div id="messageForm">
        <form id="chatForm">
            <input type="text" id="messageInput" placeholder="Type a message" required />
            <button type="submit">Send</button>
        </form>
    </div>


    <script src="/public/js/chat/chat.js"> </script>




</body>

</html>