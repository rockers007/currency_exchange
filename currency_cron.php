<?php

// INCLUDING DATABASE AND MAKING OBJECT
require __DIR__.'/classes/Database.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();

 // build the curl request
 $uri="http://www.cbr.ru/scripts/XML_daily.asp";
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $uri);
 curl_setopt( $ch, CURLOPT_HTTPHEADER, []);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 // process and return the response
 $xml_string = curl_exec($ch);
 //$response = json_decode($response, true);
 $xml = simplexml_load_string($xml_string);
$json = json_encode($xml);
$array = json_decode($json,TRUE);

 if(is_array($array['Valute']))
 {
    foreach( $array['Valute'] as $kew=>$currency)
    {
        $name=$currency['CharCode'];
         $rate=$currency['Value'];
         $created=$updated=date('Y-m-d H:i:s');
        $check_email = "SELECT * FROM `currency` WHERE `name`=:name";
        $check_email_stmt = $conn->prepare($check_email);
        $check_email_stmt->bindValue(':name', $name,PDO::PARAM_STR);
        $check_email_stmt->execute();

        if($check_email_stmt->rowCount()):
            $row = $check_email_stmt->fetch(PDO::FETCH_ASSOC);
            if($rate!=$row['rate']):
               $id=$row['id'];
                //update rate value
                $update_query = "update `currency` set `rate`=:rate,`updated`=:updated where id=:id"; 
                $update_stmt = $conn->prepare($update_query);
                $update_stmt->bindValue(':rate', $rate,PDO::PARAM_STR);
                $update_stmt->bindValue(':updated', $updated,PDO::PARAM_STR);
                $update_stmt->bindValue(':id', $id, PDO::PARAM_INT, 15);
                $update_stmt->execute();
                //insert history data;
                $insert_query = "INSERT INTO `currency_history`(`currency_id`,`old_rate`,`new_rate`,`created`) VALUES(:currency_id,:old_rate,:new_rate,:created)";
                $insert_stmt = $conn->prepare($insert_query);
                // DATA BINDING
                $insert_stmt->bindValue(':currency_id',$id, PDO::PARAM_INT, 15);
                $insert_stmt->bindValue(':old_rate', $row['rate'],PDO::PARAM_STR);
                $insert_stmt->bindValue(':new_rate', $rate,PDO::PARAM_STR);
                $insert_stmt->bindValue(':created', $created,PDO::PARAM_STR);
                $insert_stmt->execute();
                
            endif;          
        
        else:
            $insert_query = "INSERT INTO `currency`(`name`,`rate`,`created`,`updated`) VALUES(:name,:rate,:created,:updated)";
            $insert_stmt = $conn->prepare($insert_query);
            // DATA BINDING
            $insert_stmt->bindValue(':name', htmlspecialchars(strip_tags($name)),PDO::PARAM_STR);
            $insert_stmt->bindValue(':rate', $rate,PDO::PARAM_STR);
            $insert_stmt->bindValue(':created', $created,PDO::PARAM_STR);
            $insert_stmt->bindValue(':updated', $updated,PDO::PARAM_STR);

            $insert_stmt->execute();
        endif;
    }
 }
 
