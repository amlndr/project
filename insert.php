<?php 
	$dbhost = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'project';

    $c =  mysqli_connect($dbhost, $username, $password, $db) or die ("connection fail!");

    $ammount - $_POST['ammount'];

    $sql = "insert into packs(ammount) values ('$ammount');";

    if (mysqli_query($c,$sql)){
    	echo "successfully added";
    }else echo "fail";

    header("refresh:2; url=project.php");

   ?>