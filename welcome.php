<?php
 session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
    header("login.php");
    exit;
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="IMG/logo-white.png" width="100%">
	<title>Red Store</title>
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="icon-nav">
        <div class="icon-nav-bar">    
              <a href="welcome.php"><i class="fa fa-home" style="font-size:36px" title="Home"></i></a>
              <a href=""><i class="fa fa-search" style="font-size:36px" title="Search"></i></a>
              <a href=""><i class="fa fa-shopping-cart" style="font-size:36px"  title="Cart" opencart()></i></a>
              <a href="#"><i class="material-icons" style="font-size:36px"  title="More">more</i></a>
        </div>
    </div>
    
    <div class="header" id="header">
    <div class="container">
        <div class="side-nav">
                    <!--SideNav Bar-->
            <div class="sidenav" id="mySidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="welcome.php">Home</a>
			     <a href="product.php">Product</a>
			     <a href="">Contact</a>

                <a href=""><span style="color:#ff523b;font-size:17px;"><b>Logout:</b></span></a>


                <a href="" class="side-name">
                    Hi!&nbsp;<span style="color:#ff523b;font-size:17px;"><b><?php echo $_POST["firstname"]; ?></b></span><br>
                </a>

                <a href="#" onclick="opencart()"><i class="fa fa-shopping-cart" style="font-size:36px"  title="Cart"></i></a>
            </div>
    <div id="main">
    <span style="font-size:40px;cursor: pointer;" onclick="openNav()" id="open">&#9776;</span>
    </div>
        <div class="logo"> <img src="IMG/logo.png" width="125px"></div>
        </div>
        
	   <div class="navbar">
		<div class="logo"> <img src="IMG/logo.png" width="125px"></div>
		<nav>
			<ul>
			<li><a href="">Home</a></li>
			<li><a href="product.php">Product</a></li>
			<li><a href="" >Contact</a></li>
			<li><a onclick="displayProfile()">Account</a></li>
                <li><a href="logout.php"><span style="color:#ff523b;font-size:17px;"><b>Logout</b></span></a></li>
            </ul>
		</nav>
            &nbsp;&nbsp;&nbsp;&nbsp;
           <img src="IMG/cart.png" width="30px" height="30px">
         </div>
        <div class="row">
        <div class="col-2">
            <h1>Give you workout!<br>A New Style.</h1><br>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.<br>when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
            <a href="" class="btn">Explore Now! &#8594;</a>
        </div>
        <div class="col-2">
            <img src="IMG/image1.png">
        </div>
        </div>
    </div>
    </div>
                        <!--------------Featured Catogries------------->
    <div class="catg">
        <div class="row-3">
            <img src="IMG/category-1.jpg">
        </div>
        <div class="row-3">
            <img src="IMG/category-2.jpg">
        </div>
        <div class="row-3">
            <img src="IMG/category-3.jpg">
        </div>
    </div><br>
    <div class="product">
        <h1><p align="center" style="border-bottom:4px solid #ff523b"><b>Featured Products</b></p></h1>
         <div class="feature">
        <div class="row-3">
            <div class="pro" openitem()>
            <img src="IMG/product-1.jpg">
            <p>Rod Printed T-Shirt</p>
            <p>Rod Printed T-Shirt</p>
            <p>Price:$50.00</p>
            </div>
        </div>
        <div class="row-3">
             <div class="pro">
            <img src="IMG/product-2.jpg">
            <p>HRX Sports Shoes</p>
            <p>Rod Printed T-Shirt</p>
            <p>Price:$75.00</p>    
            </div>
        </div>
        <div class="row-3">
            <div class="pro">
            <img src="IMG/product-3.jpg">
            <p>HRX Grey Trackpant</p>
            <p>Rod Printed T-Shirt</p>
            <p>Price:$45.00</p>
            </div>
        </div>
        <div class="row-3">
             <div class="pro">
            <img src="IMG/product-4.jpg">
            <p>Blue Printed T-Shirt</p>
            <p>Rod Printed T-Shirt</p>
            <p>Price:$55.00</p>
            </div>
        </div>
    </div>
    </div>
    
     <div class="product">
        <h1><p align="center" style="border-bottom:4px solid #ff523b"><b>Latest Products</b></p></h1>
         <div class="feature">
        <div class="row-3">
            <div class="pro">
            <img src="IMG/product-5.jpg">
            <p>HRX White Shoes</p>
                        <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            </div>
            <p>Price:$50.00</p>
            </div>
        </div>
        <div class="row-3">
             <div class="pro">
            <img src="IMG/product-6.jpg">
            <p>Black Puma T-Shirt</p>
            <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>Price:$75.00</p>    
            </div>
        </div>
        <div class="row-3">
            <div class="pro">
            <img src="IMG/product-7.jpg">
            <p>HRX Socks</p>
             <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>Price:$45.00</p>
            </div>
        </div>
        <div class="row-3">
             <div class="pro">
            <img src="IMG/product-8.jpg">
            <p>Titan Black Watch</p>
             <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>Price:$255.00</p>
            </div>
        </div>
        </div>
         
        <div class="feature">
        <div class="row-3">
            <div class="pro">
            <img src="IMG/product-9.jpg">
            <p>Timex Watch</p>
             <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>Price:$110.00</p>
            </div>
        </div>
        <div class="row-3">
             <div class="pro">
            <img src="IMG/product-10.jpg">
            <p>HRX Sports Shoes</p>
             <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            </div>
            <p>Price:$275.00</p>    
            </div>
        </div>
        <div class="row-3">
            <div class="pro">
            <img src="IMG/product-11.jpg">
            <p>HRX Grey Shoes</p>
             <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>Price:$145.00</p>
            </div>
        </div>
        <div class="row-3">
             <div class="pro">
            <img src="IMG/product-12.jpg">
            <p>Black Trackpant</p>
            <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>Price:$65.00</p>
            </div>
        </div>
    </div>
    </div>
   
    <div class="exclusive">
    <div class="row">
         <div class="col-2">
            <img src="IMG/exclusive.png">
        </div>
        <div class="col-2">
            <p>Exclusively Available on RedStore</p>
            <h1>Smart Band 4</h1><br>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <a href="" class="btn">Buy Now &#8594;</a>
        </div>
        </div>
    </div>
    
    <div class="testimonial">
        <div class="container">
            <img src="IMG/user-1.png" alt="Avatar" style="width:90px"><br>
            <p><span>Chris Fox.</span> </p><br>
            <p> CEO at Mighty Schools.</p><br>
            <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
            </div><br>
            <p align="center">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        </div>

        <div class="container">
            <img src="IMG/user-2.png" alt="Avatar" style="width:90px"><br>
            <p><span >Rebecca Flex.</span></p><br>
            <p> CEO at Company.</p><br>
            <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
            </div><br>
            <p align="center">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
        <div class="container">
             <img src="IMG/user-3.png" alt="Avatar" style="width:90px"><br>
             <p><span >Emma Eva.</span> </p><br>
             <p>CTO at Company.</p><br>
            <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            </div><br>
             <p align="center">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
    </div>
    
    <div class="img-footer">
        <img src="IMG/logo-coca-cola.png">
        <img src="IMG/logo-godrej.png">
        <img src="IMG/logo-oppo.png">
        <img src="IMG/logo-paypal.png">
        <img src="IMG/logo-philips.png">
    </div>
    
    <div class="Profile" id="profile">
    <span style="font-size: 30px;margin-left:90%;cursor: pointer;color:#000;" onclick="closeProfile()">&times;</span>
    
    <p align="center"><img src="IMG/logo.png"></p><br>
    
    <p align="center" style="font-size:25px;"> Hello!&nbsp;<b style="color:coral;"><?php echo isset($_SESSION["firstname"]) ? $_SESSION["firstname"] : 'Guest'; ?></b></p><br>
    
    <p align="center" style="font-size:20px;">Welcome to your Account Section</p><br>
    <p align="center"><img src="IMG/person-1.png"></p>
    <p align="center" style="font-size:20px;">First Name: <?php echo isset($_SESSION["firstname"]) ? $_SESSION["firstname"] : 'Not provided'; ?></p>
    <p align="center" style="font-size:20px;">Last Name: <?php echo isset($_SESSION["lastname"]) ? $_SESSION["lastname"] : 'Not provided'; ?></p>
    <p align="center" style="font-size:20px;">Email: <?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : 'Not provided'; ?></p><br>
</div>

    
<div class="cart" id="cart">
            <span style="font-size:30px;margin-left:50%;cursor: pointer;" onclick="closecart()">&times;</span><br><br>
            <h3>Welcome to Cart Section</h3><br><br><br><br><br><br>
            <i class="fa fa-warning" style="font-size:48px;color:red"></i><br>
            <p>No items found.</p><br><br><br><br><br><br>
            <a href="product.html" >Add Products</a>
        </div>
    
        <div class="openItems" id="openDetails"><br>
            <div class="items-pic">
                <img src="img/gallery-1.jpg" width="410px" class="main" id="main"><br>
                <img src="img/gallery-1.jpg" width="100px" class="side" onclick="change1()">
                <img src="img/gallery-2.jpg" width="100px" class="side" onclick="change2()">
                <img src="img/gallery-3.jpg" width="100px" class="side" onclick="change3()">
                <img src="img/gallery-4.jpg" width="100px" class="side" onclick="change4()">
            </div>
            <br><br><br><br>
            <div class="items-text">
                <h2>Rod Printed T-Shirt by HRX</h2><br>
                <h2>$50.00</h2><br>
            <form>
                <select class="select" required>
                <option>Select Size</option>
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
                <option>XXL</option>
                </select><br>
                <br>
                <input type="number" class="select" min="0" style="width:35px;" required>
                &nbsp;&nbsp;&nbsp;
                <input type="submit" value="Add To Cart" style="width:105px;border-radius:30px;">
            </form><br>
                <h3>Product Details</h3><br><br>
                <p style="width:500px;">Give your summer wardrobe a style upgrade with HRX Men's Active T-Shirt. Team it with a pair of shorts for your morning workout or a denims for an evening out the the guys.</p>
            </div>
            <span style="font-size:30px;margin-left:10%;cursor: pointer;" onclick="closeItems()">&times;</span><br><br>
        </div>
    
   <footer>
       <p align="center"><img src="IMG/logo-white.png"><br><br>
        <h2><p align="center"><span style="color:red;">&copy;RED</span> STORE</p></h2>
    </footer>
    
    <script>
        function openitem(){
            document.getElementById('openDetails').style.visibility="visible";
          }
        function closeItems(){
              document.getElementById('openDetails').style.visibility="hidden";
        }
          function opencart(){
            document.getElementById('cart').style.display="block";
            document.getElementById('header').style.filter="blur(3px)";
          }
        function closecart(){
            document.getElementById('cart').style.display="none";
            document.getElementById('header').style.filter="blur(0px)";
            }
        function openform(){
            document.getElementById('input').style.display="block";
        }
        function closeform(){
            document.getElementById('input').style.display="none";
        }
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
        function displayProfile(){
             document.getElementById('profile').style.display="block";
        }
        function closeProfile(){
             document.getElementById('profile').style.display="none";
        }
    </script>
</body>
</html>