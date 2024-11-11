<?php
$host = 'localhost';
$username = 'root';
$password = ''; 
$database = 'redstore';

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$showAlert = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    // Check if passwords match
    if ($password !== $cpassword) {
        $showError = "Passwords do not match!";
    } else {
        // Check if the email already exists in the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // The email already exists
            $showError = "Email already registered!";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            
            // Insert the user into the database
            $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $firstname, $lastname, $email, $hashedPassword);
            
            if ($stmt->execute()) {
                $showAlert = "Registration successful!";
            } else {
                $showError = "Error: " . $stmt->error;
            }
        }
        
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="IMG/logo-white.png" width="100%">
    <title>Red Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="icon-nav">
        <div class="icon-nav-bar">
            <a href="#"><i class="fa fa-home" style="font-size:36px" title="Home"></i></a>
            <a href="#"><i class="fa fa-search" style="font-size:36px" title="Search"></i></a>
            <a href="#"><i class="fa fa-shopping-cart" style="font-size:36px" title="Cart"></i></a>
            <a href="#"><i class="material-icons" style="font-size:36px" title="More">more</i></a>
        </div>
    </div>

    <div class="header" id="header">
        <div class="container">
            <!-- Navigation and SideNav omitted for brevity -->
            <div class="popup">
                <?php if($showError) echo '<div style="background-color:#e6939b;padding:20px;color:red;">Error: ' . $showError . '</div>'; ?>
                <?php if($showAlert) echo '<div style="background-color:lightgreen;padding:20px;color:green;">Success! ' . $showAlert . '</div>'; ?>
            </div>
        </div>
        <div class="signup">
            <div class="img-part">
                <img src="IMG/image1.png" width="500px">
            </div>
            <div class="form-part">
                <form method="post">
                    <input type="text" placeholder="First Name" required name="firstname" max-length="25"><br><br>
                    <input type="text" placeholder="Last Name" required name="lastname" max-length="25"><br><br>
                    <input type="email" placeholder="Enter your Email" required name="email"><br><br>
                    <input type="password" placeholder="Enter your Password" required max-length="25" name="password"><br><br>
                    <input type="password" placeholder="Confirm your Password" required max-length="25" name="cpassword"><br><br>
                    <input type="submit" value="SignUp">
                    <input type="reset" value="Reset"><br><br>
                    <a href="login.php" style="text-decoration:underline;color:#fff;font-size:15px;">Click here to Login</a>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <p align="center"><img src="IMG/logo-white.png"><br><br>
        <h2><p align="center"><span style="color:red;">&copy;RED</span> STORE</p></h2>
    </footer>

    <script>
        function openNav(){
            document.getElementById('mySidenav').style.width="250px";
            document.getElementById('main').style.marginLeft="250px";
            document.getElementById('open').style.display="none";
        }
        function closeNav(){
            document.getElementById('mySidenav').style.width="0";
            document.getElementById('main').style.marginLeft="0";   
            document.getElementById('open').style.display="block";
        }
    </script>
</body>
</html>
