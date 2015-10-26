<?php
/**
 * User: ln1878
 * Date: 10/25/2015
 * Time: 16:49:14 pm
 * @ Galvin Library 2 FL
 * 
 */

session_start(); ?>

<!DOCTYPE HTML>
<html lang="en">

<style>
.lay_content {
    background-image: url("bg.png");
    background-size: 1878px 1245px;
    background-color: black;
 	font-style: oblique;
    padding: 20px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 10px;
}
.left_side {
	margin-left: 20px;
	width: 98%;
    border:1px solid #00FF00;
}
</style>

<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
	<div class = "lay_content" align = "center" >
		<font color = "#FFFFFF"><h1> ITMO 544 MP-1 Y.Z. </h1></font>
	</div>
</head>

<body background = "bg.png">

<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="result.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="userfile" type="file" /><br />
Enter Email of user: <input type="email" name="useremail"><br />
Enter Phone of user (1-XXX-XXX-XXXX): <input type="phone" name="phone">


<input type="submit" value="Send File" />
</form>
<hr />
<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="gallery.php" method="POST">
    
Enter Email of user for gallery to browse: <input type="email" name="email">
<input type="submit" value="Load Gallery" />
</form>


</body>
</html>



