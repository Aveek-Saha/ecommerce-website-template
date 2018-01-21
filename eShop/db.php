<?php
/* Database connection settings */
$host = 'localhost';
$user = '';
$pass = '';
$db = 'cart';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
