<!DOCTYPE HTML>

<html>

<?php
    $dbhost = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'project';

    $c =  mysqli_connect($dbhost, $username, $password, $db) or die ("connection fail!");
?>

<head>
    <title>Wally's Widget</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="styleshet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>>
    <link rel="stylesheet" type="text/css" href="cobasaja.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


<body>
    <nav>
         <img src="wally.png" height="70" width="70" >
         <h5 style= "color:indigo">Wally's Widget</h5>
    </nav>

    <div class="add">
        <div class="title">
            <h1 style="font-size: 20px">add new widget packs here</h1>
        </div>
        <div class="input">
            <form method="post">
                <input type="number" id="ammount" name="ammount" placeholder="type in new ammount">
                <button style="border-radius:20px;padding:5px 16px;"type = "submit" name="submit">add new</button>
            </form>
        </div>
        <?php 
            $am = $_POST["ammount"];

            $add = "insert into packs(ammount) values ('$am');";

            if (mysqli_query($c,$add)){
                echo "successfully added";
            }else echo "fail";
        ?>
    </div>

    <div class="orderPacks">
        <h2 style="text-align:center; color:blueviolet">update widget packs</h2>
        <table>
        <tr>
            <th>Packs</th>
            <th>edit</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        
        <?php
            $qPacks="select * from packs;";
            $result = mysqli_query($c, $qPacks);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck>0){

            while($rows = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?php echo $rows['ammount'];?></td>
                <td>
                <form>
                    <input type="number" id="ammount" name="ammount" placeholder="type in new ammount">
                </td>
            <td>
                <button type="submit"style="border-radius:20px;padding:5px 16px;">update</button>
            </td>
            <td>
                <button type="submit"style="border-radius:20px;padding:5px 16px;">delete</button>
            </tr>
            <?php
                }
                }
                ?>
    </table>
    </div>

    <div class="devider"></div>

    <div class="orderPacks">
        <h2 style="text-align:center; color:blueviolet">orders</h2>
        <table>
        <tr>
            <th>name</th>
            <th>contact</th>
            <th>order</th>
            <th>packs to send</th>
        </tr>
        <?php
            $qOrder="select * from orders;";
            $result = mysqli_query($c, $qOrder);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck>0){

            while($rows = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['contact'];?></td>
                <td><?php echo $rows['orderAmmount'];?></td>
                <td><?php echo $rows['orderToSend'];?></td>
            </tr>
                <?php
            }
             }
                ?>
            
    </table>
    </div>

    <div class="devider"></div>

 
</body>