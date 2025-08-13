<?php

$pageTitle = "Notes Page";
$header = "My Notes";

// require "./Database.php";

$config = require "./config.php";
$db = new Database($config);

$currentUserId = 1;

$result = $db->query("SELECT * FROM notes where user_id = :user_id", ["user_id" => $currentUserId])->get();

require "views/notes/index.view.php";