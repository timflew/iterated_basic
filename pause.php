<?php
include('config.php');

$text_obs=$_POST['text_obs'];
$final_resp=$_POST['final_resp'];

$chain=$_SESSION['chain'];
$iter=$_SESSION['iter'];

$subjId=$_SESSION['subjId'];
$count=$_SESSION['count'];
$order=$_SESSION['order'];
$tweet=$_SESSION['tweet'];
$emotion=$_SESSION['emotion'];
$emoticon=$_SESSION['emoticon'];

# Get rid of emoticons
$curr_ind=$order[$count];
$curr_tweet=$tweet[$curr_ind];
$curr_emotion=$emotion[$curr_ind];
$curr_emoticon=$emoticon[$curr_ind];

$face=array(':)',':-)',': )',':(',':-(',': (');

$text_proc=$final_resp;
for($if=0;$if<count($face);$if++){
	$text_proc=str_replace($face[$if],'',$text_proc);
}

# Form quotes for sql
$quote_replace=array("'",'"');
$quote_replace2=array("''",'""');
for($iq=0;$iq<count($quote_replace);$iq++){

	$text_obs=str_replace($quote_replace[$iq],$quote_replace2[$iq],$text_obs);
	$final_resp=str_replace($quote_replace[$iq],$quote_replace2[$iq],$final_resp);
	$text_proc=str_replace($quote_replace[$iq],$quote_replace2[$iq],$text_proc);
}


$currQuery="INSERT INTO `iter_tweet` 

        (`subj`,`exp_id`,`chain`,`iter`, `text_id`,
        `text_obs`,`text_recalled`,`text_proc`,
        `claim_time`,`claimed_by`,`emotion`,`emoticon`,`status`) 

        VALUES 

        ('$subjId','$exp_id','$chain','$iter','$curr_ind',
            '$text_obs','$final_resp','$text_proc',
            'NULL','NULL','$curr_emotion','$curr_emoticon','in-pro')";
//echo $currQuery;
mysql_query($currQuery);

$_SESSION['count']=$_SESSION['count']+1;

if($_SESSION['count']>=count($order)){
	$next_page='exit.php';
}else{
	$next_page='trial.php';
}
?>

<html>
    
<link rel="stylesheet" type="text/css" href="ltmClus1.css" />

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<div align='center'>
	
	<p>Press Next when you are ready for the next trial</p>	
	<form action="<?php echo $next_page ?>" method="post">
		<br>
		<input type="submit" id="submit" value="Next" >
	</form>

</div>

</html>