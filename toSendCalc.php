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
    echo "RESULT: ".'<br>';

       $countO= count($oAr);
        $countP= count($pAr); 

        echo "data of packs total $countP. ";
        echo "data of orders total  $countO".'<br>';

      $calc=array();
      $k=0;

      /*
      foreach($oAr as $o){
        foreach($pAr as $p){
            if ($o['orderAmmount'] < $p['ammount'])
                {  
                    echo $o['name'].'<br>';
                    $calc =$p['ammount'];
                    echo $calc.'<br>';
                    break;
                }else ;
        }*/

        for ($i=0;$i<$countO;$i++)
        {
            for ($j=0;$j<$countP;$j++) 
            {
                if($oAr[$i]['orderAmmount']=== $pAr[$j]['ammount'])
                { 
                    $oAr[$i]['orderToSend'] = $pAr[$j]['ammount'];
                    break;                      
                }
                
                else if($oAr[$i]['orderAmmount']<= $pAr[$j]['ammount'])
                { 
                    $oAr[$i]['orderToSend'] = $pAr[$j]['ammount'];
                    break;                      
                } 

                else if($oAr[$i]['orderAmmount']>= $pAr[$j]['ammount'])
                {
                    $k=0;
                    while ($oAr[$i]['orderToSend']<=$pAr[$j]['ammount']){
                            $oAr[$i]['orderToSend'] =  $oAr[$i]['orderToSend']+ $pAr[$j+$k]['ammount'] ;
                            $k++;
                    }
                    break;                      
                } 
        
            }
        }

        print_r($oAr);
    
?> 
</html>