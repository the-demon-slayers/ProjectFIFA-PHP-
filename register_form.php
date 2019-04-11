<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 11-4-2019
 * Time: 09:42
 */



require 'header.php';
?>


<header>
    <a href="index.php">Home</a>
</header>

<form action="register.php" method="post">
    <input type="text" name="username" id="username" placeholder="Gebruikersnaam" required>
    <input type="password" name="password" id="password" placeholder="Wachtwoord" required>
    <input type="password" name="password_repeat" id="password_repeat" placeholder="Herhaal wachtwoord" required>
    <input type="submit" value="Registreer" required>
</form>







<?php
require 'footer.php';
?>
