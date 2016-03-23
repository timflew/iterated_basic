<?php
// 3.7.2016-Created-Present text and then query

include('config.php');

// Get data
$full_qs=$_SESSION['full_qs'];

?>

<html>
    
<link rel="stylesheet" type="text/css" href="ltmClus1.css" />

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>



<div id='main_body' align='center'  style="margin-left:25%;margin-right: 25%;width:50%;height:80%;float:left;margin-top: 10%;margin-bottom: 10%">

	
	<form id='sub_form' action="exit.php" method="post">
		<p id='q1'> <?php echo $full_qs[0]; ?> </p>
		<input type="text" id="q1"  name="q1">
		<br><br>
		
		<p id='q2'> <?php echo $full_qs[1]; ?> </p>
		<input type="text" id="q2"  name="q2">
		<br><br>
		
		<p id='q3'> <?php echo $full_qs[2]; ?> </p>
		<input type="text" id="q3"  name="q3">
		<br><br>
		
    </form>
    
    <input type="submit" id="submit" value="Next" >
</div>

<script>
	$('#submit').click(function(){
		$('#sub_form').submit();
	});


</script>

</html>



