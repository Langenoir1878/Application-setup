<?php 

/*
 * Gallery displaying the pictures
 * Yiming Zhang
 *
 */

//echo "gallery";
?>
<!DOCTYPE html>
<style>
.lay_content {
    background-image: url("bg.png");
    background-size: 1878px 1245px;
    background-color: black;
 	font-style: oblique;
    padding: 187px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 10px;
}
</style>

<html lang="en">
<head><title>Gallery</title>
<br>
<h1><font color = "#00FF00"> &nbsp; Image Gallery</font></h1>
<br><br>
</head>
<body class="lay_content">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<p><font color ="white"><h3 align = "center">php code to display images from s3 bucket goes here














</h3></font></p>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div align = "center">
<br><font color = "#00FF00"><?php
    //displaying the time
    date_default_timezone_set('America/Chicago');
            $myDate = date('j M Y - h:i:s A');
    
            print "CURRENT TIME: ". $myDate. " | EpochSeconds";
    ?></font>
    <br><br>
</div>
</body>
</html>



