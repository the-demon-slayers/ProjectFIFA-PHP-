<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 11-4-2019
 * Time: 09:52
 */

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index.php');
    exit;
}

require 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];

if ($password != $password_repeat){
    echo 'Is niet gelijk';
    exit();
}

$query = "SELECT * FROM users WHERE username=:username";
$prepare = $db->prepare($query);
$prepare->execute([
    ':username' => $username
]);

$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

if ($result){
    echo'Deze gebruikersnaam bestaat al';
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':username' =>$username,
    ':password' =>$hashed_password
]);

header('Location: index.php');