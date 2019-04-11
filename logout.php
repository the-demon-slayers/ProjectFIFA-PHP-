<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 11-4-2019
 * Time: 10:06
 */

session_start();
unset($_SESSION['user']);
session_destroy();

header('Location: index.php');