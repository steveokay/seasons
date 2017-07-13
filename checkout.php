<?php session_start(); ?>
<?php

require_once("dbcontroller.php");
$db_handle = new DBController();

if(isset($_POST['btn_complete'])){

  //CHECK ALL FIELDS ARE FILLED
  if(isset($_POST["customer_email"]) && isset($_POST["customer_phone"]) && isset($_POST["cutomer_name"]) && isset($_POST["customer_residence"])){

    $_SESSION['cust_email'] = $_POST["customer_email"];
    $_SESSION['cust_phone'] = $_POST["customer_phone"];
    $_SESSION['cust_name'] = $_POST["cutomer_name"];
    $_SESSION['cust_residence'] = $_POST["customer_residence"];

    // echo "<table border=\"1\">";
    // echo "<tr>";
    // echo "<td>QUANTITY</td><td>PRODUCT</td><td>UNIT PRICE</td><td>TOTAL AMOUNT</td>";
    // echo "</tr>";
    //send mail to customer and company
    foreach ($_SESSION["cart_item"] as $item) { 

      // echo "<tr>";
      // echo "<td>{$item["quantity"]}</td><td>{$item["name"]}</td><td>{$item["total"]}</td><td>{$item["total"]} Kes</td>";
      // echo "</tr>"; 
 
    }
    echo $_SESSION["total_price"];
    // echo "</table>";

  } else {
    echo "Please fill all form details";
  }

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
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="check_out" data-spy="scroll" data-target=".navbar-fixed-top">
<form method="post" action="">
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="http://www.seasonbasket.co.ke">Season Basket</a></div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about" class="page-scroll">
      </a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
</nav>

<!-- Team Section -->
<div id="checkout" class="text-center" >
  <div class="overlay">
    <div class="container">
      <div class="col-md-10 col-md-offset-1 section-title" >
        <h2><i class="fa fa-money" aria-hidden="true"></i>  Checkout</h2>
        <hr>
        <p>Complete Checkout </p>
      </div>
      <div id="row">

        <div align="center">
      <table class="table" style="width:400px; align:center;">
        <tr><td colspan="2"><h3><i class="fa fa-credit-card" aria-hidden="true"></i>
 &nbsp;<b>Contact and Billing Information<b></h3></td><tr>
        <tr><td>Email</td><td><input type="text" size="40" style="color:#000;" name="customer_email"/></td></tr>
        <tr><td>Phone Number</td><td><input type="text" size="40" style="color:#000;" name="customer_phone"/></td></tr>
        <tr><td>Name</td><td><input type="text" size="40" style="color:#000;" name="cutomer_name"/></td></tr>
        <tr><td>Residence Address</td><td><input type="text" size="40" style="color:#000;" name="customer_residence" /></td></tr>
        <tr><td></td><td><button class="btn btn-success" style="width:100%;" name="btn_complete"><i class="fa fa-credit-card" aria-hidden="true"></i>
complete</button></td></tr>
      </table> 
    </div>
        
      <?php

          $total_price = 0.00;
          if(isset($_SESSION["cart_item"])){

             foreach ($_SESSION["cart_item"] as $item) {   
          ?>

          <!-- <ul class="">
            <li class=""><?php echo $item["name"]; ?></li>
            <li class=""><?php echo $item["quantity"]; ?></li>
            <li class=""><?php echo $item["total"]; ?></li>
            <?php echo "KES ".$item["total"]; ?>
          </ul> -->

            <div class="product-item" onMouseOver="document.getElementById('remove<?php echo $item["code"]; ?>').style.display='block';"  onMouseOut="document.getElementById('remove<?php echo $item["code"]; ?>').style.display='';" >
              
            </div>
          <?php
            }
          }
          ?>

          
        <div id="footers">
  
          <div class="container-fluid text-center copyrights">

            <div class="col-md-6 col-md-offset-5">
            
            <br/><br/><br/><br/>
              <ul style="list-style-type:none;">
                  <li style="float:left;padding-left:10px;"><a href=""><i class="fa fa-facebook"></i></a></li>
                  <li style="float:left;padding-left:10px;"><a href=""><i class="fa fa-twitter"></i></a></li>
                  <li style="float:left;padding-left:10px;"><a href=""><i class="fa fa-google-plus"></i></a></li>
                  <li style="float:left;padding-left:10px;"><a href=""><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>

            <div class="col-md-8 col-md-offset-2">
               <p>&copy; 20<?php echo date('y');?> Season Basket. All rights reserved.</p><br/> 
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="js/bsootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/nivo-lightbox.js"></script> 
<script type="text/javascript" src="js/jquery.isotope.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/mainquery.js"></script> 
</form>
</body>
</html>