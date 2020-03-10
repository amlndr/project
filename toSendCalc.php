<!DOCTYPE HTML>
<html>

<?php
    include_once("connection.php");

    //$send = mysqli_query($c, "update orders set orderToSend = '$calc' where name = $name;");
    

    //create array for packs and order

    $packs =  "select ammount from packs;";
    $rsPacks = mysqli_query($c,$packs);
    
    $pAr = array();
    if (mysqli_num_rows($rsPacks) >0){
        while($row = mysqli_fetch_assoc($rsPacks)){
            $pAr[] = $row;}
    }
    

    $order =  "select orderAmmount from orders;";
    $rsOrder = mysqli_query($c,$order);
    
    $oAr = array();
    if (mysqli_num_rows($rsOrder) >0){
        while($row = mysqli_fetch_assoc($rsOrder)){
            $oAr[] = $row;}
    }

    //to check if works print_r($oAr);
    //to check it works 
    print_r($pAr);

    //comparing
    echo "result: ";
     function a($oAr,$pAr){
        foreach($oAr as $o){
            foreach($pAr as $p){
                if ($o['orderAmmount'] === $p['ammount'])
                    {  //solusi lain?
                        echo $o['name'];
                    }else echo "false\n";
            }
        }
    }

    a($oAr,$pAr);
    
        
   

?>

   
</html>
