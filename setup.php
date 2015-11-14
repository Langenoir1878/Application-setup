<?php
/*
 * Cited from https://github.com/jhajek/itmo-544-444-fall2015/blob/master/setup.php
 * Oct 25th, 2015
 * Yiming Zhang
 * ITMO 544 MP 1
 *
 */



// Start the session^M
require 'vendor/autoload.php';
$rds = new Aws\Rds\RdsClient(array(
    'version' => 'latest',
    'region'  => 'us-east-1'
));


#$result = $rds->createDBInstance([
 #   'AllocatedStorage' => 10,
  #  'AutoMinorVersionUpgrade' => true || false,
    #'AvailabilityZone' => '<string>',
    #'BackupRetentionPeriod' => <integer>,
   # 'CharacterSetName' => '<string>',
   # 'CopyTagsToSnapshot' => true || false,
   # 'DBClusterIdentifier' => '<string>',
    //'DBInstanceClass' => 'db.t1.micro', // REQUIRED
    //'DBInstanceIdentifier' => 'mp1-jrh', // REQUIRED
 # 'DBInstanceClass' => 'db.t1.micro', // REQUIRED
 # ===========================================================
 # 'DBInstanceIdentifier' => 'SIMMON-THE-CAT-DB', // REQUIRED
 # ===========================================================
    //'DBName' => 'customerrecords',
    #'DBParameterGroupName' => '<string>',
    #'DBSecurityGroups' => ['<string>', ...],
    #'DBSubnetGroupName' => '<string>',
#    'Engine' => 'MySQL', // REQUIRED
 #   'EngineVersion' => '5.5.41',
    #'Iops' => <integer>,
    #'KmsKeyId' => '<string>',
   # 'LicenseModel' => '<string>',
  //'MasterUserPassword' => 'letmein888',
    //'MasterUsername' => 'controller',
#    'MasterUserPassword' => 'hesaysmeow',
 #   'MasterUsername' => 'LN1878',
    #'MultiAZ' => true || false,
    #'OptionGroupName' => '<string>',
    #'Port' => <integer>,
    #'PreferredBackupWindow' => '<string>',
    #'PreferredMaintenanceWindow' => '<string>',
 #  'PubliclyAccessible' => true,
   #'StorageEncrypted' => true || false,
   #'StorageType' => '<string>',
   # 'Tags' => [
   #     [
   #         'Key' => '<string>',
   #         'Value' => '<string>',
   #     ],
        // ...
   # ],
    #'TdeCredentialArn' => '<string>',
    #'TdeCredentialPassword' => '<string>',
   # 'VpcSecurityGroupIds' => ['<string>', ...],
#]);

#print "Create RDS DB results: \n";
# print_r($rds);
#$result = $rds->waitUntil('DBInstanceAvailable',['DBInstanceIdentifier' => 'SIMMON-THE-CAT-DB']);
// Create a table 
# ====================================
#$result = $rds->describeDBInstances([
#    'DBInstanceIdentifier' => 'SIMMON-THE-CAT-DB'
#]);
# ====================================
# updated Nov 13, for testing $client
$result = $client->describeDBInstances(array(
	'DBInstanceIdentifier'=>'SIMMON-THE-CAT-DB'
	));

$endpoint = $result['DBInstances'][0]['Endpoint']['Address'];
#print "============\n". $endpoint . "================\n";


$link = new mysqli($endpoint,"LN1878","hesaysmeow","simmoncatdb", 3306) or die("Error " . mysqli_error($link)); 


#echo "Here is the result: " . $link;
$sqlSTETEMENTstr="CREATE TABLE CAT_TABLE 
(
ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
USERNAME VARCHAR(32),
EMAIL VARCHAR(100),
PHONE VARCHAR(30),
RAWS3URL VARCHAR(500),
FINISHEDS3URL VARCHAR(500),
IMGNAME VARCHAR(100),
STATE TINYINT(3) CHECK(STATE IN (0,1,2)),
TIMESTR VARCHAR(50) 
)");

$link->query($sqlSTETEMENTstr);

$link->close();

?>
