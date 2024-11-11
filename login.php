<?php
    session_start();

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'redstore';

    // Create a new MySQLi connection and check for connection errors
    try {
        $conn = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
    } catch (Exception $e) {
        die("Database connection error: " . $e->getMessage());
    }

    $login = false;
    $showError = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST["email"];
        $enteredPassword = $_POST["password"];

        // Prepare statement to prevent SQL Injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $enteredPassword);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $login = true;
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header("location: welcome.php");
        } else {
            $showError = "Invalid email or password.";
        }

        $stmt->close();
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Store - Login</title>
    <link rel="icon" href="IMG/logo-white.png">
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
            <div class="side-nav">
                <div class="sidenav" id="mySidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="index.html">Home</a>
                    <div class="sign-in" id="signin">
                        <a href="signup.php">SignUp</a>
                    </div>
                </div>
                <div id="main">
                    <span style="font-size:40px;cursor: pointer;" onclick="openNav()" id="open">&#9776;</span>
                </div>
                <div class="logo">
                    <img src="IMG/logo.png" width="125px">
                </div>
            </div>
            
            <div class="navbar">
                <div class="logo">
                    <img src="IMG/logo.png" width="125px">
                </div>
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <div class="sign-in" id="signin">
                            <a href="signup.php">SignUp</a>
                        </div>
                    </ul>
                </nav>
            </div>
            
            <div class="popup">
                <?php
                if ($showError) {
                    echo '<div style="background-color:#e6939b;padding:20px;color:red;"><b>Error:</b> ' . $showError . '</div>';
                }
                ?>
            </div>
            
            <div class="signup">
                <div class="img-part">
                    <img src="IMG/image1.png" width="500px">
                </div>
                <div class="form-part">
                    <form method="POST" action="">
                        <input type="email" placeholder="Email*" name="email" class="text" required><br><br>
                        <input type="password" placeholder="Password*" name="password" class="text" required><br><br>
                        <input type="submit" value="Login">
                        <a href="signup.php" style="text-decoration:underline;font-size:15px;color:#fff;"><br><br>Click here to Signup</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <p align="center"><img src="IMG/logo-white.png"><br><br></p>
        <h2 align="center"><span style="color:red;">&copy;RED</span> STORE</h2>
    </footer>
    
    <script>
        function openNav() {
            document.getElementById('mySidenav').style.width = "250px";
            document.getElementById('main').style.marginLeft = "250px";
            document.getElementById('open').style.display = "none";
        }
        function closeNav() {
            document.getElementById('mySidenav').style.width = "0";
            document.getElementById('main').style.marginLeft = "0";   
            document.getElementById('open').style.display = "block";
        }
    </script>
</body>
</html>
