<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 11-4-2019
 * Time: 09:42
 */

require 'header.php';
?>

<div class="background">
    <div class="register-page">
        <header>
            <div class="header-content" id="header">
                <a href="index.php" class="vertical-align"><img src="img/logo.png" alt="FIFA" class="logo"></a>
            </div>
        </header>
        <h1>Maak een aacount aan</h1>
        <form action="register.php" method="post" class="register-form">
            <div class="register-input">
                <input type="text" name="username" id="username" placeholder="Gebruikersnaam" required class="input-field">
                <input type="password" name="password" id="password" placeholder="Wachtwoord" required minlength="7" class="input-field">
                <input type="password" name="password_repeat" id="password_repeat" placeholder="Herhaal wachtwoord" required class="input-field">
                <input type="submit" value="Registreer" required class="input-field">
            </div>
        </form>
        <p>Heb je al een account?</p><a href="index.php">Log hier in!</a>
    </div>
</div>





<?php
require 'footer.php';
?>
