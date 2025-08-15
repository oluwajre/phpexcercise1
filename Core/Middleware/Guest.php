<?php

class Guest {
    public static function handle() {
    if (isset($_SESSION['user'])) {
        header('Location: /');
        exit();
    }
}

}
