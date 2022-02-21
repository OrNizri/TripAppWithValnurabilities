<html>
<head>
<title>תגובות</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-3.2.1.min.js"></script>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../CSS/project.css" />
<script src="../JS/project.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Secular+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cookie&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<style>
body{
    font-family:'Secular One', sans-serif;
}
</style>
</head>
<header>
<!-- nav -->
<nav class="topnav" id="myTopnav">
<img class="logo float_left" src="../img/logo/logo.jpg" height="52" width="120">
  <a href="../index.html" class="active">דף הבית</a>
  <a href="tripPage.html">טיולים</a>
  <a href="tips.html">טיפים</a>
  <a href="blogPage.html">בלוגים</a>
  <a href="http://192.168.13.1/myapp3/includes/our_recommend2.php?TEMPLATE=our_recommend.html">המומלצים שלנו</a>
  <a class="no" href="#" title="לא פעיל">גלריה</a>
    <a href="../includes/register/login.php">התחברות</a>
  <a href="../includes/register/register.php">הרשמה</a>
  <a href="mycomments.php">השארת תגובה</a>

  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="Menu()">&#9776;</a> 
</nav>
<!-- nav -->
</header>
<!-- header -->


<?php

session_start();
if (!isset($_SESSION['username'])) {
	header("Location: register/login.php");
}

error_reporting(0);

?>

<body style="	font-size:16px;">
	<div class="demo-container">
		<form action=" " id="frmComment" method="post">
		<div class="row">
				<label> תעודת זהות: </label> <span id="name-info"></span><input class="form-field" id="name"
					type="text" name="id"> 
			</div>
			
			<div class="row">
				<label> שם: </label> <span id="name-info"></span><input class="form-field" id="name"
					type="text" name="name"> 
			</div>
			<div class="row">
				<label for="mesg"> תגובה : <span id="message-info"></span></label>
				<textarea class="form-field" id="message" name="comment" rows="4"></textarea>
			</div>
			<div class="row">
				<input type="hidden" name="add" value="post" />
				<button type="submit" name="submit" id="submit" class="btn-add-comment">הוסף תגובה</button>
				<img src="LoaderIcon.gif" id="loader" />
			</div>
		</form>
<?php
include_once 'comments.php';

$sql_sel = "SELECT * FROM comments ORDER BY id DESC";
$result = $conn->query($sql_sel);
$count = $result->num_rows;

    if($count > 0) {
?>
        <div id="comment-count">
        <span id="count-number"><?php echo $count;?></span> Comment(s)
        </div>
<?php } ?>
		<div id="response">
<?php
while ($row = $result->fetch_array(MYSQLI_ASSOC)) // using prepared staement
{
?>
			<div id="comment-<?php echo $row["id"];?>" class="comment-row">
				<div class="comment-user"><?php echo $row["name"];?></div>
				<div class="comment-msg" id="msgdiv-<?php echo $row["id"];?>"><?php echo $row["comment"];?></div>
			<?php
			if ($_SESSION["user_type"] == "admin"){
?>
				<div class="delete" name="delete"
					id="delete-<?php echo $row["id"];?>"
					onclick="deletecomment(<?php echo $row["id"];?>)">מחק</div>
			
			<?php 
}
?>
</div>
<?php 
}
?>
		</div>
	</div>

	<script type="text/javascript"></script>
	<script>

    function deletecomment(id) {

       if(confirm("בטוח שתרצה למחוק את התגובה?")) {

            $.ajax({
            url: "comment-delete.php",
            type: "POST",
            data: 'comment_id='+id,
            success: function(data){
                if (data)
                {
                    $("#comment-"+id).remove();
                    if($("#count-number").length > 0) {
                        var currentCount = parseInt($("#count-number").text());
                        var newCount = currentCount - 1;
                        $("#count-number").text(newCount)
                    }
                }
            }
           });
        }
     }

	$(document).ready(function() {

        $("#frmComment").on("submit", function(e) {
        		$(".error").text("");
            $('#name-info').removeClass("error");
            $('#message-info').removeClass("error");
            e.preventDefault();
            var name = $('#name').val();
            var message = $('#message').val();
            
            if(name == ""){
            		$('#name-info').addClass("error");
            }
            if(message == ""){
            		$('#message-info').addClass("error");
            }
            $(".error").text("required");
            if(name && message){
                	$("#loader").show();
            		$("#submit").hide();
            	 	$.ajax({
                
                 type:'POST',
                 url: 'comments.php',
                 data: $(this).serialize(),
                 success: function(response)
                    {
						$("#frmComment input").val("");
						$("#frmComment textarea").val("");
                     	$('#response').prepend(response);

                         if($("#count-number").length > 0) {
                             var currentCount = parseInt($("#count-number").text());
                             var newCount = currentCount + 1;
                             $("#count-number").text(newCount)
                         }
                         $("#loader").hide();
                 		$("#submit").show();
                     }
                	});
			}
		});
     });
    </script>
</body>

<!-- Footer -->
<footer class="footer">
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
						<li> <h5><a href="https://chat.whatsapp.com/In4v4McQ6ot800SMXDtz1d" title="צור קשר עם מטיילים נוספים">קבוצת המטיילים שלנו בווצאפ </a>  </h5></li>
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
</html>