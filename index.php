<?php

require "./functions.php";
require "./routes.php";
require "./Database.php";

$config = require "./config.php";

$db = new Database($config);
$result = $db->query("SELECT * FROM notes")->fetchAll();

echo $result[0]["body"];


