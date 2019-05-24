<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 10-4-2019
 * Time: 13:50
 */
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index.php');
    exit();
}

session_start();

require 'config.php';

$username = strtolower($_POST['username']);
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username=:username";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':username' => $username
]);

$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

if ($result){
    $hashed_password = $result[0]['password'];
    if (password_verify($password, $hashed_password)) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    }
}

header('Location: index.php');

