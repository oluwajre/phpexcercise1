<?php

// echo "Edit Note Page";

$pageTitle = "Edit Note";
$header = "Edit Note Form";

$config = require "./config.php";
$db = new Database($config);
$error = [];

$currentUserId = '1';

$note = $db->query("SELECT * FROM notes WHERE id = :id and user_id = :user_id", [
    'id' => htmlspecialchars(trim($_GET['id'])) ?? null,
    'user_id' => $currentUserId,
])->findOrFail();

require "views/notes/edit.view.php";