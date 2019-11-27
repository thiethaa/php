<?php 
//show to nav bar
if(isset($_SESSION['username'])!="") {
    header("Location: index.php");
}
include('validation.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/4940bd348b.js" crossorigin="anonymous"></script>
    <title>Form Registration & Login</title>
</head>
<body>
<div class="wrapper">
        <video muted loop autoplay id="videobg">
            <source src="images/video (1).mp4">
        </video>
        <nav>
            <div class="logo">LOGO</div>
            <div class="menu">
                <ul>
                    <li ><a href="register.php">Sign Up</a></li>
                </ul>
            </div>
        </nav>

    <div class="container">
        <div class="header">
            <h3>Welcome!</h3>
        </div>

        <form method="POST" action="login.php">
<!-- display error message here -->
            <?php include('errors.php');?>

            <div class="input-group">
            <label><i class="fas fa-user"></i> Username:</label>
            <input type="text" name="username" >
            </div>

            <div class="input-group">
            <label><i class="fas fa-lock"></i> Password:</label>
            <input type="password" name="password">
            </div>

            <div class="input-group">
            <label><i class="fas fa-lock"></i> Confirm Password:</label>
            <input type="password" name="password2">
            </div>

            <div class="input-group">
                <button type="submit" class="btn" name="login">Login</button>
            </div>
            <p>
                Not yet a member? <a href="register.php" style="font-weight:bold;color:rgb(241, 6, 116);">Sign Up</a>
            </p>
        </form>
    </div>
</div>  
  
</body>
</html>