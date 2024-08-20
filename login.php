<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Treasure Of Maker</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
     <video autoplay loop muted plays-inline class="back-video">
       <source src="craft.mp4" type="video/mp4">
     </video>
      <div class="full-page">
        <div class="navbar">
            <nav>
                <img src="img/logo.png" class="logo">
                <ul id='MenuItems'>
                    <li><a href="login.php">Home</a></li>
                    <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login</button></li>
                    <li><a href='gallery.php'>Gallery</a></li>
                    <li><a href='about.php'>About Us</a></li>
                    <li><a href='index.php'>Admin</a></li>
                </ul>
            </nav>
        </div>
        <div class="content">
            <center><h1>The Treasure Of Maker..!!</h1></center>
            <center><p1><h4>All Craft Supplies Under One Roof</center></h4></p1>
        </div>
        <div id='login-form' class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button' onclick='login()' class='toggle-btn'>Log In</button>
                    <button type='button' onclick='register()' class='toggle-btn'>Register</button>
                </div>
                <!-- <form action="insert.php" method="post"> -->
                <form id='login' action="insert.php" method="POST" class='input-group-login'>
                    <input type='text' class='input-field' name="name" placeholder='Username' required >
		            <input type='password' class='input-field' name="cpass" placeholder='Enter Password' required>
		            <br><br>
                    <a href="welcome.php" button type='submit' class='submit-btn'>Log in</a></button><br><br>

		 </form>
         
		 <form id='register' action="insert.php" method="POST" class='input-group-register'>
                     <input type='text' class='input-field' name= "name" placeholder='Username' required>
                     <input type='email' class='input-field' name="email" placeholder='Email Id' required>
                     <input type='number' class='input-field' name="mob" placeholder='Mobile No' required>
                     <input type='password' class='input-field' name="pass" placeholder='Enter Password' required>
		             <input type='password' class='input-field' name="cpass" placeholder='Confirm Password'  required>
                     <br><br>
                     <center><button type='submit' name="submit" class='submit-btn'>Register</button></center>
	         </form>
            </div>
        </div>
    </div>
    <script>
        var x=document.getElementById('login');
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>
	<script>
        var modal = document.getElementById('login-form');
        window.onclick = function(event) 
        {
            if (event.target == modal) 
            {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>