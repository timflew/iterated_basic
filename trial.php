<?php
// 3.7.2016-Created-Present text and then query

include('config.php');

$article=sprintf($_SESSION['article'],$_SESSION['qs'][0],$_SESSION['qs'][1],$_SESSION['qs'][2]);

?>

<html>
    
<link rel="stylesheet" type="text/css" href="ltmClus1.css" />

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>



<div id='main_body' align='center'  style="margin-left:25%;margin-right: 25%;width:50%;height:50%;float:left;margin-top: 25%;margin-bottom: 25%">
	<p id='stim'> <?php echo $article; ?> </p>
	
	<form id='sub_form' action="response.php" method="post">

    </form>
</div>

<script>
	var enc_time=<?php echo $enc_time ?>;
	var del_time=<?php echo $del_time ?>;
	var test_on=false;
	
	// Remove stimuli
	setTimeout(function(){
		$('#sub_form').submit();     
    },enc_time);

		


</script>

</html>



