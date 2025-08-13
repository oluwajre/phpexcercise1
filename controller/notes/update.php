<?php

$config = require "./config.php";
$db = new Database($config);

$currentUserId = '1';

$note = $db->query("SELECT * FROM notes WHERE id = :id and user_id = :user_id", [
    'id' => htmlspecialchars(trim($_POST['id'])) ?? null,
    'user_id' => $currentUserId,
])->findOrFail();

$error = [];
$body = htmlspecialchars(trim($_POST['body'])) ?? '';

// Validate input
if (empty($body)) {
    $error['body'] = "Note cannot be empty.";
    require "controller/notes/edit.php";
    exit;
} else {
    // Update note in the database
    $db->query("UPDATE notes SET body = :body WHERE id = :id AND user_id = :user_id", [
        'body' => $body,
        'id' => $note['id'],
        'user_id' => $currentUserId
    ]);

    header("location: /notes");
    exit;
}

