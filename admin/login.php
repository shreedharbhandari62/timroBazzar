<?php
session_start();
$msg='';
include '../app/call.php';
if(checkAdminLogin()){
	redirection('index.php');
}
 if(isset($_POST['loginbtn'])){
    $adm_email=$_POST['adm_email'];
	$adm_password=md5($_POST['adm_password']);
	$stmtLogin=$conn->prepare("SELECT * FROM tbl_adminlogin WHERE adm_email=:adm_email AND adm_password=:adm_password");
	$stmtLogin->bindParam(':adm_email', $adm_email);
	$stmtLogin->bindParam('adm_password', $adm_password);
	$stmtLogin->setFetchMode(PDO:: FETCH_ASSOC);
	if($stmtLogin->execute()){
		if($stmtLogin->rowcount()>0){
            $adminInfo= $stmtLogin->fetch();
            
			$_SESSION['admin'] ['email']=$adminInfo['adm_email'];
			$_SESSION['admin'] ['role']=$adminInfo['adm_role'];
            $_SESSION['admin'] ['fname']=$adminInfo['adm_fname'];
            $_SESSION['admin'] ['lastname']=$adminInfo['adm_lastname'];
            
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
        <h1><b>
            Admin Login
            </b>
        </h1>
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
                    <input type="email" required placeholder="Email" name="adm_email" >
                </div>
            
        </div>
        <div class="metro double-size yellow">
            
                <div class="input-append lock-input">
                    <input type="password" required placeholder="Password" name="adm_password" >
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
        
    </div>
</body>
<!-- END BODY -->
</html>