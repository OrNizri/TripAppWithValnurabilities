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
  $handle= fopen ("blogPage.html", "a");
  fwrite ($handle, "<b>" . $name . "</b>:<br/>" . $comment . "<br/>");
  fclose ($handle);

  $sql = "INSERT INTO comments(name,comment) VALUES ('$name','$comment')";

  if ($conn->query($sql) == FALSE) {
    echo "Can not continue.  Error is: " . $conn->error;
    exit();
  }
  
  if(isset($_POST['submit_image']))
	{
		for($i=0;$i<count($_FILES["upload_file"]["name"]);$i++) {
		$uploadfile=$_FILES["upload_file"]["tmp_name"][$i];
		$folder="images/";
		move_uploaded_file($_FILES["upload_file"]["tmp_name"][$i], "$folder".$_FILES["upload_file"]["name"][$i]);
	}
	echo "הקובץ הועלה בהצלחה לאתרנו!!";
	echo "בעוד חמש שניות תועבר בחזרה לדף הבית";
	header("refresh:5;url=http://localhost/myapp/index.html" );

		exit();
		
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




</head>
<body>
<!-- class="container">
  <h1>טופס הרשמה - O.C.O</h1>
  <form method="POST" action="register.php">
    <div class="form-group">
      <label for="Input1">שם משתמש</label>
      <input type="text" class="form-control" id="Input1" aria-describedby="Input1" placeholder="הכנס שם משתשמש" name="username" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="text" class="form-control" id="Email1" aria-describedby="emailHelp" placeholder="הכנס כתובת מייל" name="email" required>
    </div>
    <div class="form-group">
      <label for="Password1">Password</label>
      <input type="password" class="form-control" id="Password1" placeholder="הכנס ססמא" name="password" required>
    </div>
    <a href="./login.php">כבר רשום ? </a><br><br>
    <button type="submit" class="btn btn-primary">הרשם</button>
  </form>-->
</body>

</html>