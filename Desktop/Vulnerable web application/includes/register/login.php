<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "myapp";


	$conn = new mysqli($host, $user, $pass, $db);
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

//$url="http://localhost/myapp3/includes/register/login.php?url=https://www.facebook.com/groups/hamlazot.tiyulim";
if (isset($_GET['url']))
{	
	//$redirect_url=$_GET['url'];
	//header("Location: " . $redirect_url);
header("Location: {$_GET['url']}");
	
}	
else {}	
	



if ($_POST) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$user = mysqli_fetch_assoc($result);
	$count = mysqli_num_rows($result);
	

	if ($count > 0) {
		echo "<script>alert('YOU ARE REDIRECTED TO THE PORTAL')</script>";
		session_start();
		// Store Session Data
		$_SESSION['username'] = $user["username"];  // Initializing Session with value of PHP Variable
				if($user["isAdmin"] == 1){
				$_SESSION["user_type"] = "admin";
			   header("Location: ./admin_menu.php");
		}
		else{
			$_SESSION["user_type"] = "regular";
		header("Location: ./welcomeRegularUser.php");

}
		
	
	} else {
		echo "<script>alert('USERNAME OR PASSWORD INVALID')</script>";
	}

	mysqli_close($conn);
	
}
?>
<html dir="rtl" lang=he>

<head>
<link rel="stylesheet" type="text/css" href="../../CSS/Recommended.css" />
<link rel="stylesheet" type="text/css" href="../../CSS/project.css" />
<script src="../../JS/project.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Secular+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cookie&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8" />
  <title>login</title>
  <style>
  
body{
	text-align:right;
	font-size:15px;
	font-family:'Secular One', sans-serif;
}
.form-control{
	width:40%;
}
</style>
<header>
<!-- nav -->
<nav class="topnav" id="myTopnav">
<img class="logo float_left" src="../../img/logo/logo.jpg" height="52" width="120">
  <a href="../../index.html" class="active">דף הבית</a>
  <a href="../tripPage.html">טיולים</a>
  <a href="../tips.html">טיפים</a>
  <a href="../blogPage.html">בלוגים</a>
  <a href="http://192.168.13.1/myapp3/includes/our_recommend2.php?TEMPLATE=our_recommend.html">המומלצים שלנו</a>
  <a class="no" href="#" title="לא פעיל">גלריה</a>
    <a href="login.php">התחברות</a>
  <a href="register.php">הרשמה</a>
  <a href="../mycomments.php">השארת תגובה</a>

  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="Menu()">&#9776;</a> 
</nav>
<!-- nav -->
</header>

<body>
<br>

	<h1  style="margin:2%">התחברות - O.C.O</h1>
	<form  style="margin:2%" method="POST" action="login.php">
		<div class="form-group">
			<label for="Username">שם משתמש</label>
			<input type="text" class="form-control" id="Username" aria-describedby="Username" placeholder="הכנס שם משתמש" name="username" required>
			<small id="emailHelp" class="form-text text-muted">לא נחלוק את פרטייך עם אף אחד.</small>
		</div>
		<div class="form-group">
			<label for="Password">ססמא</label>
			<input type="password" class="form-control" id="Password" placeholder="הכנס ססמא" name="password" required>
		</div>
		<a href="./register.php">אין לך חשבון ?</a><br><br>
		<button type="submit" style="font-size:15px" class="btn btn-primary">התחבר</button>
	</form>
	
	
<!--form  action="http://localhost/myapp3/includes/register/login.php?url=https://www.facebook.com/groups/hamlazot.tiyulim" method="GET">
    <input onclick="windows.location.href = 'http://localhost/myapp3/includes/register/login.php';" type="submit" value="Go to our Facebook" />
</form>-->
	

<a style = "margin-right:2% " href="login.php?url=https://www.facebook.com/groups/hamlazot.tiyulim/">Our Facebook account </a>
	
</body>


<!-- Footer -->
<footer style= "margin-top:10%;" class="footer">
 <!--/.container--> 
        <div class="container">
		   <!--/.row--> 
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-4">
                    <h1> O.C.O - manage your trip </h1>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-4">
                    <h5 style="margin-right:10%"> צור קשר </h5>
                    <ul>
                        <li><a class="email" href="mailto: o.c.o@gmail.com "> o.c.o@gmail.com </a></li>
                        <br>
                        <li> <p> כתובת המשרד: שינקין 49, ת"א </p> </li>
                     </ul>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-4">
                    <ul>
                        <li> <h5 class="my_h5_footer"><a href="#" class="no" title=" לא פעיל"> תקנון האתר</a> </h5></li>
                        <li> <h5 class="my_h5_footer"><a href="#" class="no" title=" לא פעיל"> דרושים</a> </h5></li>
						<li> <h5><a href="https://chat.whatsapp.com/In4v4McQ6ot800SMXDtz1d" target="_blank"  title="צור קשר עם מטיילים נוספים">קבוצת המטיילים שלנו בווצאפ </a>  </h5></li>
                    </ul>
                </div>         
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>               
<!-- Copyright -->	
 <div class="footer-bottom">
    <div class="container">
    <p> This site was built and designed by Or | Carmit | Orel ©</p>      
    </div>
</div>
<!-- Copyright -->	
</footer>
<!-- Footer -->

</html>
