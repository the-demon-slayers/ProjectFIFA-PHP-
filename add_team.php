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
require 'config.php';

$Name = $_POST['team_name'];

$sql = "INSERT INTO teams ( team_name ) VALUES ( :name)";

$prepare = $db->prepare($sql);
$prepare->execute([
    ':name' => $Name
]);

header('Location: index.php');