<?php
session_start();
$error='';

if(isset($_POST['submit'])){
    if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['first name']) || empty($_POST['last name']) || empty($_POST['role'])){
        $error = "Please fill the missing information";
    }
    else{
        $email=$_POST['email'];
        $password=$_POST['password'];
        $first_name=$_POST['first name'];
        $last_name=$_POST['last name'];
        $role=$_POST['role'];
        
        $connection = mysqli_connect("localhost", "email", "password","first name","last name","role");
        $email = stripslashes($email);
        $password = stripslashes($password);
        $first_name = stripslashes($first_name);
        $last_name = stripslashes($last_name);
        $role = stripslashes($role);

        $email = mysqli_real_escape_string($connection,$email);
        $password = mysqli_real_escape_string($connection,$password);
        $first_name = mysqli_real_escape_string($connection,$first_name);
        $last_name = mysqli_real_escape_string($connection,$last_name);
        $role = mysqli_real_escape_string($connection,$role);

        $db = mysqli_select_db($connection,"dbphp");
        $query = mysqli_query($connection,"SELECT * FROM users WHERE password='$password' AND email='$email' AND first name='$first_name' AND last name='$last_name' AND role='$role'");
        $rows = mysqli_num_rows($query);
        if($rows == 1){
            $_SESSION['login_user']=$email;
            header("location: home.php");
        }
        else{
            $error = "ERROR creating user";
        }
        mysqli_close($connection);
    }
}
?>

