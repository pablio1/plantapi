<?php

require_once __DIR__ . './Notification.php';

$user = new Notification();
$response = array();

try
{  
    if(isset($_POST['userid'])){
        //$userid = $_POST['userid'];
        $result = $user->selectUnreadMessages();

        while($row = $result->fetch_assoc())
        {
            $output[] = $row;
        }

        if($result->num_rows > 0)
        {
            $response["has_data"] = 1;
            //$response["message"] = "You can now login!";
            $response["unread_messages"] = $output;
        }
    }
    
}
catch(Exception $ex)
{
    echo $ex;    
}

echo json_encode($response)

?>