  <?php
  define("DB_SERVER","");
  define("DB_USER","");
  define("DB_PASS","");
  define("DB_NAME","");
  
  //1. create a database connection
  $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  //Test if connection was successful or not
  if(mysqli_connect_errno()){
    die("Database connection failed: ".mysqli_connect_error()
	."(".mysqli_connect_errno().")"
	);  
  }
  ?>
