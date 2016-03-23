<?php
include('config.php');
$val = mysql_query('SELECT 1 from '.$table_name.' LIMIT 1');
if($val == FALSE) {
	$query='CREATE TABLE '.$table_name.' (id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,subj VARCHAR(40),exp_id VARCHAR(10),
	claimed INT(8),iter INT(3),art_id INT(4),article VARCHAR(500),q1_t VARCHAR(10),q2_t VARCHAR(10),q3_t VARCHAR(10),q1_r VARCHAR(10),q2_r VARCHAR(10),q3_r VARCHAR(10),pass_along INT(2),
	claim_time DATETIME,claimed_by VARCHAR(40),status VARCHAR(20))';
	echo $query;
	mysql_query($query);
}
?>