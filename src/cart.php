
<!-- allows the user to remove items from the cart -->
<?php

session_start();
$status = "";

if (isset($_POST['action']) && $_POST['action'] == "remove") {
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($_POST["toy_id"] == $value['toy_id']) {
                unset($_SESSION["shopping_cart"][$key]);
                $status = "<div class='message' style='color:red;'>
                    Product is removed from your cart!</div>";
            }
            if (empty($_SESSION["shopping_cart"])) {
                unset($_SESSION["shopping_cart"]);
            }
        }
    }
}
//updates the quantity
if (isset($_POST['action']) && $_POST['action'] == "change") {
    foreach ($_SESSION["shopping_cart"] as &$value) {
        if ($value['toy_id'] === $_POST["toy_id"]) {
            $value['toy_quantity'] = $_POST["toy_quantity"];
            $status = "<div class='message' style='color:green;'>
                Product quantity updated in your cart!</div>";
            break; // Stop the loop after we've found the product
        }
    }
}

// if (isset($_POST['action']) && $_POST['action'] == "checkout") {
//   // Insert data into the orderitems table
//   $order_id = 1;
//   foreach ($_SESSION["shopping_cart"] as $product) {
//       $toy_id = $product["toy_id"];
//       $toy_quantity = $product["toy_quantity"];
//       $toy_name = $product["toy_name"];

//       $insertItem = "INSERT INTO orderitems (order_id, toy_id, toy_name, toy_quantity) 
//                       VALUES (:order_id, :toy_id, :toy_name, :toy_quantity)";
//      $insertItem = $conn->prepare($insertItem);
//      $insertItem->bindParam(':order_id', $order_id);
//      $insertItem->bindParam(':toy_id', $toy_id);
//      $insertItem->bindParam(':toy_name', $toy_name);
//      $insertItem->bindParam(':toy_quantity', $toy_quantity);
//      $insertItem->execute();
//   }

 

//   echo "<h3>Data was entered into the database</h3>";

// }
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
    <link rel="stylesheet" href="../src/styles/cart.css" />
    <link rel="stylesheet" href="../src/styles/navbar.css" />
    
    <!--End of stylesheet-->
    <title>Cart</title>
</head>
<body style="background-color: snow;">
<!-- Code for the navigation bar -->
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

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<!-- Table to display the items in the shopping cart -->
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
	<td> </td>
<td><?php echo $product["toy_name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='toy_id' value="<?php echo $product["toy_id"]; ?>" />
<input type='hidden' name='action' value="remove" />
<br />
<button type='submit' class='remove btn btn-danger my_button bi bi-trash'> Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='toy_id' value="<?php echo $product["toy_id"]; ?>" />
<input type='hidden' name='action' value="change" />
<!--allows user to pick the amount (with a limit of 8) of each product that they would like to purchase.
This, connects to the quantity, and sets the quatity as the number selected-->
<select name='toy_quantity' onchange="this.form.submit()">
<option <?php if($product["toy_quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["toy_quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["toy_quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["toy_quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["toy_quantity"]==5) echo "selected";?> value="5">5</option>
<option <?php if($product["toy_quantity"]==6) echo "selected";?> value="6">6</option>
<option <?php if($product["toy_quantity"]==7) echo "selected";?> value="7">7</option>
<option <?php if($product["toy_quantity"]==8) echo "selected";?> value="8">8</option>
</select>
</form>
</td>
<!-- shows the price of the toy after it has been multiplied by the quantiity-->
<td><?php echo "$".$product["toy_price"]; ?></td>
<td><?php echo "$".$product["toy_price"]*$product["toy_quantity"]; ?></td>
</tr>
<!-- displays the total price with all of the products added up -->
<?php
$total_price += ($product["toy_price"]*$product["toy_quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>
<div class="container-fluid center">
<a href="../src/checkout.php" ><button class="btn btn-success">Proceed to Payment</button></a>
</div>
<br />
<div style="clear:both;"></div>
<!-- shows messages for remove or updated quantity in the cart-->
<div class="message_box" style="text-align:center">
<?php echo $status; ?>
</div>


 <!-- Javascript import with popper for dropdowns-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>