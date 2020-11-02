<?php
session_start();
$msg='';
include '../app/call.php';
if(checkUserLogin()){
	redirection('index.php');
}
 if(isset($_POST['loginbtn'])){
    $user_username=$_POST['user_username'];
	$user_password=md5($_POST['user_password']);
	$stmtLogin=$conn->prepare("SELECT * FROM tbl_userlogin WHERE user_username=:user_username AND user_password=:user_password");
	$stmtLogin->bindParam(':user_username', $user_username);
	$stmtLogin->bindParam('user_password', $user_password);
	$stmtLogin->setFetchMode(PDO:: FETCH_ASSOC);
	if($stmtLogin->execute()){
		if($stmtLogin->rowcount()>0){
            $userInfo= $stmtLogin->fetch();
            $_SESSION['user'] ['email']=$userInfo['user_email'];
            $_SESSION['user'] ['username']=$userInfo['user_username'];
            $_SESSION['user'] ['fname']=$userInfo['user_fname'];
            $_SESSION['user'] ['lname']=$userInfo['user_lname'];
            $_SESSION['user'] ['id']=$userInfo['user_id'];
            
            redirection('index.php');
		}
		else {
			$msg="Invalid email or password";
		}
		
	}
 }
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Login</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="buttonDisabled" id="logo" href="../frontend/frontend.php">
            <!-- <h1><b>
                TimroBazzar
                </b>
            </h1> -->

                   <img src="img/logo1.png" alt="Metro Lab"  width="200px" />
               
        </a>
        <!-- END LOGO -->
    </div>
    <div class="login-wrap">
        <div class="metro single-size red">
            <div class="locked">
                <i class="icon-lock"></i>
                <span>Login</span>
            </div>
        </div>
        <div class="metro double-size green">
            <form method="POST">
                <div class="input-append lock-input">
                    <input type="text" required placeholder="Username" name="user_username" >
                </div>
            
        </div>
        <div class="metro double-size yellow">
            
                <div class="input-append lock-input">
                    <input type="password" required placeholder="Password" name="user_password" >
                </div>
            
        </div>
        <div class="metro single-size terques login">
            
                <button type="submit" name="loginbtn" class="btn login-btn">
                    Login
                    <i class=" icon-long-arrow-right"></i>
                       
                </button>
                <h6 style="color:red; font-size:20px; text-align:center;"><?php echo $msg;?></h6> 
            </form>
        </div>
        
        <div class="login-footer">
            <div class="remember-hint pull-left">
                <input type="checkbox" id=""> Remember Me
            </div>
            <div class="forgot-hint pull-right">
                <a id="forget-password" class="" href="javascript:;">Forgot Password?</a>
            </div>
        </div>
    </div>
</body>
<!-- END BODY -->
</html>

<script type="text/javascript">
 
</script>