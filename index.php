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
        <input type="submit" id="submit" value="Clear Subjects Past Time Limit (><?php echo $time_lim?> mins)" >
    </form>
    
    <br><br>
    <p>The following two buttons will 1) Create a new table in your specific database and 2) Fill that table with initial seed trials. Use carefully.</p>
    <form action="create_initial_news_Table.php" method="post">
        <input type="submit" id="submit" value="Create Table" >
    </form>
	<br>
	<form action="create_initial_news_Fill.php" method="post">
        <input type="submit" id="submit" value="Create Seed Trials" >
    </form>

    
</div>
<link rel="stylesheet" type="text/css" href="ltmClus1.css" />
<script>

</script>



</html>
