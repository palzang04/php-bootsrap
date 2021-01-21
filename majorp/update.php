<?php

    require_once("connection.php");

    if(isset($_POST['update']))
    {
        $reg_id = $_GET['reg_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];


        $query = " update registration set name = '".$name."', email='".$email."' where reg_id='".$reg_id."'";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            header("location:view.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
  


?>
