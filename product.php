<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
  <style>
    .social-part .fa {
      padding-right: 20px;
    }
    ul li a {
      margin-right: 20px;
    }
    img {
      height: 600px;
    }
    
    body {
      font-family: Arial
    }
    body {
      background-color: #eee;
    }
    .add {
      border-radius: 20px;
    }
    .card {
      border: 20px;
      border-radius: 20px;
      transition: all 1s;
      cursor: pointer;
    }
    .ratings i {
      color: green;
    }
  </style>
</head>
<body>
  <?php include "nav.php"; ?>
  <div class="">
    <div class="content-wrap">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12">
          </div>
        </div>
        <div class="row">
    <?php 
        // Include the database connection
        include "config/conn.php"; 

        // Check if the category parameter is set in the URL
        if(isset($_GET["category"])){
            // Retrieve the category ID from the URL
            $category = mysqli_real_escape_string($conn, $_GET["category"]);

            // Construct the SQL query
            $sql = "SELECT p.`id`, p.`image`, c.`category` AS `category`, p.`price`, p.`quantity`, p.`status`
            FROM `product_tbl` AS p 
            JOIN `category_tbl` AS c ON p.`category` = c.`id` 
            WHERE p.`category` = $category";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if there are any results
            if(mysqli_num_rows($result) > 0){
                // Loop through each row and display product information
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card mb-4">
                            <img src="config/uploads/<?php echo $row['image']; ?>" class="card-img-top" alt="Product Image" style="height:300px; width:300px;">
                            <div class="card-body">
                                <h5 class="card-title">Category: <?php echo $category; ?></h5>
                                <div class="card-text"><span class="text-dark">₱  </span><span class="text-primary"><?php echo $row['price'];?></span></div>
                                <div class="card-text"><span class="text-dark">Available : </span><span class="text-primary"><?php echo $row['quantity'];?></span></div>
                                <div class="card-text"><span class="text-dark">Status now : </span><span class="text-primary"><?php echo ($row['status'] == 1) ? "available" : "not available";?></span></div>
                                <a href="login.php" class="btn btn-primary w-100">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            } else {
                echo "No products found for the specified category.";
            }
        } else {
            echo "Category parameter is missing in the URL.";
        }
    ?>
</div>

      </div>
    </div>
  </div>
  <?php include "footer.php"; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
