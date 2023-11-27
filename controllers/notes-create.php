<?php

require "Validator.php";

$db = new Database(config('database'));

$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors  = [];

    $validator = new Validator();

    $body = $_POST['body'];

    if (
        ! $validator->string($_POST['body'], 1, 400)
    ) {
        $errors['body'] = 'Body of no more than 400 characters is required';
    }
    
    if(empty($errors)) {
        $db->query("INSERT INTO `notes` (`body`, `user_id`) VALUES ('{$body}', 1)");

        header('Location: /notes');
    }
    
}

require('views/notes-create.view.php');