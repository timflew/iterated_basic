<?php

include('config.php');

$id=$_SESSION['id']; # Unique identifier (primary key) in sql
$prevIter=$_SESSION['prevIter'];
$iter=$_SESSION['iter'];

// Get trials
$c1="SELECT `art_id`,`article`, `q1_t`, `q2_t`,`q3_t`, `q1_r`, `q2_r`,`q3_r`,`pass_along` FROM 
	".$table_name." WHERE `id` = '$id' AND `status` = 'claimed' AND `iter` = '$prevIter' AND `exp_id` = '$exp_id'";
echo $c1;
$news_sql = mysql_query($c1) or die(mysql_error());
$news_data = mysql_fetch_array($news_sql);
print_r($news_data);
// Thing to iterate, things to keep constant
$qs=array();
for($i=1;$i<4;$i++){
	if($news_data['pass_along']==$i){
		// if this is the target feature, get the recalled value
		$curr_stim=$news_data['q'.$i.'_r'];
		array_push($qs,$curr_stim);
	}else{
		$curr_stim=$news_data['q'.$i.'_t'];
		array_push($qs,$curr_stim);
	}
}
print_r($qs);
// Add code to load questions for this particular article
$questions=array();
$row = 1;
if (($handle = fopen("stimuli/questions.csv", "r")) !== FALSE) {
	$data = fgetcsv($handle, 1000, ",");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

		$article_q_id=$data[0];
		if($article_q_id==$news_data['art_id']){
			array_push($questions,substr($data[1],1,-1));
			array_push($questions,substr($data[2],1,-1));
			array_push($questions,substr($data[3],1,-1));						
		}
    }
    fclose($handle);
}
$_SESSION['full_qs']=$questions;


// Things to pass on
$_SESSION['art_id']=$news_data['art_id']; # specific article (in case we want multiple identical chains)
$_SESSION['article']=$news_data['article']; # actual text
$_SESSION['qs']=$qs; # things to insert into text
$_SESSION['pass_along']=$news_data['pass_along'];

?>

<html>
    
<link rel="stylesheet" type="text/css" href="ltmClus1.css" />

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<div align='center' style="width:50%;margin-left:25%;margin-right:25%">

<h2>Instructions</h2>
	
	<p>We're trying to test how memorable sentences posts are</p>
	<br>
	<p>Each trial we will show you a sentence for a short time. Then the sentence will disappear and we will ask you questions about the sentence.</p>

	<form action="trial.php" method="post">
		<br>
		<input type="submit" id="submit" value="Next" >
	</form>

</div>

</html>
