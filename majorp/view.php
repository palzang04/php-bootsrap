
 <?php
    session_start();
     require_once("connection.php");
     $query = " select * from registration ";
     $result = mysqli_query($conn,$query);

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <title>View Records</title>
 </head>
 <body class="bg-white">



         <div class="container">
           <div class="text-right mt-5">
             <a href="logout.php">LOGOUT</a>
           </div>

             <div class="row">
                 <div class="col m-auto">

                         <table class="table primary mt-5">
                             <tr>
                                 <td> User ID </td>
                                 <td> User Name </td>
                                 <td> User Email </td>

                                <td> Edit  </td>
                                <td> Delete </td>
                            </tr>

                            <?php

                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $reg_id = $row['reg_id'];
                                        $name = $row['name'];
                                        $email = $row['email'];

                            ?>
                                    <tr>
                                        <td><?php echo $reg_id ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $email ?></td>

                                        <td><a href="edit.php?reg_id=<?php echo $reg_id ?>">Edit</a></td>
                                        <td><a href="delete.php?reg_id=<?php echo $reg_id ?>">Delete</a></td>
                                    </tr>

                            <?php
                                    }
                            ?>
                          </table>

        </div>
    </div>
</div>

</body>
</html>
