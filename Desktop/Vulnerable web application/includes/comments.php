<?php
session_start();
$SESSION['message'] = '';
$host = "localhost";
$user = "root";
$pass = "";
$db = "myapp";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!$conn->set_charset("utf8")) {
  printf("Error loading character set utf8: %s\n", $conn->error);
  exit();
}

if ($_POST) {
  $name = $_POST['name'];
  $comment = $_POST['comment'];

  $sql = "INSERT INTO comments(name,comment) VALUES ('$name','$comment')";

  if ($conn->query($sql) == FALSE) {
    echo "Can not continue.  Error is: " . $conn->error;
    exit();
  } else {
    echo "התגובה התפרסמה בהצלחה באתר!";
  }
}
?>

<html dir="rtl" lang=he>

<head>
<link href="https://fonts.googleapis.com/css?family=Secular+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8" />
  <title>register</title>
  <style>
  
body{
	text-align:right;
	font-family:'Secular One', sans-serif;
}
.form-control{
	width:40%;
}
</style>
</html>
