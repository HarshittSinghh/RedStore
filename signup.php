<?php
$host = 'localhost';
$username = 'root'; // Replace with your actual username
$password = ''; // Replace with your actual password
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
    

    // Check if the email already exists in the database
    $sqlCheckValue = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sqlCheckValue);

    if ($result->num_rows > 0) {
        // The email already exists in the database
        $exist = true;
    } else{
        // The email does not exist in the database
        $exist = false;

        // Insert the form data into the 'users' table if the email doesn't exist
        $sql = "INSERT INTO users (firstname, lastname, email, password, cpassword) VALUES ('$firstname', '$lastname', '$email' ,'$password', '$cpassword')";
        $result = $conn->query($sql);
        if($result){
            $showAlert = true;
        } else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();

?>


<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="IMG/logo-white.png" width="100%">
    <title>Red Store</title>
    <link rel="icon" href="IMG/logo-white.png" width="100%">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="icon-nav">
        <div class="icon-nav-bar">    
              <a href="#"><i class="fa fa-home" style="font-size:36px" title="Home"></i></a>
              <a href="#"><i class="fa fa-search" style="font-size:36px" title="Search"></i></a>
              <a href="#"><i class="fa fa-shopping-cart" style="font-size:36px"  title="Cart"></i></a>
              <a href="#"><i class="material-icons" style="font-size:36px"  title="More">more</i></a>
        </div>
    </div>
    
    <div class="header" id="header">
    <div class="container">
        <div class="side-nav">
                    <!--SideNav Bar-->
            <div class="sidenav" id="mySidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="index.html">Home</a>
            <div class="sign-in" id="signin">
                 <a href="login.php" onclick="openform()">Login</a>
            </div>
            </div>
    <div id="main">
    <span style="font-size:40px;cursor: pointer;" onclick="openNav()" id="open">&#9776;</span>
    </div>
        <div class="logo"> <img src="IMG/logo.png" width="125px"></div>
        </div>
        
        <!-Navbar-->
	   <div class="navbar">
            <div class="logo"> <img src="IMG/logo.png" width="125px"></div>
		<nav>
           <ul>
			<li><a href="index.html">Home</a></li>
            <div class="sign-in" id="signin">
                 <a href="login.php">Login</a>
            </div>
            </ul>
		</nav>
         </div>
        <div class="popup">
            <?php
        if($showError)
         echo '<div style="background-color:#e6939b;padding:20px;color:red;"><b style="color:red;">Error!</b> Please Enter your details again.</div>';
        
        if($showAlert){
            echo '<div style=" background-color:lightgreen;padding:20px;color:green;"><b style="color:green;">Sucess!</b> You are set to login.</div>';
        }
    ?>
        </div>
        </div>
        <div class="signup">
            <div class="img-part">
                <img src="IMG/image1.png" width="500px">
            </div>
            <div class="form-part">
                
                <form method="post">
            
                    <input type="text" placeholder="First Name" class="text" required name="firstname" max-length="25"><br><br>

                    <input type="text" placeholder="Last Name" required class="text" name="lastname" max-length="25"><br><br>

                    <input type="email" placeholder="Enter your Email" required class="text" name="email"><br><br>

                    <input type="password" placeholder="Enter your Password" required class="text" max-length="25" name="password"><br><br>

                    <input type="password" placeholder="Enter your Password" required class="text" max-length="25" name="cpassword"><br><br>

                    <input type="submit" value="SigUp" >    <input type="reset" value="Reset"><br><br> 
                    <a href="login.php" style="text-decoration:underline;color:#fff;font-size:15px;">Click here to Login</a>
                </form>
            </div>
        </div>
        <br><br><br><br><br><br>
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