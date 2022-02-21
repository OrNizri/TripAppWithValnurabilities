<?php

?>
<!DOCTYPE html>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter">
<link rel="stylesheet" type="text/css" href="stylesheets/stylesheet.css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="js/html5.js"></script>

<title>DNS look up </title>

</head>

<body>

<div id="main">

    <h1>DNS look up</h1>

    <form method="POST">
        <p>
        <label for="target">DNS lookup:</label>
        <input type="text" id="target" name="target" value="www.XXX.com">
        <button type="submit" name="form" value="submit">Lookup</button>
        </p>
    </form>
	<?php
    if(isset($_POST["target"]))
    {
        $target = $_POST["target"];
        if($target == "")
        {
            echo "<font color=\"red\">Enter a domain name...</font>";
        }
        else
        {
            echo "<p align=\"left\">".shell_exec("nslookup ".$target)."</p>";
        }
    }
    ?>
</div>
</body>
</html>