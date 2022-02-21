<!DOCTYPE html>

<html dir= "rtl" lang=he>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" type="text/css" href="../CSS/project.css" />
<link rel="stylesheet" type="text/css" href="../CSS/tripPage.css" />

<script src="../JS/tripPage.js"></script>
<script src="../JS/project.js"></script>

<title>
 O.C.O בחירת טיול 
</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Secular+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cookie&display=swap" rel="stylesheet">

<style>
body{
text-align:right;
font-family:'Secular One', sans-serif;
}
</style>

</head>

<!-- body -->
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($conn, "SELECT  name, id, selections_travel,tel,email,people FROM peopleregister");

while($row = mysqli_fetch_array($result))
{
        echo "<br> תעודת זהות: ". $row["id"]. "<br>שם: ". $row["name"]. "<br>קוד טיול:" . $row["selections_travel"] ."<br>טלפון: " . $row["tel"] ."<br>אימייל: " . $row["email"] . "<br> כמות אנשים:". $row["people"]."<br>";
}

mysqli_close($con);
?>
</body>
</html>
