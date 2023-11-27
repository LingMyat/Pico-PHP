<?php

$db = new Database(config('database'));

$heading = 'Note';

$id      = $_GET['id'];

$note   = $db->query("SELECT * FROM notes WHERE id ={$id}")->findOrFail();

authorize($note['user_id'] === 1);

require('views/note.view.php');