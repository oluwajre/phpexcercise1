<?php

$email = htmlspecialchars(trim($_POST["email"]));
$password = htmlspecialchars(trim($_POST["password"]));

$error = [];

$config = require "./config.php";
$db = new Database($config);

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $error['email'] = 'Invalid email format';
};

if (!empty($error) && strlen($password) < 6) {
    require "views/registration/create.view.php";
    exit();
}


$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

if ($user) {
    
    header("location: /");
} else {
    $db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header("location: /");
    exit();
}
