<?php
require 'config.php';
require 'header.php';
?>


<header>
    <h1>Name_here</h1>

    <div class="login">
        <input type="text" id="username" name="username" placeholder="Gebruikersnaam" required>
        <input type="password" id="password" name="password" placeholder="Wachtwoord" required>
        <input type="submit" value="Login">
    </div>
</header>

<div class="banner">
    <h2>Voetbal wedstrijden voor jou bedrijf</h2>
</div>


<?php require 'footer.php'; ?>
