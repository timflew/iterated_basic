<?php
// Like checkDatabase but for index.php

include('config.php');

$subjId=$_GET['subjId'];

$unclaimed="SELECT `iter`,`id` FROM `$table_name` WHERE `exp_id` = '$exp_id' AND `status` = 'wait'";

$unclaimedData = mysql_query($unclaimed) or die(mysql_error());

$row = mysql_fetch_array($unclaimedData);



if(!empty($row)){
    // If the chain variable has been set but the script is running again
    $chainClaimed=!empty($_SESSION['chain']); 


	$prevIter=$row['iter'];
	$id=$row['id'];
	$_SESSION['prevIter']=$prevIter;
	$_SESSION['iter']=$prevIter+1;
	$_SESSION['id']=$id;
	$_SESSION['subj']=$subjId;
	$cTime=date('Y-m-d H:i:s');

	$c1="UPDATE `$table_name` SET `status`='claimed',`claim_time`='$cTime',`claimed_by`='$subjId'
	 WHERE `id` = '$id' AND `iter` = '$prevIter' AND `exp_id` = '$exp_id' AND `status` = 'wait'";
	mysql_query($c1);

	$c1="INSERT INTO `$table_name` (subj,claimed,status,exp_id) VALUES('$subjId',$id,'init','$exp_id')";
	mysql_query($c1);
		

   echo '<script>document.nextpage.submit();</script>';	


}else{

	echo '<p style="color:red;font-size:50px">All slots are currently full</p>';

}


?>
