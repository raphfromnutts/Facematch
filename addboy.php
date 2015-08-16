<?php

// START 2
require_once('init.php');

if (isset($_POST['done']))
{
    $folder = 'photos/boy/';
    $ext = '.jpg';
    $name = $mysqli->real_escape_string($_POST['name']);
    $class = $mysqli->real_escape_string($_POST['class']);
    $mysqli->query('
    INSERT INTO photosboy
    SET token = "' . md5($name . 'FacemashSamuel') . '",
        name = "' . $name . '",
        class = "' . $class . '",
        path = "' . $folder . strtolower($name) . $ext . '"');


    header ('Location: addboy.php');
    exit;
}
?>

<form action="" method="post">
    <input type="text" name="name" placeholder="Nom de l'image" />
    <input type="text" name="class" placeholder="Classe de l'image" />
    <button type="submit" name="done">Add</button>
</form>
<!-- END 2 -->