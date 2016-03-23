<?php

include('config.php');

$message=$_POST['feedback'];
$subject='iterated learning feedback';
$email='YOUR EMAIL';
$headers=$_SESSION['subjId'];
//imap_mail($email, $subject, $message, $headers); // uncomment if you want feedback

?>

<html>
    
<link rel="stylesheet" type="text/css" href="ltmClus1.css" />

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<div align='center'>

	<p>Thanks for your comments!</p>

</div>

</html>