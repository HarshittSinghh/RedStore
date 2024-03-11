<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'redstore';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

$login = false;
$showError = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST["email"];
    $enteredPassword = $_POST["password"];

    $sql = "Select * from users where email ='$email' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header("location:welcome.php");
        } else {
            $showError = "Invalid Password";
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
                 <a href="signup.php" >SignUp</a>
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
                 <a href="signup.php" onclick="openform()">SignUp</a>
            </div>
            </ul>
		</nav>
         </div>
        <div class="popup">
            <?php
            if($showError)
                echo '<div style="background-color:#e6939b;padding:20px;color:red;"><b style="color:red;">Error!</b> User not found.Please signup first</div>';
            ?>
        </div>
    <div class="signup">
            <div class="img-part">
                <img src="IMG/image1.png" width="500px">
            </div>
            <div class="form-part">
                <form action="welcome.php">
                    <input type="email" placeholder="Email*" name="email" class="text" required><br><br>
                    <input type="password" placeholder="Password*" name="password" class="text" required><br><br>
                    <input type="submit" value="Login">
                    <a href="signup.php" style="text-decoration:underline;font-size:15px;color:#fff;"><br><br>Click here to Signup</a>
                </form>
                </div>
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