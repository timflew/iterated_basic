<?php

include('config.php');

$subj=$_POST['subjId'];

# Unclaim previous 
$c1="UPDATE ".$table_name." SET `status`='wait',`claimed_by`='',`claim_time`=''
 WHERE `claimed_by` = '$subj' AND `exp_id` = '$exp_id' AND `status` = 'claimed'";

mysql_query($c1);


?>


<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<link rel="stylesheet" type="text/css" href="ltmClus1.css" />

<h1>Remove subject</h1>

<div style="margin-left:25%;margin-right: 25%;width:50%;float:left;margin-top: 1%" align="center">
    <p>Delete executed</p>
    
	<br>
	<form action="index.php" method="post">
		<input type="submit" id="submit" value="Back to homepage" >
	</form>
</div>

<script>

</script>



</html>

