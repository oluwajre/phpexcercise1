<?php

$config = require "./config.php";
$db = new Database($config);

$error = [];
    $id = htmlspecialchars(trim($_POST['id'])) ?? '';

// Validate input
if (empty($id)) {
    $error['id'] = "ID cannot be empty.";
} else {
    // Delete note from the database
    $currentUserId = 1; // This should be replaced with actual user ID from session or auth system
    $db->query("DELETE FROM notes WHERE id = :id AND user_id = :user_id", [
        'id' => $id,
        'user_id' => $currentUserId
    ]);
    
    header("location: /notes");
    exit;
};