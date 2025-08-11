<?php

require "./Database.php";

$config = require "./config.php";

$db = new Database($config);

$id = $_GET['id'] ?? null;

$note = $db->query("SELECT * FROM notes where id = :id", ["id" => $id])->findOrFail();

authorize($note["user_id"] === 1, 403);

$pageTitle = "Note Details";
$header = $note['body'];

require "views/notes/show.view.php";