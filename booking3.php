<?php
session_start();
include('db_connect.php'); // Ensure your database connection file is correct

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    // Fetch user details from the database
    $query = "SELECT firstname, lastname, email, CUST_ADDRESS FROM user WHERE USER_ID = '$user_id'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['address'] = $row['CUST_ADDRESS'];
    } else {
        $_SESSION['address'] = ''; // Set to empty if no address found
    }
} else {
    die("User not logged in.");
}

if (isset($_POST['submit-booking'])) {
    // Sanitize input data
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $platenum = mysqli_real_escape_string($conn, $_POST['platenum']);
    $typecar = mysqli_real_escape_string($conn, $_POST['typecar']);
    $colour = mysqli_real_escape_string($conn, $_POST['colour']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time_slot = mysqli_real_escape_string($conn, $_POST['time_slot']);
    $package = mysqli_real_escape_string($conn, $_POST['packages']);
    $services = isset($_POST['services']) ? implode(', ', $_POST['services']) : '';
    $total_price = mysqli_real_escape_string($conn, $_POST['totalPrice']);
    $payment_type = mysqli_real_escape_string($conn, $_POST['payment_type']);

    // Fetch package ID
    $package_query = "SELECT PACKAGE_ID FROM package WHERE PACKAGE_ID = '$package'";
    $package_result = mysqli_query($conn, $package_query);

    if ($package_result && mysqli_num_rows($package_result) > 0) {
        $package_row = mysqli_fetch_assoc($package_result);
        $package_id = $package_row['PACKAGE_ID'];
    } else {
        die("Invalid package selected.");
    }

    // Check if the time slot is already booked by any user on the same date
    $slot_check_query = "SELECT * FROM booking WHERE BOOKING_DATE = '$date' AND TIME_SLOT = '$time_slot'";
    $slot_check_result = mysqli_query($conn, $slot_check_query);

    if (mysqli_num_rows($slot_check_result) > 0) {
        echo '<script>alert("This time slot is already booked. Please choose another time slot."); window.history.back();</script>';
    } else {
        // Insert booking
        $booking_query = "INSERT INTO booking (USER_ID, PACKAGE_ID, BOOKING_DATE, TIME_SLOT, BOOKING_STATUS) VALUES 
                  ('$user_id', '$package_id', '$date', '$time_slot', 'Pending')";
        
        if (mysqli_query($conn, $booking_query)) {
            $booking_id = mysqli_insert_id($conn); // Retrieve booking ID
            $_SESSION['BOOKING_ID'] = $booking_id;
            $_SESSION['PAYMENT_TOTAL_PRICE'] = $total_price;

            // Insert car
            $car_query = "INSERT INTO car (USER_ID, PLATE_NUM, TYPE, CAR_COLOR) VALUES 
                          ('$user_id', '$platenum', '$typecar', '$colour')";
            
            if (mysqli_query($conn, $car_query)) {
                // Insert sales record
                $payment_date = date('Y-m-d H:i:s');
                $sales_query = "INSERT INTO sale (TOTAL_SALES, SALES_DATE) VALUES ('$total_price', '$payment_date')";
                
                if (mysqli_query($conn, $sales_query)) {
                    $sales_id = mysqli_insert_id($conn); // Retrieve SALES_ID

                    // Insert payment record with SALES_ID
                    $payment_query = "INSERT INTO payment (BOOKING_ID, SALES_ID, PAYMENT_TYPE, PAYMENT_TOTAL_PRICE, PAYMENT_DATE) VALUES 
                                     ('$booking_id', '$sales_id', '$payment_type', '$total_price', '$payment_date')";
                    
                    if (mysqli_query($conn, $payment_query)) {
                        echo '<script>alert("Booking Successfully!"); window.location.href="view_booking.php?BOOKING_ID='.$booking_id.'";</script>';
                    } else {
                        echo "Error in payment query: " . mysqli_error($conn);
                    }

                } else {
                    echo "Error in sales query: " . mysqli_error($conn);
                }

            } else {
                echo "Error in car query: " . mysqli_error($conn);
            }
        } else {
            echo "Error in booking query: " . mysqli_error($conn);
        }
    }
}
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Booking</title>
    <!-- Include your CSS and other head elements here -->
    <link rel="stylesheet" href="booking2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="user.css">
    <style>
        .hidden { display: none; }
        .error { color: red; }
    </style>
</head>
<body>
    <!-- Sidebar and Header -->
    <header class="main-header">
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fa-solid fa-bars" id="btn"></i>
            <i class="fas fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
            <header>Welcome</header>
            <a href="user.php">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="#" class="ifactive">
                <i class="fas fa-book"></i>
                <span>Booking</span>
            </a>
            <a href="inbox2.php">
                <i class="fas fa-calendar"></i>
                <span>Inbox</span>
            </a>
            <a href="about.php">
                <i class="fas fa-question-circle"></i>
                <span>About</span>
            </a>
            <a href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
                <span>Log Out</span>
            </a>      
        </div>
    </header>

    <main>
        <script>
            let totalPrice = 0; // Price variable for DB

            // Function to enable or disable checkboxes based on the selected package
            function validateServices() {
                const packageSelected = document.querySelector('input[name="packages"]:checked');
                const checkboxes = document.querySelectorAll('input[name="services[]"]');
                const checkedCheckboxes = document.querySelectorAll('input[name="services[]"]:checked');
                const errorBox = document.getElementById("errorBox");
                const priceBox = document.getElementById("priceBox");
                const totalPriceInput = document.getElementById("totalPriceInput"); // Hidden input field

                let maxServices = 0;

                if (packageSelected) {
                    switch (packageSelected.value) {
                        case "3":
                            maxServices = 2;
                            totalPrice = 60;
                            break;
                        case "4":
                            maxServices = 4;
                            totalPrice = 120;
                            break;
                        case "5":
                            maxServices = 6;
                            totalPrice = 180;
                            selectAllServices(); // Automatically tick all services for Deluxe package
                            break;
                        default:
                            totalPrice = 0;
                    }

                    // Enable checkboxes for all packages except Deluxe
                    if (packageSelected.value !== "5") {
                        checkboxes.forEach(checkbox => {
                            checkbox.disabled = false;
                        });

                        // Check if the user selected too many services
                        if (checkedCheckboxes.length > maxServices) {
                            alert(`You can only select up to ${maxServices} services for the selected package.`);
                            return false;
                        }

                        // Disable additional checkboxes if the limit is reached
                        if (checkedCheckboxes.length >= maxServices) {
                            checkboxes.forEach(checkbox => {
                                if (!checkbox.checked) {
                                    checkbox.disabled = true;
                                }
                            });
                        } else {
                            checkboxes.forEach(checkbox => {
                                checkbox.disabled = false;
                            });
                        }
                    }

                    errorBox.textContent = "";
                    priceBox.textContent = `Total Price: RM ${totalPrice}`;
                    totalPriceInput.value = totalPrice; // Update the hidden input
                    return true;
                } else {
                    errorBox.textContent = "Please select a package first!";
                    priceBox.textContent = "";
                    totalPriceInput.value = ""; // Clear hidden input
                    return false;
                }
            }

            // Function to select all services
            function selectAllServices() {
                const checkboxes = document.querySelectorAll('input[name="services[]"]');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = true;
                    checkbox.disabled = true;
                });
            }

            // Function to validate phone number
            function validatePhoneNumber() {
                const phoneInput = document.getElementById('phone');
                const phoneError = document.getElementById('phoneError');
                const phonePattern = /^\d{10,11}$/;

                if (!phonePattern.test(phoneInput.value)) {
                    phoneError.classList.remove('hidden');
                    phoneInput.classList.add('error');
                    return false;
                } else {
                    phoneError.classList.add('hidden');
                    phoneInput.classList.remove('error');
                    return true;
                }
            }

            // Function to validate all required fields
            function validateForm() {
                const requiredFields = document.querySelectorAll('input[required], select[required]');
                let isValid = true;
                let firstInvalidField = null;

                requiredFields.forEach(field => {
                    if (!field.value) {
                        isValid = false;
                        field.classList.add('error');
                        if (!firstInvalidField) {
                            firstInvalidField = field;
                        }
                    } else {
                        field.classList.remove('error');
                    }
                });

                if (!isValid) {
                    alert("Please fill in all required fields.");
                    if (firstInvalidField) {
                        firstInvalidField.focus();
                    }
                }

                return isValid;
            }

            // Trigger validation when package or services are changed
            function setupValidation() {
                const packages = document.querySelectorAll('input[name="packages"]');
                const services = document.querySelectorAll('input[name="services[]"]');
                const form = document.getElementById('bookingForm');

                packages.forEach(pkg => pkg.addEventListener('change', validateServices));
                services.forEach(service => service.addEventListener('change', validateServices));

                // Validate phone number on input change
                document.getElementById('phone').addEventListener('input', validatePhoneNumber);

                form.addEventListener('submit', function(event) {
                    if (!validateServices() || !validateForm() || !validatePhoneNumber()) {
                        event.preventDefault();
                        alert("Please fix the errors in the form.");
                    } else {
                        // Check the selected payment method
                        // const paymentType = document.querySelector('input[name="payment_type"]:checked').value;
                        // if (paymentType === "onlineBanking") {
                        //     event.preventDefault(); // Prevent the default form submission
                        //     window.location.href = "onlineBanking.php"; // Redirect to onlineBanking.html
                        // }
                    }
                });
            }

            // Run setup when the DOM is loaded
            document.addEventListener('DOMContentLoaded', setupValidation);
        </script>

        <!-- Service Booking Form -->
        <form id="bookingForm" action="booking3.php" method="POST">
            <h2>Service Booking</h2>
            <!-- Package Selection -->
            <fieldset>
                <legend>Select Packages:</legend>
                <div class="service">
                    <label>
                        <input type="radio" id="package_standard" name="packages" value="3" required> Standard (RM 60 - 2 services)
                    </label>
                </div>
                <div class="service">
                    <label>
                        <input type="radio" id="package_premium" name="packages" value="4" required> Premium (RM 120 - 4 services)
                    </label>
                </div>
                <div class="service">
                    <label>
                        <input type="radio" id="package_deluxe" name="packages" value="5" required> Deluxe (RM 180 - 6 services)
                    </label>
                </div>
            </fieldset>

            <!-- Service Selection -->
            <fieldset>
                <legend>Select Services:</legend>
                <div class="service">
                    <label for="service_exterior">
                        <input type="checkbox" id="service_exterior" name="services[]" value="Exterior Wash"> Exterior Wash
                    </label>
                </div>
                <div class="service">
                    <label for="service_interior">
                        <input type="checkbox" id="service_interior" name="services[]" value="Interior Cleaning"> Interior Cleaning
                    </label>
                </div>
                <div class="service">
                    <label for="service_engine">
                        <input type="checkbox" id="service_engine" name="services[]" value="Engine Cleaning"> Engine Cleaning
                    </label>
                </div>
                <div class="service">
                    <label for="service_wax">
                        <input type="checkbox" id="service_wax" name="services[]" value="Wax and Polish"> Wax and Polish
                    </label>
                </div>
                <div class="service">
                    <label for="service_rim">
                        <input type="checkbox" id="service_rim" name="services[]" value="Rim Coating"> Rim Coating
                    </label>
                </div>
                <div class="service">
                    <label for="service_disinfection">
                        <input type="checkbox" id="service_disinfection" name="services[]" value="Disinfection"> Disinfection
                    </label>
                </div>
            </fieldset>

            <!-- Error and Price Display -->
            <div id="errorBox" class="error"></div>
            <div id="priceBox"></div>
            <input type="hidden" name="totalPrice" id="totalPriceInput">

            <!-- Booking Details -->
            <fieldset>
                <legend>Booking Details:</legend>
                <label for="date">Select Date:</label>
                <input type="date" id="date" name="date" required>
                <label for="time_slot">Select Time Slot:</label>
                <select id="time_slot" name="time_slot" required>
                    <option value="" disabled selected>Select a time slot</option>
                    <option value="9am-11am">9:00 AM - 11:00 AM</option>
                    <option value="12pm-2pm">12:00 PM - 2:00 PM</option>
                    <option value="3pm-6pm">3:00 PM - 6:00 PM</option>
                    <option value="7pm-9pm">7:00 PM - 9:00 PM</option>
                </select>
            </fieldset>

            <!-- Customer Details -->
            <fieldset>
                <legend>Fill In Your Details:</legend>
                <div class="form-group">
                    <label for="fullname">Name:</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" value="<?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" value="<?php echo $_SESSION['email']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required pattern="\d{10,11}">
                    <span class="error hidden" id="phoneError">Please enter a valid phone number (10-11 digits).</span>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <div class="radio-group">
                        <label for="gender_male">
                            <input type="radio" id="gender_male" name="gender" value="Male" required> Male
                        </label>
                        <label for="gender_female">
                            <input type="radio" id="gender_female" name="gender" value="Female"> Female
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Home Address:</label>
                    <input type="text" id="address" name="address" placeholder="Enter your home address"    value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?>"disabled>
                </div>
                
            </fieldset>

            <!-- Car Details -->
            <fieldset>
                <legend>Fill In Your Car Details:</legend>
                <div class="form-group">
                    <label for="platenum">Plate Number:</label>
                    <input type="text" id="platenum" name="platenum" placeholder="Enter your plate number" required>
                </div>
                <label>Type:</label>
                <div class="form-group">
                    <div class="radio-group">
                        <label for="car_type_sedan">
                            <input type="radio" id="car_type_sedan" name="typecar" value="Sedan" required> Sedan
                        </label>
                        <label for="car_type_mpv">
                            <input type="radio" id="car_type_mpv" name="typecar" value="MPV"> MPV
                        </label>
                        <label for="car_type_hatchback">
                            <input type="radio" id="car_type_hatchback" name="typecar" value="Hatchback"> Hatchback
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="colour">Car Colour:</label>
                    <input type="text" id="colour" name="colour" placeholder="Enter your car colour" required>
                </div>
            </fieldset>

            <!-- Payment Details -->
            <fieldset>
                <legend>Select Payment Method:</legend>
                <div class="form-group">
                    <div class="payment-method">
                        <label>
                            <input type="radio" name="payment_type" value="onlineBanking" required> 
                            Online Banking
                        </label>
                        <label>
                            <input type="radio" name="payment_type" value="creditCard" required> 
                            Credit Card
                        </label>
                    </div>
                </div>
            </fieldset>

            <button type="submit" name="submit-booking">Proceed Payment</button>
        </form>
    </main>
</body>
</html>