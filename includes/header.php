<?php
	session_start();
	$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Bookstore Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>

<header class="p-3 text-bg-dark fixed-top">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index.php" class="px-2 btn <?php echo ($current_page == 'index.php') ? 'btn-info' : 'btn-outline-info'; ?>">Home</a></li>

                <?php if (isset($_SESSION['client']['status'])): ?>
                    <li><a href="cart.php" class="nav-link px-2 <?php echo ($current_page == 'cart.php') ? 'text-warning' : 'text-white'; ?>">Cart</a></li>
                    <li><a href="profile.php" class="nav-link px-2 <?php echo ($current_page == 'profile.php') ? 'text-warning' : 'text-white'; ?>">Profile</a></li>
                    <li><a href="user_support.php" class="nav-link px-2 <?php echo ($current_page == 'user_support.php') ? 'text-warning' : 'text-white'; ?>">Support</a></li>
                    <li><a href="my_orders.php" class="nav-link px-2 <?php echo ($current_page == 'my_orders.php') ? 'text-warning' : 'text-white'; ?>">My orders</a></li>
                <?php endif; ?>

                <li><a href="book_list.php" class="nav-link px-2 <?php echo ($current_page == 'book_list.php') ? 'text-warning' : 'text-white'; ?>">List</a></li>
                <li><a href="about.php" class="nav-link px-2 <?php echo ($current_page == 'about.php') ? 'text-warning' : 'text-white'; ?>">About</a></li>
            </ul>

            <!-- Search Form -->
            <form method="GET" action="search.php" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 d-flex align-items-center" role="search">
                <input type="text" name="search" class="form-control form-control-dark text-bg-dark me-2">
                <button type="submit" class="btn btn-outline-info">Search</button>
            </form>

            <!-- Auth Buttons -->
            <div class="text-end">
                <?php if (isset($_SESSION['client']['status'])): ?>
                    <a href="logout.php"><button type="button" class="btn btn-outline-info me-2">Sign out</button></a>
                <?php else: ?>
                    <a href="login.php"><button type="button" class="btn btn-outline-info me-2">Sign in</button></a>
                    <a href="register.php"><button type="button" class="btn btn-warning">Sign up</button></a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</header>