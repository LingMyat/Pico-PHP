<?php

use Core\App;

$db = App::resolve('Core\Database');

$id = $_POST['id'];

$note   = $db->query("SELECT * FROM notes WHERE id ={$id}")->findOrFail();

authorize($note['user_id'] === 1);

// delete note

$db->query("DELETE FROM notes WHERE id = {$id}");
redirect('/notes');
exit();