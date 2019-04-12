<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 12-4-2019
 * Time: 08:53
 */

require 'config.php';
$sql = "SELECT * FROM users";
$query = $db->query($sql);
$users = $query->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';

?>



<header>
    <h1>FIFA</h1>
    <a href='index.php'>Home</a>
</header>

<?php
echo'<ul>';
foreach ($users as $user){
    $username = htmlentities($user['username']);
    if ($user['username'] == 'ikbenrobin5'){
        echo"<li>$username is admin</li>";
    }else if ($user['rights'] == 1){
        echo"<li><a href='give_rights.php?id={$user['id']}'>$username heeft rechten</a>";
    }else{
        echo"<li><a href='give_rights.php?id={$user['id']}'>$username heeft geen rechten</a>";
    }
}
?>



<?php require 'footer.php'; ?>
