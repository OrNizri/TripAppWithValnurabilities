<?php
$template = 'our_recommend.html';
if(isset($_GET['TEMPLATE'])){
	$template = $_GET['TEMPLATE'];
	include ($template);
} else {
include 'our_recommend.html';
}

 
?>