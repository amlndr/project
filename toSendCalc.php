<!DOCTYPE HTML>
<html>

<?php
    include_once("connection.php");

    //$send = mysqli_query($c, "update orders set orderToSend = '$calc' where name = $name;");
    

    //create array for packs and order

    $packs =  "select ammount from packs;";
    $rsPacks = mysqli_query($c,$packs);
    
    $packsArr = array();
    if (mysqli_num_rows($rsPacks) >0){
        while($row = mysqli_fetch_assoc($rsPacks)){
            $packsArr[] = $row;}
    }
    
    //to check it works print_r($packsArr);

    $order =  "select  name, orderAmmount from orders;";
    $rsOrder = mysqli_query($c,$order);
    
    $orderArr = array();
    if (mysqli_num_rows($rsOrder) >0){
        while($row = mysqli_fetch_assoc($rsOrder)){
            $orderArr[] = $row;}
    }

    //to check if works 
    print_r($orderArr);

    
    //comparing
    foreach($orderArr as $o){
      
            if ($o[orderAmmount] >1000){  //solusi lain?
                print_r($o);
             }
    }    

//    foreach($orderArr as $o){
//        foreach($packsArr as $p){
//            if ($o[orderAmmount] == $p[ammount]){  //solusi lain?
//                print_r($o);
//             }
//        }
//    }    


?>

   
</html>