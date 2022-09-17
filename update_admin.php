<?php
    session_start();
    include 'db_connect.php';
    
    $id = $_SESSION['login_id'];
    $sql = "SELECT * FROM users where id=$id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    //Displaying existing data in the form
    $admin_name = $row['name'];
    $user_name = $row['username'];
    $password = $row['password'];

    // echo $_SESSION['login_name'];
    // echo $_SESSION['login_id'];

    if(isset($_POST['submit'])){

        //admin_name is taken from input tag using 'name' attribute
        $admin_name = $_POST['name'];
        $user_name = $_POST['username'];
        $password = $_POST['password'];
        

        $sql = "UPDATE users SET name='$admin_name', username='$user_name', password='$password' where id='$id'";
        $result = mysqli_query($conn, $sql);



        if($result){
            // $_SESSION['login_name'] = $admin_name;
		    // $_SESSION['login_username'] = $user_name;
            
            echo "Data inserted successfully";
            
            //header('location:display.php');
        }else{
            echo "Something went wrong!!";
            die(mysqli_error($conn));
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Bus Booking Management System</title>
  </head>
  <body>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Admin Name</label>
                <input type="text" class="form-control"  name="name" autocomplete="off" value=<?php echo $admin_name;?>>              
            </div>

            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" class="form-control" name="username" autocomplete="off" value=<?php echo $user_name;?>>              
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="password" autocomplete="off" value=<?php echo $password;?>>              
            </div>


            <button type="submit" class="btn btn-primary" name="submit"><a href="#" class="text-light">Update</a></button> 
            <button type="nav" class="btn btn-primary" name="back"><a href="./index.php?page=home" class="text-light">Back</a></button> 
        </form>
            
    </div>   
  </body>
</html>