<?php
include('config.php');

// connect to DB
$hostname = "FILL IN";
$username = "FILL IN";
$password = "FILL IN";
$database = "FILL IN";

if(!mysql_connect($hostname, $username, $password)){
    exit('<p class="error">The application cannot connect to the database.</p>');
}
if(!mysql_select_db($database)){
    exit('<p class="error">The application cannot select the database.</p>');
}

// Time limit

// Identify subjects who are still in progress

$sql="SELECT `claimed_by`,`claim_time` FROM `$table_name` WHERE `status` = 'claimed' AND `exp_id` = '$exp_id'";
//echo $sql;
$inProgressData=mysql_query($sql);


while($row = mysql_fetch_array($inProgressData)){
	$claim_time=$row['claim_time'];
	$claimed_by=$row['claimed_by'];	
	echo $claim_time;
	echo $claimed_by;
	$timeCheck=(time() - strtotime($claim_time)) >(60*$timeLim);
	if($timeCheck){
		$c1="UPDATE `$table_name` SET `status`='wait',`claimed_by`='',`claim_time`=''
 WHERE `claimed_by` = '$claimed_by' AND `exp_id` = '$exp_id' AND `status` = 'claimed'";
		mysql_query($c1);
		echo 'Unclaimed '.$claimed_by;
		echo '<br>';
	
	}
	

    
}

?>
