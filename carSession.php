<?php
    // Start a session
    session_start();
    
    // Check current $_SESSION - Testing purpose
    var_dump($_SESSION);
    
    // Get the content of cars.json
    $carsJSON = file_get_contents("cars.json");
    // Decode the content of cars.json ($carJSON) and store into an associative array
    $carsArray = json_decode($carsJSON, true);
    
    // Check if $_POST["carId"] is set
    if (isset($_POST["carId"])) {
        $carId = $_POST["carId"];
        echo $carId;
        
        // Get car model by car ID ($_POST["carId"])
        $carModel = $carsArray["cars"][$carId]["model"];
        // Get car brand by car ID ($_POST["carId"])
        $carBrand = $carsArray["cars"][$carId]["brand"];
        // Get car model year by car ID ($_POST["carId"])
        $carModelYear = $carsArray["cars"][$carId]["model_year"];
        // Get car price per day by car ID ($_POST["carId"])
        $carPrice = $carsArray["cars"][$carId]["price_per_day"];
        
        // Set the $_SESSION["carId"] to store the ID of selected car
        $_SESSION["carId"] = $carId;
        
        // Set the $_SESSION["carImage"] to store the path of selected car
        if ($carModel == "Cherokee" || $carModel == "GLC" || $carModel == "Golf") {
            $_SESSION["carImage"] = "<img src='Images/Car/" . $carModel . ".png'></img>";
        }
        else {
            $_SESSION["carImage"] = "<img src='Images/Car/" . $carModel . ".jpg'></img>";
        }
        
        // Set the $_SESSION["carModel"] to store the model of selected car
        $_SESSION["carModel"] = $carModel;
        
        // Set the $_SESSION["carInfo"] to store the model year, brand and model of the selected car
        $_SESSION["carInfo"] = $carModelYear . "-" . $carBrand . "-" . "$carModel";
        
        // Set the $_SESSION["carPrice"] to store the car price per day of the selected car
        $_SESSION["carPrice"] = $carPrice;
        
        if (!isset($_SESSION["totalPrice"])) {
            $_SESSION["totalPrice"] = 0;
        }
    }
    
    // Check if $_SESSION["carId"], $_SESSION["carImage"], $_SESSION["carInfo"], $_SESSION["carModel"] and $_SESSION["carPrice"] are all set
    if (isset($_SESSION["carId"]) && isset($_SESSION["carImage"]) && isset($_SESSION["carInfo"]) && isset($_SESSION["carModel"]) && isset($_SESSION["carPrice"])) {
        // Set the $_SESSION["carRow"] to store the display content of the selected/added car in the table
        $_SESSION["carRow"] = "<tr id='carId_" . $_SESSION["carId"] . "'><td>" . $_SESSION["carImage"] . "</td><td>" . $_SESSION["carInfo"] . "</td><td>" . $_SESSION["carPrice"] . "</td><td><input type='number' id='rentalDaysId_" . $_SESSION["carId"] . "' value='1' min='1' required/></td><td><button class='btn-danger' onclick='removeFromCart(" . $_SESSION["carId"] . ")'>Delete</button></td></tr>";
    }
    
    // Check if $_SESSION["carRow"] is set
    if (isset($_SESSION["carRow"])) {
        // Check if $_SESSION["carCart"] is set
        if (!isset($_SESSION["carCart"])) {
            // Create $_SESSION["carCart"] as an associative array and store the value of $_SESSION["carRow"] with the key $_SESSION["carId"]
            $_SESSION["carCart"] = array($_SESSION["carId"] => $_SESSION["carRow"]);
        }
        else {
            // When $_SESSION["carCart"] is already set, check if it already has the key $_SESSION["carId"]
            if (array_key_exists($_SESSION["carId"], $_SESSION["carCart"]) == false) {
                // Store the value of $_SESSION["carRow"] with the key $_SESSION["carId"]
                $_SESSION["carCart"][$_SESSION["carId"]] = $_SESSION["carRow"];
            }
        }
        
        // Unset $_SESSION["carRow"] after it stored into $_SESSION["carCart"]
        unset($_SESSION["carRow"]);
        
        // Do so if there is any car has been removed
        if (isset($_POST["removedCarId"]) && isset($_SESSION["carCart"])) {
            // Remove the deleted car from $_SESSION["carCart"]
            unset($_SESSION["carCart"][$_POST["removedCarId"]]);
            
            // Unset $_SESSION["bookingSummary"] if it is set
            if (isset($_SESSION["bookingSummary"])) {
                unset($_SESSION["bookingSummary"]);
            }
        }
        
        // Check the size of $_SESSION["carCart"]
        if (count($_SESSION["carCart"]) == 0) {
            // Destory the session if $_SESSION["carCart"] is empty
            session_destroy();
        }
    }
?>

