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
/*
    if (is_array($oAr))
    {
            foreach($oAr as $row => $val)
            {
                $name = mysqli_real_escape_string($c,$val['name']);
                $contact = mysqli_real_escape_string($c,$val['contact']);
                $oA = mysqli_real_escape_string($c,$val['orderAmmount']);
                $send = mysqli_real_escape_string($c,$val['orderToSend']);

                
                $qSend = "update orders set orderToSend='$send' where name =$name;";
                if (mysqli_query($c,$qSend)){
                    echo "orders successfully updated";
                }else echo "fail";
            }
        
    }*/

    //comparing
    $countO= count($oAr);
    $countP= count($pAr);

    for ($i=0;$i<$countO;$i++)
    {
        $temp =$oAr[$i]['orderAmmount'];
         if($temp< $pAr[0]['ammount'] && $temp !=0)
        {
            $oAr[$i]['orderToSend'] = $oAr[$i]['orderToSend'] + $pAr[0]['ammount'];
        }

        for ($j=($countP-1);$j>=0;$j--) 
        { 
            if ($pAr[$j]['ammount']<=$temp)
            {
                $oAr[$i]['orderToSend'] = $oAr[$i]['orderToSend'] + $pAr[$j]['ammount'];
                $temp =$temp - $pAr[$j]['ammount'];
                if($temp< $pAr[0]['ammount'] && $temp !=0)
                {
                    $oAr[$i]['orderToSend'] = $oAr[$i]['orderToSend'] + $pAr[0]['ammount'];
                }
                $j++; 
            }  
            
        } 
    }
    

?>
        <table>
        <tr>
            <th>name</th>
            <th>contact</th>
            <th>order</th>
            <th>packs to send</th>
        </tr>
            <tr>
                <?php for ($i =0; $i<$countO; $i++){?>
                <td><?php echo $oAr[$i]['name'];?></td>
                <td><?php echo $oAr[$i]['contact'];?></td>
                <td><?php echo $oAr[$i]['orderAmmount'];?></td>
                <td><?php echo $oAr[$i]['orderToSend'];?></td>
            </tr>
                <?php
            }
             
                ?>
</html>