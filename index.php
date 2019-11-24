<?php 
include('validation.php');
//if user is not login,cant go this page
	if(empty($_SESSION['username'])){
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>HoMe</title>
</head>
<body>
<video muted loop autoplay id="videobg">
            <source src="images/video (1).mp4">
        </video>
        <nav>
            <div class="logo">LOGO</div>
            <div class="menu">
                <ul> 
                <li><a href="login.php">Logout</a></li>
                <?php if (isset($_SESSION['username'])) { ?>
                <li style="font-size:1.5em;"><strong>Welcome, <?php echo $_SESSION['username'];?></strong></li>
                <?php } else { ?>
                <li><a href="login.php">Sign In</a></li>
                <li><a href="register.php">Sign Up</a></li>
                <?php } ?>
                </ul>
            </div>
        </nav>
    <div class="welcome">
        <!-- notification msg -->
        <?php if(isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
            <?php endif ?>

        <!-- logged users -->
        <?php if(isset($_SESSION['username'])) : ?>
            <h1>Hi <strong><?php echo $_SESSION['username'];?>, Have a Good Day!</h1>
            <p><a href="index.php?logout='1'"style="font-weight:bold;color:rgb(241, 6, 116);">Logout</a>
            </p>
        <?php endif ?>
    </div>
</body>
</html>