<?php

use Core\App;
use Core\Validator;

$db = App::resolve(\Core\Database::class);

$errors  = [];

$body = $_POST['body'];

if (
    !Validator::validateString($_POST['body'], 1, 400)
) {
    $errors['body'] = 'Body of no more than 400 characters is required';
}

if (!empty($errors)) {

    return view('notes/create.view.php',[
        'heading' => 'Create Note',
        'errors' => $errors,
    ]);
}

$db->query("INSERT INTO `notes` (`body`, `user_id`) VALUES ('{$body}', 1)");

redirect('/notes');
