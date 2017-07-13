<?php
session_start();

$session_items = 0;
if(!empty($_SESSION["cart_item"])){
  $session_items = count($_SESSION["cart_item"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Season Basket</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top">Season Basket</a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#about" class="page-scroll">
          <ul style="list-style-type:none;">
          <li style="float:left;padding-left:10px;"><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li style="float:left;padding-left:10px;"><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li style="float:left;padding-left:10px;"><a href="#"><i class="fa fa-google-plus"></i></a></li>
          <li style="float:left;padding-left:10px;"><a href="#"><i class="fa fa-instagram"></i></a></li>
        </ul>
      </a></li> -->
        <!-- <li><a href="#restaurant-menu" class="page-scroll">Menu</a></li>
        <li><a href="#portfolio" class="page-scroll">Gallery</a></li>
        <li><a href="#team" class="page-scroll">Chefs</a></li> -->
        <!-- <li><a href="#call-reservation" class="page-scroll">Contact</a></li> -->
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
   
</nav>
<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="intro-text">
            <h1>Season Basket</h1>
            <p>Your Online Fruits and Vegetables Home Delivery Store</p>
            <a class="btn btn-custom btn-lg page-scroll" style="background-color:#cb4335;" ><i class="fa fa-check" aria-hidden="true"></i>
HandPicked</a> &nbsp;&nbsp;&nbsp;
            <a class="btn btn-custom btn-lg page-scroll" style="background-color:#cb4335;" ><i class="fa fa-check" aria-hidden="true"></i>
Home delivered</a> &nbsp;&nbsp;&nbsp;
            <a class="btn btn-custom btn-lg page-scroll" style="background-color:#cb4335;" ><i class="fa fa-check" aria-hidden="true"></i>
Organic</a>
            <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="products.php" class="btn btn-custom btn-lg page-scroll" style="padding-right:30px;" > <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>  START SHOPPING </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</header>

<div class="cart_icon">
   <li style="list-style:none;">
      <a href="shop_cart.php" style="color:green;" ><i class="fa fa-2x fa-shopping-cart"></i></a>
      <lavel id="cart-badge" class="badge badge-warning"><?php echo $session_items; ?></lavel>
    </li>
</div>

<!-- instructions Section -->
<div id="about" class="text-center">
  <div class="overlay">
    <div class="container">
      <div class="col-md-10 col-md-offset-1 section-tite">
        <h2 >HOW IT WORKS</h2>
        <hr style="width:100%;">
        <p>Ordering with Season Basket is very easy.<br/>Browse and pick the products you would like to purchase. We will package together your order and deliver</p>
      </div>
      <div id="row">
        <div class="col-md-4 team">
          <div class="thumbnail">
            <div class="team-img"><img src="img/team/01.jpg" alt="..."></div>
            <div class="caption">
              <h3 class="menu-section-title">Select Your Products</h3><hr/>
              <p>We have a flexible ordering and delivering system available. Select from our various range of fresh vegetables and fruits and add them to the shopping cart.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 team">
          <div class="thumbnail">
            <div class="team-img"><img src="img/team/scart.png" alt="..."></div>
            <div class="caption">
              <h3 class="menu-section-title">Payment And Check out</h3><hr/>
              <p>Before checking out, Review all the items in your shopping cart and if you decide you dont want a particular item, Click on the 'remove' button. When ready to place an order click the 'checkout link'and follow the instructions to complete payment.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 team">
          <div class="thumbnail">
            <div class="team-img"><img src="img/team/index.png" alt="..." height="205"></div>
            <div class="caption">
              <h3 class="menu-section-title">Delivery</h3><hr/>
              <p>We Make Deliveries to Major areas in Nairobi</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



 <div id="footers">
  <div class="col-md-6 col-md-offset-5">
      <ul style="list-style-type:none;">
          <li style="float:left;padding-left:10px;"><a href=""><i class="fa fa-facebook"></i></a></li>
          <li style="float:left;padding-left:10px;"><a href=""><i class="fa fa-twitter"></i></a></li>
          <li style="float:left;padding-left:10px;"><a href=""><i class="fa fa-google-plus"></i></a></li>
          <li style="float:left;padding-left:10px;"><a href=""><i class="fa fa-instagram"></i></a></li>
        </ul>
    </div>
  <div class="container-fluid text-center copyrights">
    <div class="col-md-8 col-md-offset-2">
       <p>&copy; 20<?php echo date('y');?> Season Basket. All rights reserved.</p><br/> 
    </div>
  </div>
</div>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="js/bsootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/nivo-lightbox.js"></script> 
<script type="text/javascript" src="js/jquery.isotope.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
