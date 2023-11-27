<?php

session_start();
include('db.php');
$status="";
if (isset($_POST['toy_id']) && $_POST['toy_id']!=""){
$code = $_POST['toy_id'];
$result = mysqli_query($con,"SELECT * FROM `toys` WHERE `toy_id`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['toy_name'];
$code = $row['toy_id'];
$price = $row['toy_price'];


$cartArray = array(
	$code=>array(
	'toy_name'=>$name,
	'toy_id'=>$code,
	'toy_price'=>$price,
	'toy_quantity'=>1)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Documentation for Bootstrap 5, adds css and javascript to webpage-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> 
    <!--End of imports-->
    <!--Stylesheets-->
    <link rel="stylesheet" href="../src/styles/navbar.css" />
    <link rel="stylesheet" href="../src/styles/product.css" />
    <!--End of stylesheet-->
    <title>Legos</title>
</head>
<body style="background-color: snow;">
<nav class="navbar navbar-expand-md navbar-light ">
        <div class="container-fluid">
            <a id="navbar-brand" href="../src/index.html">Toy Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNav">
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="collapseNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Toys</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../src/toyHome.html">All Toys</a></li>
                    <li><a class="dropdown-item" href="../src/lego.php">Legos</a></li>
                    <li><a class="dropdown-item" href="../src/nerf.php">Nerf</a></li>
                    <li><a class="dropdown-item" href="../src/hotwheels.php">Hot Wheels</a></li>
                    <li><a class="dropdown-item" href="../src/marvel.php">Marvel</a></li>
                  </ul>
                  </li>
                <li class="nav-item"><a class="nav-link" href="../src/games.php">Games</a></li>
                <li class="nav-item d-md-none"><a class="nav-link" href="../src/cart.php">Cart</a></li>
                <li class="nav-item d-md-none"><a class="nav-link" href="../src/login.html">My Account</a></li>
                <li class="nav-item"><a class="nav-link" href="../src/contactPage.html">Contact Us</a></li> 
                <a type="button" class="btn d-none d-md-block" href="../src/cart.php"><span class="bi bi-cart-fill"></span></a>
                <a type="button" class="btn d-none d-md-block" href="../src/login.html"><span class="bi bi-person-fill"></span></a>
                </ul>
                <!--Search Bar Code, not working <form class="d-flex input-group w-auto d-none d-lg-block">
                  <input 
                    type="search"
                    class="form-control rounded"
                    placeholder="Search"
                    aria-label="Search"
                    aria-describedby="search-addon" />
                  <span class="input-group-text border-0" id="search-addon">
                  <i class="fas fa-search"></i>
                  </span>
                </form> -->
          </div>
        </div>
    </nav>


    <div class="container">
    <div class="row">

<?php


$result = mysqli_query($con,"SELECT * FROM `toys` WHERE `toy_brand` = 'Marvel' ");
while($row = mysqli_fetch_assoc($result)){
		echo "
     
    <div class='col-md-3 mt-2' style='padding:2%;'>
   
    <div class='card card-style h-100'>
		
			  <form method='post' action=''>
			  <input type='hidden' name='toy_id' value=".$row['toy_id']." />
			 
			 <div class='card-body'>
			  <div class='card-title'>".$row['toy_name']."</div>
        <div class = 'card-text'> ".$row['toy_description']."</div>
		   	  <div class='card-text'>$".$row['toy_price']."</div>

        <br />
			  <button type='submit' class='btn btn-primary'>Add to Cart</button>
			  </form>
		   	  </div>
			  </div>
			  </div>
    ";
        }
mysqli_close($con);
?>
</div>
    </div>
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


 <!-- Javascript import with popper for dropdowns-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>