<?php

// start a session
session_start();

// connect to DB
$hostname = "FILL IN";
$username = "FILL IN";
$password = "FILL IN";
$database = "FILL IN";

if(!mysql_connect($hostname, $username, $password)){
    exit('<p class="error">The application cannot connect to the database.</p>');
}
if(!mysql_select_db($database)){
    exit('<p class="error">The application cannot select the database.</p>');
}

$exp_id="itbas_v1"; // Experiment ID
$table_name='iter_basic';
$numChain=1; // Interacts with create_initial_news_Table.php. Will repeat the content of stimuli_text.csv when created initial seed entries.
$iter_lim=5;

$enc_time=5000; // How long the stimulus will be presented
$del_time=5000; // How long of a delay there will be between the stimulus and the questions
$time_lim=62; // How many minutes a chain can run until it is deleted


?>
