<?php
$Settings = new settings();
    $hostname = $Settings->Hostname;
    $username = $Settings->Username;
   // $password = "hippie";
$DBName = $Settings->DBName;
    $password = $Settings->Password;

    
    $db_handle = mysql_connect($hostname, $username, $password)
    or die("Can not connect to databse");
    
    $db = mysql_select_db($DBName, $db_handle)
    or die("Can not connect to Greetr");
    
    
    
    
?>
