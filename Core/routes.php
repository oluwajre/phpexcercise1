<?php

$router->get('/', 'controller/index.php');
$router->get('/notes', 'controller/notes/index.php')->only('auth');
$router->delete('/notes/destroy', 'controller/notes/destroy.php');
$router->get('/note', 'controller/notes/show.php');
$router->get('/note/create', 'controller/notes/create.php');
$router->get('/note/edit', 'controller/notes/edit.php');
$router->patch('/note', 'controller/notes/update.php');
$router->post('/notes/store', 'controller/notes/store.php');

$router->get('/register', 'controller/registration/create.php')->only('guest');
$router->post('/register', 'controller/registration/store.php');


