<?php


/*
 * Cited from https://github.com/jhajek/itmo-544-444-fall2015/blob/master/result.php
 * Oct 25th, 2015
 * Yiming Zhang
 * ITMO 544 MP 1
 * updated passwords & username
 * Nov 4, 2015
 */



// Start the session
session_start();
// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.
echo $_POST['useremail'];
$uploaddir = '/tmp/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
$fname = $_FILES['userfile']['name'];
echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}
echo 'Here is some more debugging info:';
print_r($_FILES);
print "</pre>";

require 'vendor/autoload.php';

#use Aws\S3\S3Client;
#$client = S3Client::factory();

$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-east-1'
]);

$bucket = uniqid("ln1878bucket-",false);

#$result = $client->createBucket(array(
#    'Bucket' => $bucket
#));
# AWS PHP SDK version 3 create bucket
$result = $s3->createBucket([
    'ACL' => 'public-read',
    'Bucket' => $bucket
]);

#$client->waitUntilBucketExists(array('Bucket' => $bucket));
#Old PHP SDK version 2
#$key = $uploadfile;
#$result = $client->putObject(array(
#    'ACL' => 'public-read',
#    'Bucket' => $bucket,
#    'Key' => $key,
#    'SourceFile' => $uploadfile 
#));
# PHP version 3
$result = $s3->putObject([
    'ACL' => 'public-read',
    'Bucket' => $bucket,
    'Key' => $fname,
    'SourceFile' => $uploadfile
]);  

$url = $result['ObjectURL']; // store to be used later...
echo $url;

$rds = new Aws\Rds\RdsClient([
    'version' => 'latest',
    'region'  => 'us-east-1'
]);

$result = $rds->describeDBInstances([
    'DBInstanceIdentifier' => 'SIMMON-THE-CAT-DB',
    #'Filters' => [
    #    [
    #        'Name' => '<string>', // REQUIRED
    #        'Values' => ['<string>', ...], // REQUIRED
    #    ],
        // ...
   # ],
   # 'Marker' => '<string>',
   # 'MaxRecords' => <integer>,
]);

$endpoint = $result['DBInstances'][0]['Endpoint']['Address'];

    echo "============\n". $endpoint . "================";
//echo "begin database";^M
$link = mysqli_connect($endpoint,"LN1878","hesaysmeow","SIMMON-THE-CAT-DB") or die("Error " . mysqli_error($link));
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/* Prepared statement, stage 1: prepare */
if (!($stmt = $link->prepare("INSERT INTO CAT_TABLE (USERNAME,EMAIL,PHONE,RAWS3URL,FINISHEDS3URL,IMGNAME,STATE,TIMESTR) VALUES (?,?,?,?,?,?,?,?)"))) {
    echo "Prepare failed: (" . $link->errno . ") " . $link->error;
}

$USERNAME = "Y. Z. LN1878";
$EMAIL = $_POST['useremail'];
$PHONE = $_POST['phone']; 
$RAWS3URL = $url; //obtained from far above..
$IMGNAME = basename($_FILES['userfile']['name']);
$FINISHEDS3URL = "none";
$STATE =0;
$TIMESTR= "Current time: " . date("Y-m-d H:i:s");

$stmt->bind_param("ssssssis",$USERNAME, $EMAIL,$PHONE,$RAWS3URL,$IMGNAME,$FINISHEDS3URL,$STATE,$TIMESTR);


if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}
printf("%d Row inserted.\n", $stmt->affected_rows);
/* explicit close recommended */
$stmt->close();

//display all records
$link->real_query("SELECT * FROM CAT_TABLE");

$res = $link->use_result();

echo "Result set order...\n";
while ($row = $res->fetch_assoc()) {
    echo $row['ID'] . " " . $row['EMAIL']. " " . $row['PHONE'];
}
$link->close();
//add code to detect if subscribed to SNS topic 
//if not subscribed then subscribe the user and UPDATE the column in the database with a new value 0 to 1 so that then each time you don't have to resubscribe them
// add code to generate SQS Message with a value of the ID returned from the most recent inserted piece of work
//  Add code to update database to UPDATE status column to 1 (in progress)
?>