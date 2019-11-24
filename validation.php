<?php
session_start();

//initializing variable
$username ="";
$email ="";
$errors =array();

//connect to Database
$db = mysqli_connect('localhost','root','','homework');

//register Users
if(isset($_POST['register'])){
    //receive all information from the form when register clicked
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    //validate the form
    if(empty($username)){array_push($errors,"Username is required!");}
    if(empty($email)){array_push($errors,"Email is required!");}
    if(empty($password)){array_push($errors,"Password is required!");}
    if($password != $password2){array_push($errors,"Passwords did not Match!");}

    //check if username & || email already exist
    $user_check_query = "SELECT * FROM users WHERE username = '$username' or email = '$email' LIMIT 1";
    $result = mysqli_query($db,$user_check_query);
    $user = mysqli_fetch_assoc($result);

    if($user){//already $|| email already exist
       if($user['username'] === $username){
        array_push($errors,"Username is already exists!");
        } 
       if($user['email'] === $email){
        array_push($errors,"Email is already exists!");
        }
    }
   //if no error 
   if(count($errors)== 0){
       $password = md5($password);//encrypt the password
    //insert data to database
       $query = "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
        mysqli_query($db,$query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are Logged in";
        header('location:index.php');//rediret to HomePage
   }
}
//users login
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if(empty($username)){array_push($errors,"Username is required!");}
        if(empty($password)){array_push($errors,"Password is required!");}
        if($password != $password2){array_push($errors,"Passwords did not Match!");}

        if(count($errors) == 0){
            $password = md5($password);//encrypt the password
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($db,$query);
            if(mysqli_num_rows($result) == 1){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now Logged in";
                header('location:index.php');
            }else{
                array_push($errors,"Invalid username/password!");
            }
        }
    }
    //logout
    if(isset($_GET ['logout'])){
    session_destroy();
    unset($_SESSION ['username']);
    header('location:login.php');
    }
?>