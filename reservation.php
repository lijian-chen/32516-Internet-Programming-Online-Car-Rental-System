<?php
    // Start a session
    session_start();
    
    //var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hertz-UTS Car Reservation - Lijian Chen</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/cars.js"></script>
        
        <style type="text/css">
            img {
               width: 180px; 
               height: 120px;
            }
        </style>
    </head>
    
    <body>
        <div class="container">
            <div class="row pt-1">
                <div class="col-3">
                    <!-- Clickable text to redirect to the home page -->
                    <a style="text-decoration: none;" href="index.php">
                        <span style="font-size: 33px; font-family: monospace; font-weight: bold; color: orange;">
                            Hertz-UTS
                        </span>
                    </a>
                </div>
                
                <div class="col-6">
                    <h1 class="text-center">Car Rental Centre</h1>
                </div>
            </div>
            
            <div class="row pt-1">
                <div class="col-12">
                    <h2 class="text-center">Car Reservation</h2>
                </div>
            </div>
        </div>
        
        <!-- Car Cart -->
        <div class="container">
            <table class="table table-hover">
                <thead class="thead-light text-center">
                    <tr>
                        <th>Thumbnail</th>
                        <th>Vehicle</th>
                        <th>Price Per Day</th>
                        <th>Rental Days</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody class="text-center" id="carCart">
                    <?php
                        // Check if $_SESSION["carCart"] is set
                        if (isset($_SESSION["carCart"])) {
                            // Loop through $_SESSION["carCart"] and display the content row by row in the table
                            foreach ($_SESSION["carCart"] as $carId => $carContent) {
                                echo $carContent;
                            }
                        }
                        else {
                            // Empty car cart as $_SESSION["carCart"] is not set
                            echo "<h3 style='color: red;'><I>Car cart is empty<I></h3>";
                        }
                    ?>
                </tbody>
            </table>
            
            <div class="row pt-1">
                <div class="col-12">
                    <a href="checkout.php" class="btn-primary btn-lg float-right" id="checkoutButton" role="button" style="text-decoration: none;" onclick="return checkCarCart();">
                        Processing to Checkout
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>

