<?php

use Core\Database;

$db = new Database(config('database'));


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $note   = $db->query("SELECT * FROM notes WHERE id ={$id}")->findOrFail();

    authorize($note['user_id'] === 1);

    // delete note

    $db->query("DELETE FROM notes WHERE id = {$id}");
    redirect('/notes');
    exit();

} else {
    $id      = $_GET['id'];

    $note   = $db->query("SELECT * FROM notes WHERE id ={$id}")->findOrFail();

    authorize($note['user_id'] === 1);

    view('notes/show.view.php',[
        'heading' => 'Note',
        'note' => $note
    ]);
}