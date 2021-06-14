<?php
    require_once __DIR__ . './Notification.php';
    $user = new Notification();
    $response = array();
    try
    {
        if(!isset($_POST["schedule"]))
        {
            $response["has_data"] = 0;
            $response["message"] = "Please input required fields!";
        }
        else
        {

            $response["has_data"] = 0;
            $response["message"] = "testing";
            $schedule = $_POST["schedule"];
            $result= $user->addNotification($schedule);
            
            if($result== 1)
            {
                $response["has_data"] = 1;
                $response["message"] = "Successfully registered!";
            }
            else
            {
                $response["has_data"] = 0;
                $response["message"] = "Record cannot be saved!";
            }
            
        }
    }
    catch(Exception $ex)
    {
        $response["has_data"] = 0;
            $response["message"] = "testing";
        echo $ex;    
    }

    echo json_encode($response);


?>