<?php

    require_once("connection.php");
    $reg_id = $_GET['reg_id'];
    $query = " select * from registration where reg_id='".$reg_id."'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $reg_id = $row['reg_id'];
        $name = $row['name'];
        $email = $row['email'];

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="bg-dark">
  <div class="container">
           <div class="row">
               <div class="col-lg-6 m-auto">
                   <div class="card mt-5">
                       <div class="card-title">
                           <h3 class="bg-success text-white text-center py-3"> Update Form in PHP</h3>
                       </div>
                       <div class="card-body">

                           <form action="update.php?reg_id=<?php echo $reg_id ?>" method="post">
                               <input type="text" class="form-control mb-2" placeholder=" User Name " name="name" value="<?php echo $name ?>">
                               <input type="email" class="form-control mb-2" placeholder=" User Email " name="email" value="<?php echo $email ?>">

                               <button class="btn btn-primary" name="update">Update</button>
                           </form>

                       </div>
                   </div>
               </div>
           </div>
       </div>

</body>
</html>
