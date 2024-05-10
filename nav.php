<style>
    .navbar {
        background-color: #333; /* Dark grey color */
    }

    .navbar-nav .nav-link {
        color: #fff; /* White color for navbar links */
    }

    .navbar-toggler-icon {
        background-color: #fff; /* White color for the toggler icon */
    }

    .dropdown-menu .dropdown-item {
        color: #000; /* Black color for dropdown items */
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #ddd; /* Light grey hover color for dropdown items */
        color: #fff; /* White text color on hover for dropdown items */
    }
</style>

<nav class="navbar navbar-expand-sm">
    <div class="container">
        <a class="navbar-brand" href="#">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item nav-active dropdown dmenu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Menu</a>
                    <div class="dropdown-menu sm-menu">
                        <?php
                        include "config/conn.php";
                        $sql = "SELECT * FROM category_tbl";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <a class="dropdown-item" href="product.php?cetegory=<?php echo $row['id'];?>"><?php echo $row['category'];?></a>
                        <?php }?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item ml-auto">
                    <div class="social-part" style="display: flex; gap: 5px;">
                        <a href="cart.php" class="btn btn-lg nav-link" style="box-shadow: none;"> My Cart </a>
                        <a class="btn btn-lg nav-link" href="login.php">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
