Updated Args to be passed fot testing purpose

launch.sh args:
ami-d05e75b8 1 t2.micro sg-c0f45da6 subnet-833692be KeyPair_2015OCT simmon

created after launch:
load balancer name: SIMMON-THE-CAT
launch configuration: SIMMON-CONFIG-LAUNCH
auto-scaling-group name: SIMMON-AUTO-SCALE
database identifier: SIMMON-THE-CAT-DB
database-name: simmoncatdb
master-username: LN1878
master-password: hesaysmeow

for simple functional testing without auto-scalling or cloudwatch please use: simpleLaunch.sh
Terminal launching example:
./simpleLaunch.sh ami-d05e75b8 1 t2.micro sg-c0f45da6 subnet-833692be KeyPair_2015OCT simmon
