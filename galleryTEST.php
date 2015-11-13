<html>
<head><title>simple test</title>

</head>

<body>
<?php
/* Yiming ZHANG ITMO 544-01 MP-1
 * Gallery.php
 * Last updated: Nov 6,2015
 */

session_start();
$email = $POST["email"]
require 'vendor/autoload.php';

use Aws\Rds\RdsClient;
$client = RdsClient::factory([
'version' => 'latest',
'region'  => 'us-east-1'

]);

$result = $client->describeDBInstances([
    'DBInstanceIdentifier' => 'SIMMION-THE-CAT-DB'
]);

$endpoint = $result['DBInstances'][0]['Endpoint']['Address'];

$link = mysqli_connect($endpoint,"LN1878","hesaysmeow","simmoncatdb") or die("Error " . mysqli_error($link));
//check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//to be add =======================SELECT STATEMENT TO DISPLAY IMGS===============================================
//retrieving data from db, table name: CAT_TABLE
//NOTICE DIFFERENT FIELD NAMES: send - useremail - COLUMN "EMAIL"; retrieve - email - same column in db

$link->real_query("SELECT * FROM CAT_TABLE WHERE EMAIL = '$email'");

$res = $link->use_result();
//echo "Result set order...\n";
while ($row = $res->fetch_assoc()) {
$urlINFO = "<img src =\" " . $row['RAWS3URL'] . "\" /><img src =\"" .$row['FINISHEDS3URL'] . "\"/>";
//echo $urlINFO;
$imageSTR = $row['ID'] . "Email: " . $row['EMAIL']; //to be used into CSS containers
//echo $imageSTR;
}

$link->close();


?>
