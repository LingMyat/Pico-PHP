<?php

use Core\Database;
use Core\Validator;

$db = new Database(config('database'));

$errors  = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $body = $_POST['body'];

    if (
        ! Validator::validateString($_POST['body'], 1, 400)
    ) {
        $errors['body'] = 'Body of no more than 400 characters is required';
    }
    
    if(empty($errors)) {
        $db->query("INSERT INTO `notes` (`body`, `user_id`) VALUES ('{$body}', 1)");

        header('Location: /notes');
    }
    
}

view('notes/create.view.php',[
    'errors' => $errors,
    'heading' => 'Create Note'
]);