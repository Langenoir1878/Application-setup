<?php
/**
 * User: ln1878
 * Date: 10/25/2015
 * Time: 16:49:14 pm
 * @ Galvin Library 2 FL
 * 
 */

session_start(); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<style>
.lay_content {
    background-image: url("bg.png");
    background-size: 1200px 571px;
    background-color: black;
 	font-style: oblique;
    padding: 187px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 10px;
}
.left_side {
    margin-left: 10px;
    width: 98%;
    border:1px solid #00FF00;
}

</style>

<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title>Index</title>
</head>

<body>
<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
    <div class = "lay_content" align = "center" >
        <font color = "#FFFFFF"><h1> ITMO 544 MP-1 Y.Z. </h1></font>
    </div>
    <div class = "left_side">
<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="result.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    <!-- Name of input element determines name in $_FILES array -->
    <br><br><font color = "white">
    Send this file: </font><input name="userfile" type="file" /><br />
    <br><br><font color = "white">
Enter Email of user: </font><input type="email" name="useremail"><br />
	<br><br><font color = "white">
Enter Phone of user (1-XXX-XXX-XXXX): </font><input type="phone" name="phone">


<input type="submit" value="Send File" />
<br><br><br>
</form>
<hr />
<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="gallery.php" method="POST">
  
  <br><font color = "white">  
Enter Email of user for gallery to browse: </font><input type="email" name="email">
<input type="submit" value="Load Gallery" />

<br><br><br><br>
<div align = "center">
<br><font color = "#00FF00"><?php
    //displaying the time
    date_default_timezone_set('America/Chicago');
            $myDate = date('j M Y - h:i:s A');
    
            print "CURRENT TIME: ". $myDate. " | EpochSeconds";
    ?></font>
    <br><br>
</div>
</form>

</div>
<br><br><br><br>
</body>
</html>



