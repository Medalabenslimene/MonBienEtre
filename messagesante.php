<?php
// messages.php

// Simulons une liste de messages
$messagesFile = 'messages.json';

function getMessages() {
    global $messagesFile;
    $messagesData = file_get_contents($messagesFile);
    return json_decode($messagesData, true);
}

function addMessage($message) {
    $messages = getMessages();
    $messages[] = $message;
    file_put_contents($messagesFile, json_encode($messages));
}

// Exemple d'utilisation :
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Content-Type: application/json');
    echo json_encode(getMessages());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    addMessage($data['message']);
    header('Content-Type: application/json');
    echo json_encode(getMessages());
}
?>