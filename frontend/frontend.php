<?php
session_start();

include '../app/call.php';
if(checkUserLogin()){
	redirection('../user/index.php');
}
$msg='';
$flag=1;
if (isset($_POST['savebtn'])) {
    $users=getAllUsers($conn);
    foreach ($users as $key => $user){
        if($_POST['user_email']==$user['user_email']||$_POST['user_username']==$user['user_username']){            
            $flag++;
        }
    } 
    if($flag==1){
    if(insertUser($conn, $_POST)){
        //showMsg('User Created Successfully');
        $_SESSION['user'] ['email']=$_POST['user_email'];
        $_SESSION['user'] ['fname']=$_POST['user_fname'];
        $_SESSION['user'] ['lname']=$_POST['user_lname'];
        $user_info=getUserInfoByUsername($conn, $_POST['user_username']);
        $_SESSION['user'] ['id']= $user_info['user_id']; 
        $_SESSION['user'] ['username']=$_POST['user_username'];       
        redirection('../user/index.php');
    }}
    else{
        $msg='Already Used Email or Username';
        redirection('frontend.php#signup');
    }

}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Online Request and Sell</title>
        <meta name="description" content="Lambda is a beautiful Bootstrap 4 template for multipurpose landing pages." /> 

        <!--Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        <!--vendors styles-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

        <!-- Bootstrap CSS / Color Scheme -->
        <link rel="stylesheet" href="css/default.css" id="theme-color">
    </head>
    <body data-spy="scroll" data-target="#lambda-navbar" data-offset="0">

        <!--navigation-->
        <nav class="navbar navbar-expand-md navbar-dark navbar-transparent fixed-top sticky-navigation" id="lambda-navbar">
            <a class="navbar-brand" href="frontend.php">
                <img src="img/logo1.png" class="img-fluid d-block mx-auto" alt="Feature 1" />
            </a>
            <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" 
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span data-feather="menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features">Features</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#faq">FAQ</a>
                    </li>
                </ul>
                <form class="form-inline">
                    <a href="#signup" class="btn btn-outline-secondary btn-navbar page-scroll">Sign up</a>
                </form>
                &nbsp;&nbsp;
                <form class="form-inline">
                    <a href="../user/login.php" class="btn btn-outline-secondary btn-navbar page-scroll">Login</a>
                </form>
            </div>
        </nav>

        <!--hero header-->
        <section class="py-7 py-md-0 bg-hero" id="home" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.1)), url(img/frontendMain.jpg)">
            <div class="container">
                <div class="row vh-md-100">
                    <div class="col-md-7 my-md-auto text-center text-md-left">
                        <h1 class="display-3 text-white font-weight-bold">Sign up with TimroBazzar</h1>
                        <p class="lead text-light my-4">The only online second hand request and sell shop.</p>
                        <a href="#signup" class="btn btn-primary page-scroll">Get started now</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- services section -->
        <section class="py-7 bg-light" id="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-9 mx-auto text-center">
                        <span class="text-muted text-uppercase">Everything you need to request, buy and sell</span>
                        <h2 class="display-4">A complete solution for buyers and sellers</h2>
                        <p class="lead">You can easily request for the product you want and also search in the requests to sell your product.</p>
                    </div>
                </div>
                <div class="row p-4 mt-5 bg-white raised-box rounded">
                    <div class="col-md-4 col-sm-6 mb-5 text-center">
                        <div class="icon-box">
                            <div class="icon-box-inner small-xs text-primary">
                                <span data-feather="edit-3" width="30" height="30"></span>
                            </div>
                        </div>
                        <h4 class="mt-2">Request</h4>
                        <p class="text-muted">You can request the product that you want to buy.</p>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-5 text-center">
                        <div class="icon-box">
                            <div class="icon-box-inner small-xs text-primary">
                                <span data-feather="thumbs-up" width="30" height="30"></span>
                            </div>
                        </div>
                        <h4 class="mt-2">Sell</h4>
                        <p>You can sell the product by looking at the requested products.</p>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-5 text-center">
                        <div class="icon-box">
                            <div class="icon-box-inner small-xs text-primary">
                                <span data-feather="users" width="30" height="30"></span>
                            </div>
                        </div>
                        <h4 class="mt-2">Inquire</h4>
                        <p>If you are selling the product and there is request available as per the product you are selling you can easily inquire the product requesting user to sell your porduct.</p>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-5 text-center">
                        <div class="icon-box">
                            <div class="icon-box-inner small-xs text-primary">
                                <span data-feather="globe" width="30" height="30"></span>
                            </div>
                        </div>
                        <h4 class="mt-2">Confirm</h4>
                        <p>You can confirm the inquiries that the seller is sending for you to buy the product as per your request.</p>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-5 text-center">
                        <div class="icon-box">
                            <div class="icon-box-inner small-xs text-primary">
                                <span data-feather="heart" width="30" height="30"></span>
                            </div>
                        </div>
                        <h4 class="mt-2">Contact</h4>
                        <p>The seller can contact to the product requesting user once he has confirmed your inquiry to sell the product.</p>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-5 text-center">
                        <div class="icon-box">
                            <div class="icon-box-inner small-xs text-primary">
                                <span data-feather="rotate-ccw" width="30" height="30"></span>
                            </div>
                        </div>
                        <h4 class="mt-2">Secure</h4>
                        <p>Your personal information are secured and only given to people as per your permission.</p>
                    </div>
                </div>
                
            </div>
        </section>

        <!--features section-->
        <section class="py-7" id="features">
            <div class="container">
                
                
                <div class="row mt-7">
                    <div class="col-md-6 my-auto">
                        <img src="img/feature3.png" class="img-fluid d-block mx-auto" alt="Feature 3" />
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-left pt-5 pt-md-0">
                        <h2 class="display-4">You can easily sign up for free</h2>
                        <p class="lead text-muted">Then you can sell or request for the second hand product. You can:</p>
                        <ul class="features-list">
                            <li>View Product Requests</li>
                            <li>Add Product Requests</li>
                            <li>Inquire User</li>
                            <li>Confirm Inquiry</li>
                            <li>View Contact Info</li>
                        </ul>
                        <p class="lead mt-3">
                            <a href="#" class="btn btn-primary btn-primary d-inline-flex flex-row align-items-center">
                                Contact us <span class="ml-1" width="18" height="18" data-feather="chevron-right"></span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- reviews section -->
        

        
        

        <!-- faq section -->
        <section class="py-7 bg-light" id="faq">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto text-center">
                        <span class="text-muted text-uppercase">Answers to common questions</span>
                        <h2 class="display-4">Frequently asked questions</h2>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-9 mx-auto">
                        <div class="row mt-4">
                            <div class="col-md-6 mb-4">
                                <h5>How to view other people's contact info?</h5>
                                <p class="text-muted">
                                    You can view other people's contact info if and only if the user confirms to buy your product
                                </p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>What kind of product can we request?</h5>
                                <p class="text-muted">
                                    We can request here second hand electronic gadgets like mobiles, laptop, tables and so on.
                                </p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Can we put our products on sale?</h5>
                                <p class="text-muted">
                                    You have to view requests and if those requests are as per your product, you can inquire those products.
                                </p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>How secure is the process?</h5>
                                <p class="text-muted">
                                    As your contact info can only be viewed after your authorization, it is very secure.
                                </p>
                            </div>
                            
                        </div>
                        <div class="row text-center my-5">
                            <div class="col-lg-6 col-md-8 mx-auto">
                                <div class="font-weight-bold lead">Still have more questions?</div>
                                <br>
                                <a href="#" class="btn btn-primary btn-sm">
                                    Get in touch
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--hero header-->
        <section class="py-5 py-md-6 bg-hero inverse" id="signup" style="background-image: url(img/parallex.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 my-md-auto text-center text-md-left pb-5 pb-md-0">
                        <h1 class="display-3 text-white">Sign UP</h1>
                        <p class="lead text-light">Easy to use, get and sell the second hand prducts</p>
                    </div>
                    <div class="col-md-5 ml-auto">
                        <div class="card">
                            <div class="card-body p-4">
                                <form class="signup-form" method="POST">
                                    <div class="form-group">
                                        <input type="text" required class="form-control" name="user_fname" placeholder="First name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required class="form-control" name="user_lname" placeholder="Last name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" required class="form-control" name="user_email" placeholder="Email address">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required class="form-control" name="user_username" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" required class="form-control" name="user_password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required class="form-control" name="user_address" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                        <input type="text"required class="form-control" minlength="10"

                                        maxlength="10" name="user_phone" placeholder="Phone No.">
                                    </div>
                                    <h6 style="color:red; font-size:20px; text-align:center;"><?php echo $msg;?></h6>
                                    <div class="form-group">
                                        <button type="submit" name="savebtn" class="btn btn-primary btn-block">Create your account</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!--footer / contact-->
        <footer class="py-6 bg-black" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <h5 class="text-white">About Lambda</h5>
                        <p class="about">Magnis modipsae que voloratati andigen daepeditem quiate conecus aut labore. 
                            Laceaque quiae sitiorem rest non restibusaes maio es dem tumquam explabo.</p>
                        <ul class="list-inline social social-rounded social-sm">
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6 ml-auto">
                        <h5 class="text-white">Lambda</h5>
                        <ul class="list-unstyled mt-4">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <h5 class="text-white">Products</h5>
                        <ul class="list-unstyled mt-4">
                            <li><a href="#">Publish</a></li>
                            <li><a href="#">Outreach</a></li>
                            <li><a href="#">Collaborate</a></li>
                            <li><a href="#">Global</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <h5 class="text-white">Community</h5>
                        <ul class="list-unstyled mt-4">
                            <li><a href="#">Help forum</a></li>
                            <li><a href="#">Slack channel</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Policies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 text-muted text-center small-xl">
                        <p>&copy; 2019 Online Request and Sell. All rights reserved.</p>
                        Free Bootstrap 4 Multipurpose Landing Page Template by <a href="https://wireddots.com" target="_blank">Wired Dots</a>.
                    </div>
                </div>
            </div>
        </footer>

        <!--scroll to top-->
        <div class="scroll-top">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </div>

        <!-- theme switcher (FOR DEMO ONLY - REMOVE FROM PRODUCTION)-->
        <div class="switcher-wrap">
            <div class="switcher-trigger">
                <span class="fa fa-gear"></span>
            </div>
            <div class="color-switcher">
                <h6>Color Switcher</h6>
                <ul class="mt-3 clearfix">
                    <li class="bg-green active" data-color="default" title="Default Green"></li>
                    <li class="bg-purple" data-color="purple" title="Purple"></li>
                    <li class="bg-blue" data-color="blue" title="Blue"></li>
                    <li class="bg-red" data-color="red" title="Red"></li>
                    <li class="bg-orange" data-color="orange" title="Orange"></li>
                    <li class="bg-indigo" data-color="indigo" title="Indigo"></li>
                    <li class="bg-black" data-color="black" title="Black"></li>
                    <li class="bg-teal" data-color="teal" title="Teal"></li>
                    <li class="bg-cyan" data-color="cyan" title="Cyan"></li>
                    <li class="bg-pink" data-color="pink" title="Pink"></li>
                </ul>
                <p>These are just demo colors. You can <b>easily</b> create your own color scheme.</p>
            </div>
            <div class="mt-4">
                <a href="https://wireddots.com/themes/lambda?utm_source=lambda-demos" class="btn btn-primary btn-block">Free Download</a>
            </div>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.7.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>