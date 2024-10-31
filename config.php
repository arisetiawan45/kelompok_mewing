<?php
/**
 * using mysqli_connect for database connection
 */
 
$db_ost = 'localhost';
$db_name = 'kelompok_mewing';
$db_us = 'root';
$db_pass = '';
 
$mysqli = mysqli_connect($db_ost, $db_us, $db_pass, $db_name); 
 
?>