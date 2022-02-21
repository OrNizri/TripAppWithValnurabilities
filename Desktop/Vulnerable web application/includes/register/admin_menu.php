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
echo "ברוכים הבאים אדמין, ";
echo $_SESSION["username"];
echo '<br>';
echo '<h4>לניהול הנרשמים לטיולים לחץ <a href="contact.php">כאן</a></h4>';
echo '<h4>  DNS look up  <a href="../dnsLookUp.php">כאן</a></h4>';

?>
	</h1>
	<br><br>
	<a href="../../index.html">לדף הבית</a><br><br>
	<a href="./logout.php">התנתק/י</a>
	
</body>

</html>

