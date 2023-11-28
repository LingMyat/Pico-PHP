<?php

use Core\App;


$db = App::resolve(\Core\Database::class);

$id   = $_GET['id'];

$note = $db->query("SELECT * FROM notes WHERE id ={$id}")->findOrFail();

authorize($note['user_id'] === 1);

view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
]);
