<?php

$pageTitle = "Create Note";
$header = "Create Note Form";

require "./Database.php";

$config = require "./config.php";

$db = new Database($config);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = [];
    $body = htmlspecialchars(trim($_POST['body'])) ?? '';

    // Validate input
    if (empty($body)) {
        $error['body'] = "body cannot be empty.";
    } else {
        // Insert note into the database
        $currentUserId = 1; // This should be replaced with actual user ID from session or auth system
        $db->query("INSERT INTO notes (user_id, body) VALUES (:user_id, :body)", [
            'user_id' => $currentUserId,
            'body' => $body
        ]);
        
        // header("Location: /notes");
        // exit;
    }
}

// $result = $db->query("SELECT * FROM notes where user_id = :user_id", ["user_id" => $currentUserId])->get();

require "views/notes/create.view.php";