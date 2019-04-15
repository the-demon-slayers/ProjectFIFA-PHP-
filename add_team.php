<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 10-4-2019
 * Time: 14:04
 */
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('Location: index.php');
    exit;
}

session_start();
require 'config.php';

$Name = $_POST['team_name'];
$made_by = $_SESSION['username'];

$sql = "INSERT INTO teams ( team_name, made_by ) VALUES ( :name, :made_by)";

$prepare = $db->prepare($sql);
$prepare->execute([
    ':name' => $Name,
    ':made_by' => $made_by
]);


header('Location: index.php');