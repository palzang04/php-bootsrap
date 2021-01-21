<?php

        require_once("connection.php ");

        if(isset($_GET['reg_id']))
        {
            $reg_id = $_GET['reg_id'];
            $query = " delete from registration where reg_id = '".$reg_id."'";
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
        else
        {
            header("location:view.php");
        }

?>
