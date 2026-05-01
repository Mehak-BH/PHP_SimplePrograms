<?php
session_start();
if (!isset($_SESSION['chats'])) {
    $_SESSION['chats'] = [];
}
if (isset($_POST['send'])) {
    $message = trim($_POST['message']);
    if (!empty($message)) {
        $_SESSION['chats'][] = $message;
    }
}
if (isset($_POST['clear'])) {
    $_SESSION['chats'] = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbox</title>
    <style>
        .chatbox {
            width: 300px;
            height: 400px;
            border: 1px solid #ccc;
            padding: 10px;
            overflow-y: scroll;
background-color: #777BB3;

        }
        .message {
            margin-bottom: 10px;
            padding: 5px;
            background-color: #FFC0CB;
            border-radius: 5px;
        }
        .input-area {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Chatbox</h1>
    <div class="chatbox">
        <?php
        foreach ($_SESSION['chats'] as $chat) {
            echo "<div class='message'>" . htmlspecialchars($chat) . "</div>";
        }
        ?>
    </div>
    <form method="post" class="input-area">
        <input type="text" name="message" placeholder="Type your message here..." required>
        <button type="submit" name="send">Send</button>
        <button type="submit" name="clear">Clear</button>
    </form>
</body>
</html>