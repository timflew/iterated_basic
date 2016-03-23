<?php
// 3.7.2016-Created-Present text and then query

include('config.php');

// Get data
$subj=$_SESSION['subj'];
$id=$_SESSION['id'];
$art_id=$_SESSION['art_id'];
$qs=$_SESSION['qs'];
$pass_along=$_SESSION['pass_along'];
$article=$_SESSION['article']; # actual text
$_SESSION['qs']=$qs; # things to insert into text
$q1=$_POST['q1'];
$q2=$_POST['q2'];
$q3=$_POST['q3'];
$prevIter=$_SESSION['prevIter'];

# Close previous 
$c1="UPDATE ".$table_name." SET `status`='complete'
 WHERE `id` = '$id' AND `iter` = '$prevIter' AND `exp_id` = '$exp_id' AND `status` = 'claimed'";
echo $c1;
mysql_query($c1);

# Set current 
$iter=$_SESSION['iter'];
$article2=addslashes($article);
$c1="INSERT INTO ".$table_name." (subj,exp_id,claimed,iter,art_id,article,q1_t,q2_t,q3_t,q1_r,q2_r,q3_r,pass_along,status) VALUES	('$subj','$exp_id',$id,$iter,$art_id,'$article2','$qs[0]','$qs[1]','$qs[2]','$q1','$q2','$q3',$pass_along,'wait')";
echo $c1;
mysql_query($c1);

?>

<html>
    
<link rel="stylesheet" type="text/css" href="ltmClus1.css" />

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>



<div id='main_body' align='center'  style="margin-left:25%;margin-right: 25%;width:50%;height:50%;float:left;margin-top: 25%;margin-bottom: 25%">

	<p> Thank you for participating!</p>

    

</div>


</html>



