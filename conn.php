<?php
	session_start();
	$conn=mysqli_connect('localhost','root','') or die ("can't connect to locahost or connection lose");
	$db=mysqli_select_db($conn,'earchieve') or die("can't connect to table");
?>