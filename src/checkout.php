<?php

session_start();
include('db.php');
$status="";
// if (isset($_POST['action']) && $_POST['action'] == "checkout") {
//     // Retrieve user data or session data as needed
//    // $user_id = $_SESSION["shopping_cart"];
//    // $total_price = $_POST['total_price'];

//     // // Insert data into the orders table
//     // $insertOrderQuery = "INSERT INTO orders (order_id,order_date,customer_id, total_price) VALUES (:order_id, :order_date, :customer_id, :total_price)";
//     // $orderStatement = $conn->prepare($insertOrderQuery);
//     // $orderStatement->bindParam(':order_id', $order_id);
//     // $orderStatement->bindParam(':order_date', $order_date);
//     // $orderStatement->bindParam(':customer_id', $customer_id);
//     // $orderStatement->bindParam(':total_price', $total_price);
//     // $orderStatement->execute();

//     // Retrieve the order ID from the last inserted row
//     if (isset($_POST['action']) && $_POST['action'] == "checkout") {
//         // Insert data into the orderitems table
//         foreach ($_SESSION["shopping_cart"] as $product) {
//             $toy_id = $product["toy_id"];
//             $toy_quantity = $product["toy_quantity"];
//             $toy_name = $product["toy_name"];
    
//             $insertItem = "INSERT INTO orderitems (toy_id, toy_name, toy_quantity) 
//                             VALUES (:toy_id, :toy_name, :toy_quantity)";
//             $orderItemStatement = $conn->prepare($insertItem);
//             $orderItemStatement->bindParam(':toy_id', $toy_id);
//             $orderItemStatement->bindParam(':toy_name', $toy_name);
//             $orderItemStatement->bindParam(':toy_quantity', $toy_quantity);
//             $orderItemStatement->execute();
//         }
    
//         // Clear the shopping cart after checkout
//         unset($_SESSION["shopping_cart"]);
    
      //  echo "<h3>Data was entered into the database</h3>";

// }
// }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Documentation for Bootstrap 5, adds css and javascript to webpage-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> 
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
<script src ="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>  
<script src ="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>  
<link rel ="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
<link rel ="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css"> 
    <!--End of imports-->
    <!--Stylesheets-->
    <link rel="stylesheet" href="../src/styles/navbar.css" />
    <link rel="stylesheet" href="../src/styles/confirm.css" />
    <!--End of stylesheet-->
    <title>Home</title>
</head>
<body style="background-color: snow;">
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

</td>
<td>
<?php echo $product["toy_quantity"]; ?>

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

<div class="container">
    
<h3>Enter pickup date:</h3>
        <div class='input-group date' id='picker'>
          <input type='text' class="form-control" />
          <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>	                 </span>
        </div>
    </div>
      <script type="text/javascript">
         $(function () {
             $('#picker').datetimepicker();
         });
      </script>
      
 
   </div>
</div>

<div class="container-fluid center">
    
   <a href="confirmation.php"> <button type="submit" name="order" class="btn btn-success">Place Order</button></a>
        </div>
<!-- Javascript import with popper for dropdowns-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
