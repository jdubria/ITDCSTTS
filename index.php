<?php
include 'connection/session.php';
if(!empty($_SESSION['username'])){
	header("Location: dashboard.php");
}

if (isset($_GET["error"]) && !empty($_GET["error"])) {
    //naga check sang value sang error
    if($_GET['error'] == 1){
    	$_SESSION['msgs'] = "Invalid Username or Password";
    }
    else if($_GET['error'] == 2){
    	$_SESSION['msgs'] = "Please Login First!";
    }    
}else{  
    echo "";
}

if (isset($_GET["logout"]) && !empty($_GET["logout"])) {
    if($_GET['logout'] == 1){
    	$_SESSION['msgs'] = "You've been logged out!";
    }   
}else{  
   echo "";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CHMSC ITDCSTTS</title>
	<link rel="stylesheet" type="text/css" href="src/css/style.css">
	<link rel="stylesheet" type="text/css" href="src/fa-font/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="src/fa-font/css/font-awesome.min.css">
</head>

<body>
	<form method="POST" action="processlogin.php">
<div class="login-box">
	<h1>CHMSC ITDCSTTS</h1>
	<div class="textbox">
		<i class="fa fa-user" aria-hidden="true"></i>
		<input type="text" placeholder="Username" name="username" value="" required>
	</div>

	<div class="textbox">
		<i class="fa fa-lock" aria-hidden="true"></i>
		<input type="password" placeholder="Password" name="password" value="" required>
	</div>

	<input class="btn" type="submit" name="" value="Sign In">
</div>	
</form>
        <?php if(isset($_SESSION['msgs'])):?>
        <div>
            <script type="text/javascript">alert('<?php echo $_SESSION['msgs'];?>')</script>
            <?php 
                
                unset($_SESSION['msgs']);
            ?>
            
        </div>
        <?php endif;?>       
</body>
</html>

