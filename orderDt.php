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