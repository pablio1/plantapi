<?php
    require_once __DIR__ . './User.php';
    $user = new User();
    $response = array();
    try
    {
        if(!isset($_POST["email"]) || !isset($_POST["password"]) )
        {
            $response["has_data"] = 0;
            $response["message"] = "Please input required fields!";
        }
        else
        {
            $response["has_data"] = 0;
            $response["message"] = "testing";
           
            $username = $_POST["email"];
            $password = $_POST["password"];
            $result= $user->selectSpecificUser($username,$password);
            if($result->num_rows == 1)
            {
                $response["has_data"] = 1;
                $response["message"] = "Successfully login!";
            }
            else
            {
                $response["has_data"] = 0;
                $response["message"] = "Wrong Username or Password!";
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