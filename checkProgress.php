<?php
include('config.php');

// Check for completed iteration
$in_pro_sql="SELECT DISTINCT `claimed_by`,`claim_time` FROM ".$table_name." WHERE `status` = 'claimed' AND `exp_id` = '$exp_id'";
$inpro=mysql_query($in_pro_sql);

$row = mysql_fetch_array($inpro);

echo '<link rel="stylesheet" type="text/css" href="ltmClus1.css" />';
echo '<h2>Subjects in progress</h2>';
echo '<br>';

if(!empty($row)){

	while(!empty($row)){
		echo '<p>'.$row['claimed_by'].' at '.$row['claim_time'].'</p>';
		echo '<br>';
		$row = mysql_fetch_array($inpro);
	}

}else{
	echo '<p>Nope. No subjects in progress</p>';
}

?>
<br>
<form action="index.php" method="post">
	<input type="submit" id="submit" value="Back to homepage" >
</form>


