<?php

include('config.php');
$subjId=$_POST['subjId'];
$_SESSION['subjId']=$subjId;
?>


<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
 
<link rel="stylesheet" type="text/css" href="ltmClus1.css" />


<div style="margin-left:25%;margin-right: 25%;width:50%;float:left;margin-top: 1%" align="center">
    
    <div id="load"></div>
        
    <form action="instructions.php" method="post" name='nextpage' id='nextpage'>

    </form>
    
</div>



<script type="text/javascript">

var auto_refresh = setInterval(
function (){
	$("#load").load("checkDatabase.php?subjId=<?php echo $subjId?>");

},1000); 

$("#load").load("checkDatabase.php?subjId=<?php echo $subjId?>");




</script>

</html>

