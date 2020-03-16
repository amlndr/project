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
            $pAr[] = $row;
        }
    }
    

    $order =  "select * from orders;";
    $rsOrder = mysqli_query($c,$order);
    
    $oAr = array();
    if (mysqli_num_rows($rsOrder) >0){
        while($row = mysqli_fetch_assoc($rsOrder)){
            $oAr[] = $row;
        }
    }


    //comparing
    $countO= count($oAr);
    $countP= count($pAr);

    for ($i=0;$i<$countO;$i++)
    {
        if($oAr[$i]['orderAmmount']< $pAr[0]['ammount'] && $oAr[$i]['orderAmmount'] !=0)
        {
            $oAr[$i]['orderToSend'] = $oAr[$i]['orderToSend'] + $pAr[0]['ammount'];
        }

        for ($j=($countP-1);$j>=0;$j--) 
        {
            
            if ($pAr[$j]['ammount']<=$oAr[$i]['orderAmmount'])
            {
                $oAr[$i]['orderToSend'] = $oAr[$i]['orderToSend'] + $pAr[$j]['ammount'];
                $oAr[$i]['orderAmmount'] =$oAr[$i]['orderAmmount'] - $pAr[$j]['ammount'];
                if($oAr[$i]['orderAmmount']< $pAr[0]['ammount'] && $oAr[$i]['orderAmmount'] !=0)
                {
                    $oAr[$i]['orderToSend'] = $oAr[$i]['orderToSend'] + $pAr[0]['ammount'];
                }
                $j++; 
            }  

        } 
    }
    print_r($oAr);
    
?> 
</html>