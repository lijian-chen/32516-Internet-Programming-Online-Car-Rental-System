<?php
    // Start a session
    session_start();
    
    $message = "";
    $totalPriceMessage = "";
    
    // Message to show after redirected to the booking page
    if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["email"]) && isset($_POST["paymentType"])) {
        $message = "Dear <I>" . $_POST["firstName"] . " " . $_POST["lastName"] . "</I>, thanks for your booking! Your booking information has sent to " . $_POST["email"] . "<br /><br /> Please see your booking summary below. Click <a href='index.php'>here</a> go back to the home page.";
        
        if (isset($_SESSION["totalPrice"])) {
            $totalPriceMessage = "<h4 class='text-right'>Total price of the booking: $" . $_SESSION["totalPrice"] . "</h4>";
        }
    }
    else {
        $message = "Sorry, something went wrong. If you had made a booking, please contact us as soon as possible.";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hertz-UTS Car Booking - Lijian Chen</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
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
                    <h2 class="text-center">Booking</h2>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row pt-1">
                <div class="col-12">
                    <h3 class="text-center">
                        <?php
                            echo $message;
                        ?>
                    </h3>
                </div>
            </div>
        </div>
        
        <!-- Booking Summary Table -->
        <div class="container">
            <table class="table table-hover">
                <thead class="thead-light text-center">
                    <tr>
                        <th>Thumbnail</th>
                        <th>Vehicle</th>
                        <th>Price Per Day</th>
                        <th>Rental Days</th>
                    </tr>
                </thead>
                
                <tbody class="text-center">
                    <?php
                        // Check if $_SESSION["bookingSummary"] is set
                        if (isset($_SESSION["bookingSummary"])) {
                            echo $_SESSION["bookingSummary"];
                        }
                    ?>
                </tbody>
            </table>
            
            <div class="row pt-1">
                <div class="col-12">
                    <?php
                        echo $totalPriceMessage;
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    // Destory the session
    session_destroy();
?>

