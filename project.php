<!DOCTYPE HTML>

<html>

<?php
    include_once("connection.php");

    if (isset($_POST['add'])){
        $am = $_POST['ammount'];

        $add = "insert into packs(ammount) values ('$am');";

        if (mysqli_query($c,$add)){
            echo "successfully added";
        }else echo "fail";
    }

    if (isset($_GET['delete'])){
        $id = $_GET['delete'];

        $del ="delete from packs where id =$id;";

        if (mysqli_query($c,$del)){
            echo "successfully deleted";
        }else echo "fail";
    }

    if (isset($_GET['edit'])){
        $id =$_GET['edit'];
        $result = $mysqli->query ("select * from packs where id=$id;") or die($mysqli->error());

        if(count($result)==1){
            $row =$result->fetch_array();
            $ammount=$row['ammount'];
        }
    } 

    $ammount='';
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

    <div class="container">
    <div class="title">
            <h1 style="font-size: 20px">add new widget packs here</h1>
        </div>
        <div class="input">
            <form method="POST">
                <input type="text" id="ammount" value="<?php echo $ammount ?>" name="ammount" placeholder="type in new ammount">
                <button style="border-radius:20px;padding:5px 16px;"type = "submit" name="add">add new</button>
            </form>
        </div>
    </div>
    </div>
    
    <div class="orderPacks">
        <h2>your widget packs</h2>
        <table style="margin:2px;">
        <tr>
            <th>Packs</th>
            <th>Action</th>
        </tr>
        
        <?php
            $qPacks="select * from packs;";
            $result = mysqli_query($c, $qPacks);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck>0){

            while($rows = mysqli_fetch_assoc($result)){
                $amt = $rows['ammount'];
        ?>
            <tr>
                <td><?php echo $amt;?></td>
            <td>
            
                
                <a href="project.php?update=<?php echo $rows['id'];?>" type="submit" style="border-radius:20px;padding:5px 16px;" name="edit">edit</a>
            
                <a href="project.php?delete=<?php echo $rows['id']; ?>" type="submit"  name="delete">delete </a>
            </td></tr>
            <?php
                }
                }
                ?>
    </table>
    </div>

    <div class="devider"></div>

    <div class="orderPacks">
        <h2>orders</h2>
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

</html>