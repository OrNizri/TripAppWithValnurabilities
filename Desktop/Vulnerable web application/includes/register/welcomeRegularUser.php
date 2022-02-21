<!DOCTYPE html>
<html dir="rtl" lang=he>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="https://fonts.googleapis.com/css?family=Secular+One&display=swap" rel="stylesheet">
	<title>Welcome!</title>
	
<style>
body{
	text-align:center;
	font-family:'Secular One', sans-serif;
}
</style>

</head>

<?php
session_start();

if (isset($_SESSION['username'])) {
} else {
    header("Location:./login.php");
}

?>
<body>
    <h1>ברוכים הבאים  
<?php
		echo " ".$_SESSION["username"];
	?>
	</h1>
    <h2> שמחות לארח אותך באתר שלנו ומבטיחות לך חוויה מדהימה ! </h2>
	<br><br>
	<a href="../../index.html">לדף הבית</a><br><br>
	<a href="./logout.php">התנתק/י</a>
	
</body>

</html>

