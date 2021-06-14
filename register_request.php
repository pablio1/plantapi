<?php
    require_once __DIR__ . './User.php';
    $user = new User();
    $response = array();
    try
    {
        if(!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["gender"]) || !isset($_POST["phonenumber"]) || !isset($_POST["password"]))
        {
            $response["has_data"] = 0;
            $response["message"] = "Please input required fields!";
        }
        else
        {

            $response["has_data"] = 0;
            $response["message"] = "testing";
            $username = $_POST["email"];
            $result= $user->checkUsername($username);
            if($result->num_rows == 1)
            {
                $response["has_data"] = 0;
                $response["message"] = "Username is already taken!";
            }
            else
            {
                $user->setName($_POST["name"]);
                $user->setEmail($_POST["email"]);
               
                $user->setGender($_POST["gender"]);
                $user->setPhone($_POST["phonenumber"]);
                $user->setPassword($_POST["password"]);

                $result = $user->insertUser();
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
    }
    catch(Exception $ex)
    {
        $response["has_data"] = 0;
            $response["message"] = "testing";
        echo $ex;    
    }

    echo json_encode($response);


?>