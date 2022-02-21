<!DOCTYPE html>
<html dir= "rtl" lang=he>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../CSS/tripPage.css" />

<link href="https://fonts.googleapis.com/css?family=Secular+One&display=swap" rel="stylesheet">


<style>
body{
margin-right:1%;
margin-left:1%;
font-family:'Secular One', sans-serif;
}
.my_div_trip{
text-align:center;
font-family:'Secular One', sans-serif;
padding:10%;	
}
</style>


</head>
<body>
<?php

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

				$name=$_GET['name'];
				$id=$_GET['id'];
				$selections_travel=$_GET['selections_travel'];
				$tel=$_GET['phone'];	 
			 	$email=$_GET['email'];
				$people=$_GET['people'];
			
				$sql="insert into peopleregister(name, id, selections_travel, tel, email, people) values 
												('".$name."','".$id."','".$selections_travel."','".$tel."','".$email."',".$people.");";
		if ($conn->query($sql)==FALSE){
			echo "Can not add new participant.  Error is: ".
				$conn->error;
			exit();
			}
echo "<div class=\"my_div_trip\"> <h2>".$name.", פנייתך נקלטה במערכת </h2>\n
<h2>תודה שבחרת O.C.O ! </h2>\n\n
<h3>סיכום הבקשה:</h3>
<p>קוד טיול מבוקש:".$selections_travel.
"<p>מספר משתתפים:".$people.
"<ul> <h3> אמצעי התשלום שעומדים לרשותך: <h3> </ul>\n
<li> <h4>לתשלום באפליקציית ביט : 0526660124</h4></li>\n
<li><h4> לתשלום באמצעות העברה בנקאית : </h4>\n 
<p> מספר חשבון:4534 <br>\n
	מספר סניף:3423 <br>\n 
</p></li>\n 
<h3> לפני שאתם יוצאים לטיול לא לשכוח ליישם את הטיפים שלנו !  <a href=\"tips.html\"> לחץ כאן ! </a>  </h3>
 
 <br>\n*במידה והטיול בתפוסה מלאה, תזוכה ישירות לחשבון תוך 2 ימי עסקים\n </div>
"
	
	?> 


</body>
</html>
