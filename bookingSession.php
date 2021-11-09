<?php
    // Start a session
    session_start();
    
    // Check current $_SESSION - Testing purpose
    var_dump($_SESSION);
    
    // Reset the $_SESSION["bookingSummary"] everytime the bookingSession.php is loaded
    if (!isset($_SESSION["bookingSummary"]) || isset($_SESSION["bookingSummary"])) {
        $_SESSION["bookingSummary"] = "";
    }
    
    // Get the content of cars.json
    $carsJSON = file_get_contents("cars.json");
    // Decode the content of cars.json ($carJSON) and store into an associative array
    $carsArray = json_decode($carsJSON, true);
    
    if (isset($_POST)) {
        $carImage = "";
        $totalPrice = 0;
        
        foreach ($_POST as $rentalDaysId => $rentalDays) {
            // Get car ID
            $carId = substr($rentalDaysId, -1);
            
            // Get car model
            $carModel = $carsArray["cars"][$carId]["model"];
            // Get car brand
            $carBrand = $carsArray["cars"][$carId]["brand"];
            // Get car model year
            $carModelYear = $carsArray["cars"][$carId]["model_year"];
            // Get car price per day
            $carPrice = $carsArray["cars"][$carId]["price_per_day"];
            
            //$totalPrice += ($carsArray["cars"][$carId]["price_per_day"] * $rentalDays);
            $totalPrice += ($carPrice * $rentalDays);
            
            // Store the path of selected car to $carImage
            if ($carModel == "Cherokee" || $carModel == "GLC" || $carModel == "Golf") {
                $carImage = "<img src='Images/Car/" . $carModel . ".png'></img>";
            }
            else {
                $carImage = "<img src='Images/Car/" . $carModel . ".jpg'></img>";
            }
            
            $carInfo = $carModelYear . "-" . $carBrand . "-" . "$carModel";
            
            // $_SESSION["summaryRow"] to store the display content of the selected/added car in the table
            $_SESSION["summaryRow"] = "<tr><td>" . $carImage . "</td><td>" . $carInfo . "</td><td>" . $carPrice . "</td><td>" . $rentalDays . "</td></tr>";
            
            $_SESSION["bookingSummary"] .= $_SESSION["summaryRow"];
        }
        
        // Set $_SESSION to store the total price of the booking
        $_SESSION["totalPrice"] = $totalPrice;
    }
?>

