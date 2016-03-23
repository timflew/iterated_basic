<?php

include('config.php');

?>


<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<link rel="stylesheet" type="text/css" href="ltmClus1.css" />



<div style="margin-left:25%;margin-right: 25%;width:50%;float:left;margin-top: 1%" align="center">
	<h1>What do you want to do?</h1>
    <form action="login.php" method="post">
        <input type="submit" id="submit" value="Start Subject" >
    </form>
    <br><br>
    <form action="checkProgress.php" method="post">
        <input type="submit" id="submit" value="Check Subject Status" >
    </form>
    <br><br>
    <form action="remove_chain.php" method="post">
        <input type="submit" id="submit" value="Remove Subject" >
    </form>
    <br><br>
    <form action="clearUnused.php" method="post">
        <input type="submit" id="submit" value="Clear Subjects Past Time Limit" >
    </form>
    
    <br><br>
    <p> DON'T SELECT THIS UNLESS YOU'RE REALLY SURE</p>
    <form action="create_initial_news_Fill.php" method="post">
        <input type="submit" id="submit" value="Create Trials" >
    </form>
    <p> This will fill the datatable with new initial seed trials</p>
    
</div>
<link rel="stylesheet" type="text/css" href="ltmClus1.css" />
<script>

</script>



</html>
