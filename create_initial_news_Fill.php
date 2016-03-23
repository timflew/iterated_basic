<?php
include('config.php');

$all_art_id=array();
$all_text=array();
$q1=array();
$q2=array();
$q3=array();
$pass_along=array();
$row = 1;
if (($handle = fopen("stimuli/stimuli_text.csv", "r")) !== FALSE) {
	$data = fgetcsv($handle, 1000, ",");
    while (($data = fgetcsv($handle, 1000, ",",'"')) !== FALSE) {
		echo $data[1];
		echo '<br>';
		array_push($all_art_id,$data[0]);
		array_push($all_text,($data[1]));
		array_push($q1,($data[2]));						
		array_push($q2,($data[3]));						
		array_push($q3,($data[4]));						
		array_push($pass_along,$data[5]);																							

    }
    fclose($handle);
}
echo '<br>';
echo '<br>';
echo '<br>';

$status="wait";
$count=0;
for($ic=0;$ic<$numChain;$ic++){
	for($i=0;$i<count($all_text);$i++){
		$currChain='base'.strval($count);
		$query="INSERT INTO ".$table_name." (subj,exp_id,claimed,iter,art_id,article,q1_t,q2_t,q3_t,q1_r,q2_r,q3_r,pass_along,status) 
		VALUES 
		('$currChain','$exp_id',-1,$i,$all_art_id[$i],'$all_text[$i]', '$q1[$i]','$q2[$i]','$q3[$i]', '$q1[$i]','$q2[$i]','$q3[$i]',$pass_along[$i],'$status')";		
		echo $query;
		echo '<br>';
		mysql_query($query);
		$count=$count+1;
	}
}
?>