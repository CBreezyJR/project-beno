<?php
session_start();
$error='';

if(isset($_POST['submit'])){
    if(empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Please enter your username and password";
    }
    else{
        $email=$_POST['email'];
        $password=$_POST['password'];
        $connection = mysqli_connect("localhost", "email", "password");
        $email = stripslashes($email);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($connection,$username);
        $password = mysqli_real_escape_string($connection,$password);

        $db = mysqli_select_db($connection,"dbphp");
        $query = mysqli_query($connection,"SELECT * FROM users WHERE password='$password' AND email='$email'");
        $rows = mysqli_num_rows($query);
        if($rows == 1){
            $_SESSION['login_user']=$email;
            header("location: home.php");
        }
        else{
            $error = "Username or Password is invalid";
        }
        mysqli_close($connection);
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="align-middle">
    <div class="container vh-100">
        <div class="row h-25"></div>
        <div class="col-12"></div>
        <div></div>








        <form action ="news.php" class="align-self-center"">
            <div class=" mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <div class="col-sm-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <div class="col-sm-4">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>

                    
                        <button type="submit" class="btn btn-primary">Login</button>
                    

        </form>










        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </div>
</body>

</html>