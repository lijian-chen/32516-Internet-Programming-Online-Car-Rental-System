<?php
    // Start a session
    session_start();
    
    //var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hertz-UTS Car Checkout - Lijian Chen</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    <h2 class="text-center">Checkout</h2>
                </div>
            </div>
        </div>
        
        <!-- Booking Form -->
        <div class="container">
            <h4>Customer Details and Payment</h4>
            <h5>Please fill in your details (<span style="color: red;">*</span> indicates required field)</h5>
            
            <form method="POST" action="booking.php">
                <div class="form-group row">
                    <label class="col-2" for="firstName">First Name<span style="color: red;"><b>*</b></span></label>
                    <input class="col-10" type="text" name="firstName" id="firstName" required/>
                </div>
                
                <div class="form-group row">
                    <label class="col-2" for="lastName">Last Name<span style="color: red;"><b>*</b></span></label>
                    <input class="col-10" type="text" name="lastName" id="lastName" required/>
                </div>
                
                <div class="form-group row">
                    <label class="col-2" for="email">Email<span style="color: red;"><b>*</b></span></label>
                    <input class="col-10" type="email" name="email" id="email" required/>
                </div>
                
                <div class="form-group row">
                    <label class="col-2" for="addressLine1">Address Line 1<span style="color: red;"><b>*</b></span></label>
                    <input class="col-10" type="text" name="addressLine1" id="addressLine1" required/>
                </div>
                
                <div class="form-group row">
                    <label class="col-2" for="addressLine2">Address Line 2</label>
                    <input class="col-10" type="text" name="addressLine2" id="addressLine2"/>
                </div>
                
                <div class="form-group row">
                    <label class="col-2" for="city">City<span style="color: red;"><b>*</b></span></label>
                    <input class="col-10" type="text" name="city" id="city" required/>
                </div>
                
                <div class="form-group row">
                    <label class="col-2" for="state">State<span style="color: red;"><b>*</b></span></label>
                    <select class="form-control col-10" name="state" id="state" required>
                        <option>New South Wales</option>
                        <option>Queensland</option>
                        <option>Northern Territory</option>
                        <option>Western Australia</option>
                        <option>South Australia</option>
                        <option>Victoria</option>
                        <option>Australian Capital Territory</option>
                        <option>Tasmania</option>
                    </select>
                </div>
                
                <div class="form-group row">
                    <label class="col-2" for="postcode">Postcode<span style="color: red;"><b>*</b></span></label>
                    <input class="col-10" type="text" name="postcode" id="postcode" required/>
                </div>
                
                <div class="form-group row">
                    <label class="col-2" for="paymentType">Payment Type<span style="color: red;"><b>*</b></span></label>
                    <select class="form-control col-10" name="paymentType" id="paymentType" required>
                        <option>VISA</option>
                        <option>Master</option>
                        <option>American Express</option>
                        <option>BPAY</option>
                        <option>PayPal</option>
                    </select>
                </div>
                
                <div class="row pt-1">
                    <div class="col-12">
                        <h4>Your are required to pay $
                            <?php
                                if (isset($_SESSION["totalPrice"])) {
                                    echo $_SESSION["totalPrice"];
                                }
                            ?>
                        </h4>
                    </div>
                </div>
                
                <div class="col-12 text-right">
                    <a href="reservation.php" class="btn btn-warning btn-lg" role="button" style="text-decoration: none;">
                        Continue Selection
                    </a>
                    
                    <button class="btn btn-success btn-lg" type="submit">Booking</button>
                </div>
            </form>
        </div>
    </body>
</html>

