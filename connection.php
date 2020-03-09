<?php
    $dbhost = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'project';

    $c =  mysqli_connect($dbhost, $username, $password, $db) or die ("connection fail!");
?>
