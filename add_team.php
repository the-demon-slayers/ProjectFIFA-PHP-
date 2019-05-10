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

$sql1 = "SELECT * FROM teams WHERE team_name=:team_name";
$prepare = $db->prepare($sql1);
$prepare->execute([
    ':team_name' => $Name
]);

$team_name = $prepare->fetch(PDO::FETCH_ASSOC);

if ($team_name == "") {

    $sql = "INSERT INTO teams ( team_name, made_by ) VALUES ( :name, :made_by)";

    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':name' => $Name,
        ':made_by' => $made_by
    ]);

    header('Location: index.php');
}else{
    echo "Dit team bestaat al";
}