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
    <h1>Name_here</h1>
    <a href='index.php'>Home</a>
</header>

<?php
echo'<ul>';
foreach ($users as $user){
    $username = htmlentities($user['username']);
    echo"<li><a href=''>$username</a>";
}
?>



<?php require 'footer.php'; ?>
