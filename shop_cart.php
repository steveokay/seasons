<?php session_start(); ?>

<?php
  require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
  switch($_GET["action"]) {
    case "remove":
      if(!empty($_SESSION["cart_item"])) {
        foreach($_SESSION["cart_item"] as $k => $v) {
            if($_GET["code"] == $k)
              unset($_SESSION["cart_item"][$k]);        
            if(empty($_SESSION["cart_item"]))
              unset($_SESSION["cart_item"]);
        }
      }
    break;
    case "empty":
      unset($_SESSION["cart_item"]);
    break;  
    case "edit":
      $total_price = 0;
      foreach ($_SESSION['cart_item'] as $k => $v) {
        if($_POST["code"] == $k) {
          if($_POST["quantity"] == '0') {
            unset($_SESSION["cart_item"][$k]);
          } else {
          $_SESSION['cart_item'][$k]["quantity"] = $_POST["quantity"];
          }
        }
        $total_price += $_SESSION['cart_item'][$k]["price"] * $_SESSION['cart_item'][$k]["quantity"]; 
          
        $_SESSION['total_amount'] = $total_price;
      }
      if($total_price!=0 && is_numeric($total_price)) {

        print "Kes" . number_format($total_price,2);
        exit;
      }
    break;  
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
<body id="scart_shop" data-spy="scroll" data-target=".navbar-fixed-top">

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
<div id="teams" class="text-center" >
  <div class="overlay" style="height:100%;">
    <div class="container">
      <div class="col-md-10 col-md-offset-1 section-title" >
        <h2><i class="fa fa-shopping-cart"></i>  SHOPPING CART</h2>
        <hr>
        <p>Review all the items in your shopping cart and if you decide you dont want a particular item, Click on the 'remove Item' Link</p>
      </div>
      <div id="row">
        <table class="table">
          <tr>
            <th>Product</th><th>Unit Price</th><th>Quantity</th><th>Total Price</th><th></th>
          </tr>
        <?php

          $total_price = 0.00;
          if(isset($_SESSION["cart_item"])){
          ?>  
          <?php foreach ($_SESSION["cart_item"] as $item) { 
              $product_info = $db_handle->runQuery("SELECT * FROM category_items WHERE code = '" . $item["code"] . "'");
              $total_price += $item["price"] * $item["quantity"]; 
          ?>
            <div class="product-item" onMouseOver="document.getElementById('remove<?php echo $item["code"]; ?>').style.display='block';"  onMouseOut="document.getElementById('remove<?php echo $item["code"]; ?>').style.display='';" >
              <tr>
                <th><div><strong><?php echo $item["name"]; ?></strong></div></th>
                <th><div class="product-price"><?php echo "KES ".$item["price"]; ?></div></th>
                <th><div><input type="text" name="quantity" id="<?php echo $item["code"]; ?>" value="<?php echo $item["quantity"]; ?>" size="5" onBlur="saveCart(this);" style="text-align:center;width:50px;background-color:#CA6F1E;color:#fff;"  disabled/></div></th>
                <th><div class="total"><?php echo "KES ".$item["total"]; ?></div></th>
                <th><div class="btnRemoveAction" id="remove<?php echo $item["code"]; ?>"><a href="shop_cart.php?action=remove&code=<?php echo $item["code"]; ?>" title="Remove from Cart">Remove Item</a></div></th>
              </tr>
            </div>
          <?php
            }
          }
          ?>
          <?php $_SESSION["total_price"]="KES ". number_format($total_price,2); ?>
          <tr><th style="text-align:center;">Total Amount</th><th style="text-align:center;"><?php echo "KES ". number_format($total_price,2); ?></th></tr>
          <tr><td class="btn_end" ><a href="shop_cart.php?action=empty">Clear Cart</a></td><td class="btn_end"><a href="products.php" title="Cart">Continue Shopping</a></td>
          <td></td><td class="btn_end"><a href="checkout.php"><i class="fa fa-money" aria-hidden="true"></i>
 Proceed To Checkout</a></td><td></td></tr>
          </table>
          
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
</body>
</html>