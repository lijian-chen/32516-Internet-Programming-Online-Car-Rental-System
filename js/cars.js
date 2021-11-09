/*global $*/
// Global variable - Array to store available cars
var availableCars = new Array();

$(document).ready(function() {
    // Hide the checkout button if the car cart in reservation.php is empty
    if ($("#carCart").children().length == 0) {
        $("#checkoutButton").hide();
    } else {
        $("#checkoutButton").show();
    }
    
    // Get all cars from cars.json and show on the home page
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var carsJSON = JSON.parse(this.responseText);
            showCars(carsJSON);
        }
    };
    xmlhttp.open("GET", "cars.json", true);
    xmlhttp.send();
});

// Show all cars on the home page
function showCars(cars) {
    for (var index = 0; index < cars.cars.length; index++) {
        var id = (index + 1).toString();
        var carId = "#car_" + id;
        var carInfoId = "#car_info_" + id;
        
        $(carId).text(cars.cars[index].brand + "-" + cars.cars[index].model + "-" + (cars.cars[index].model_year).toString());
        
        var availability;
        // Add the car into the availability array if it is available
        if (cars.cars[index].availability == true) {
            availability = "Yes";
            availableCars.push(index);
        } else {
            availability = "No";
        }
        var carInfo = "<b>Mileage: </b>" + cars.cars[index].mileage + " kms<br/><b>Fuel type: </b>" + cars.cars[index].fuel_type + "<br /><b>Price per day: </b>$" + cars.cars[index].price_per_day + "<br /><b>Availability: </b>" + availability + "<br /><b>Description: </b>" + cars.cars[index].description;
        // Write carInfo on the home page
        $(carInfoId).html(carInfo);
    }
}

// Add selected to car cart (Car Reservation)
function addToCart(id) {
    $(document).ready(function() {
        // Check car availability before add into the car cart
        if (availableCars.includes(id)) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Alert user if selected car added to car cart successfully
                    alert("Add to cart successfully.");
                    console.log("Added car ID: " + this.responseText);
                }
            };
            xmlhttp.open("POST", "carSession.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("carId=" + id.toString());
        } else {
            // Alert user if selected car is not available
            alert("Sorry, the car is not available. Please try with other cars.");
        }
    });
}

// Remove selected car from car cart
function removeFromCart(id) {
    $(document).ready(function() {
        var carCartRowId = "#carId_" + id;
        // Remove the row of selected car from the table
        $(carCartRowId).remove();
        
        // Send (POST) the removed car ID to carSession.php
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Removed car ID: " + this.responseText);
            }
        };
        xmlhttp.open("POST", "carSession.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("removedCarId=" + id.toString());
    });
}

// Check car cart before move on to booking
function checkCarCart() {
    var allCarsRentalDays = "";
    var rentalDaysValueChecker = true;
    
    // Check if car cart is empty
    if ($("#carCart").children().length == 0) {
        alert("Please add car(s) before proceeding to checkout.");
        return false;
    } else {
        $("#carCart").find("input").each(function() {
            // Check if the value of rental days is greater than or equal to 1
            if ($(this).val() >= 1) {
                allCarsRentalDays += $(this).attr("id") + "=" + $(this).val() + "&";
            } else {
                rentalDaysValueChecker = false;
            }
        });
        
        // Remove the last "&" from the string before sending it to bookingSession.php
        allCarsRentalDays = allCarsRentalDays.substring(0, allCarsRentalDays.length - 1);
        
        // Check if any rental days value is invalid
        if (rentalDaysValueChecker) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("All cars rental days: " + this.responseText);
                }
            };
            xmlhttp.open("POST", "bookingSession.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(allCarsRentalDays);
            
            return true;
        } else {
            alert("Sorry, car rental days cannot be less than 1 day. Please check again.");
            return false;
        }
    }
}

