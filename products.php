<?php session_start(); require_once 'functions/db_conn.php'; ?>
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCode = $db_handle->runQuery("SELECT * FROM category_items WHERE code='" . $_GET["code"] . "'");

      //get the total amount of a product ie quantity * price per quantity
      $total = $_POST["quantity"] * $productByCode[0]["price"];
      $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["item_name"], 'code'=>$productByCode[0]["code"], 'total'=>$total, 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));

      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode[0]["code"] == $k)
                $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
                $_SESSION["cart_item"][$k]["total"] = $_POST["total"];
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }
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
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<?php
$session_items = 0;
if(!empty($_SESSION["cart_item"])){
  $session_items = count($_SESSION["cart_item"]);
} 
?>
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="http://www.seasonbasket.co.ke">Season Basket</a><br/>Natures Best</div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about" class="page-scroll">
      </a></li>
       <!-- <li><a href="#portfolio" class="page-scroll">Gallery</a></li>
        <li><a href="#team" class="page-scroll">Chefs</a></li> -->
        <!-- <li><a href="#call-reservation" class="page-scroll">Contact</a></li> -->
      </ul>
    </div>
    <div style="color:#fff;float:right;"><li style="list-style:none;">
      <a href="shop_cart.php" style="color:white;" ><i class="fa fa-2x fa-shopping-cart"></i>
      <lavel id="cart-badge" class="badge badge-warning"><?php echo $session_items; ?></lavel>
    </li>VIEW CART</a></div>
    <!-- /.navbar-collapse --> 
  </div>
</nav>

<div class="cart_icon">
   <li style="list-style:none;">
      <a href="shop_cart.php" style="color:green;" ><i class="fa fa-2x fa-shopping-cart"></i></a>
      <lavel id="cart-badge" class="badge badge-warning"><?php echo $session_items; ?></lavel>
    </li>
</div>

<div id="offers"> 
  <div class="section-title text-center center"> 
    <div class="overlay">
      <h2>SHOP</h2>
      <hr>
      <p>Season Basket : Natures Best</p>
      </div>
  </div>

  <div class="text-center">
  <div class="overlay">
    <div class="container">
      <form class="form-inline" method="post" action="products.php">
      <div class="col-md-4">
        <input name="searchterm" class="search" placeholder="Enter product Name" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0"/> &nbsp;<input class="btn btn-success" type="submit" value="Search">
      </div>
    </form>
      <div class="col-md-10 col-md-offset-1 section-tite">
        <h3 >Products</h3>
       </div>

  <table class="table">
  <thead >
    <tr>
      <th>ITEM</th>
      <th style="text-align:center;">UNIT</th>
      <th style="text-align:center;">PRICE</th>
      <th style="text-align:center;">QUANTITY</th>
      <th style="text-align:center;">TOTAL</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

  <?php


      //fetch the details from the db
      $sql = "SELECT * FROM products";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0){

        //output data
        while($row = mysqli_fetch_assoc($result)){
          echo "<tr><td colspan=\"6\" style=\"background-color: #935116; color:#fff;\">".$row["name"]."</td></tr>";

          //get the product category
          $query = "SELECT * FROM product_category WHERE product_id = ".$row["id"];
          $result2 = mysqli_query($conn,$query);

          //look if it returns any row
          if(mysqli_num_rows($result2) > 0){

            //output products
            while($row1 = mysqli_fetch_assoc($result2)){
              echo  "<tr><td colspan=\"6\" style=\"background-color:green; color:#fff;align:left;\">".$row1["categ_name"]."</td></tr>";

              //get the various items and details from the products category 
              $product_array = $db_handle->runQuery("SELECT * FROM category_items WHERE prod_categ_id =".$row1["id"]);
              if (!empty($product_array)) { 
                foreach($product_array as $key=>$value){
                  ?>
                  <form method="post" action="products.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                  <tr><th><div><strong><?php echo $product_array[$key]["item_name"]; ?></strong></div></th>
                  <td><div><strong><?php echo $product_array[$key]["unit"]; ?></strong></div></td>
                  <td class="product-price"><div ><?php echo "KSh ".$product_array[$key]["price"]; ?></div></td>
                  <td><div><input type="text" class="qty" name="quantity" value="1" size="2" style="text-align:center;width:50px;background-color:#CA6F1E;color:#fff;" /></div></td>
                  <td ><input type="text" class="total" size="10" name="total" placeholder="0.00" disabled></input></td>
                  <td><button class="btn" style="height:35px;font-size:0.78em;border:1px solid green;" type="submit" id="add_cart" ><i class="fa fa-shopping-cart"></i>&nbsp;Add To Cart</button></td><tr>
                  </form>
    <?php
                }
              }
            }
          }
        }
      }

  ?>

  </tbody>
</table>
     </div>
   </div>
</div>

</div>

<div id="footers">
  
  <div class="container-fluid text-center copyrights">

    <div class="col-md-6 col-md-offset-5">
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
<script type="text/javascript" src="js/bsootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/nivo-lightbox.js"></script> 
<script type="text/javascript" src="js/jquery.isotope.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/mainquery.js"></script> 
</body>
</html>