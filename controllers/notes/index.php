<?php

use Core\Database;

$db = new Database(config('database'));

$notes   = $db->query("SELECT * FROM notes WHERE user_id = 1")->get();

view('notes/index.view.php',[
    'heading' => 'My Notes',
    'notes'   => $notes
]);