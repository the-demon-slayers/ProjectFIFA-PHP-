<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 10-4-2019
 * Time: 12:18
 */


$dbHost = 'localhost';
$dbUser = 'u614143906_renzo';
$dbPassword = 'w@0$FitrYAy0Lm';
$dbName = 'u614143906_f9';

$dsn= "mysql:host=$dbHost;dbname=$dbName";
$db = new PDO($dsn, $dbUser, $dbPassword);

$db->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);


//if($db){
//   echo "Connected to the $dbName database successfully!";
//}