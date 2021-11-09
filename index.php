<!DOCTYPE html>
<html>
    <head>
        <title>Hertz-UTS Car Rental - Lijian Chen</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/cars.js"></script>
        
        <style type="text/css">
            img {
                width: 240px;
                height: 180px;
            }
        </style>
    </head>
    
    <body style="background-color: white;">
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
                
                <div class="col-3">
                    <!-- Redirect to Car Reservation (Car Cart) -->
                    <a href="reservation.php" class="btn-primary btn-lg float-right" role="button" style="text-decoration: none;">
                        Car Reservation
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Display cars -->
        <div class="container" id="cars">
            <div class="row">
                <div class="col-3">
                    <img src="Images/Car/320i.jpg" alt="320i Car Image"></img>
                    <h4 id="car_1"></h4>
                    <p id="car_info_1"></p>
                    <button class="btn-primary" onclick="addToCart(0)">Add to Cart</button>
                </div>
                
                <div class="col-3">
                    <img src="Images/Car/Camry.jpg" alt="Camry Car Image"></img>
                    <h4 id="car_2"></h4>
                    <p id="car_info_2"></p>
                    <button class="btn-primary" onclick="addToCart(1)">Add to Cart</button>
                </div>
                
                <div class="col-3">
                    <img src="Images/Car/Captiva.jpg" alt="Captiva Car Image"></img>
                    <h4 id="car_3"></h4>
                    <p id="car_info_3"></p>
                    <button class="btn-primary" onclick="addToCart(2)">Add to Cart</button>
                </div>
                
                <div class="col-3">
                    <img src="Images/Car/Cherokee.png" alt="Cherokee Car Image"></img>
                    <h4 id="car_4"></h4>
                    <p id="car_info_4"></p>
                    <button class="btn-primary" onclick="addToCart(3)">Add to Cart</button>
                </div>
            </div>
            
            <div class="row">
                <div class="col-3">
                    <img src="Images/Car/Civic.jpg" alt="Civiv Car Image"></img>
                    <h4 id="car_5"></h4>
                    <p id="car_info_5"></p>
                    <button class="btn-primary" onclick="addToCart(4)">Add to Cart</button>
                </div>
                
                <div class="col-3">
                    <img src="Images/Car/GLC.png" alt="GLC Car Image"></img>
                    <h4 id="car_6"></h4>
                    <p id="car_info_6"></p>
                    <button class="btn-primary" onclick="addToCart(5)">Add to Cart</button>
                </div>
                
                <div class="col-3">
                    <img src="Images/Car/Golf.png" alt="Golf Car Image"></img>
                    <h4 id="car_7"></h4>
                    <p id="car_info_7"></p>
                    <button class="btn-primary" onclick="addToCart(6)">Add to Cart</button>
                </div>
                
                <div class="col-3">
                    <img src="Images/Car/Jimny.jpg" alt="Jimny Car Image"></img>
                    <h4 id="car_8"></h4>
                    <p id="car_info_8"></p>
                    <button class="btn-primary" onclick="addToCart(7)">Add to Cart</button>
                </div>
            </div>
            
            <div class="row">
                <div class="col-3">
                    <img src="Images/Car/Sonata.jpg" alt="Sonata Car Image"></img>
                    <h4 id="car_9"></h4>
                    <p id="car_info_9"></p>
                    <button class="btn-primary" onclick="addToCart(8)">Add to Cart</button>
                </div>
                
                <div class="col-3">
                    <img src="Images/Car/X-Trail.jpg" alt="X-Trail Car Image"></img>
                    <h4 id="car_10"></h4>
                    <p id="car_info_10"></p>
                    <button class="btn-primary" onclick="addToCart(9)">Add to Cart</button>
                </div>
            </div>
        </div>
    </body>
</html>

