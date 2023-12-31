<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Documentation for Bootstrap 5, adds css and javascript to webpage-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> 
     <!--End of imports-->
    <title>Confirmation</title>
    <link rel="stylesheet" href="../src/styles/navbar.css" />
    <link rel="stylesheet" href="../src/styles/confirm.css" />
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
                    <li><a class="dropdown-item" href="../src/legos.php">Legos</a></li>
                    <li><a class="dropdown-item" href="../src/nerf.php">Nerf</a></li>
                    <li><a class="dropdown-item" href="../src/hotWheels.php">Hot Wheels</a></li>
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
    <div class="container-fluid center">
    <h3> Thank you for your order </h3>
</div>
<br />
    <div class="form-outline center" style="width: 22rem;">
    <label class="form-label" for="typeNumber">Enter the parking spot number:</label>
    <input min="1" max="10" type="number" id="typeNumber" class="form-control" />
    <br />
<a href="../src/index.html" class="btn btn-rounded btn-success">I got my order </a>
    </div>


</div>
<!-- Javascript import with popper for dropdowns-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>