<?php
$page = 'modifyuser.php';
require 'assets/php/connect.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';

if (isset($_SESSION['id']) && $_SESSION['id'] == 3){
     // VISIBLE SEULEMENT DES ADMINISTRATEURS
    
    if(isset($_GET['id'])){
    
    $id = $_GET['id']; // RECUPERE L'ID'
    $sql = $db->query("SELECT * FROM user WHERE id = $id");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $row = $sql->fetch(); // AFFICHAGE DES DONNEES DE L'USER

?>

<section>
<article id="cartouche">
    <div id="text-welcome">
        <h2>MODIFY PROFILE</h2>
        <p>You can modify informations:</p>
        <!-- FORMULAIRE -->
        <form action="modifyuser_post.php?id=<?= $row['id'] ?>" method="post">
            <div>
                <input type="text" name="firstname" placeholder="FIRSTNAME" value="<?= $row['firstname'];?>">
            </div>
            <div>
                <input type="text" name="lastname" placeholder="LASTNAME" value="<?= $row['lastname'];?>">
            </div>

            <div>
                <input type="text" name="email" placeholder="EMAIL" value="<?= $row['email'];?>">
            </div>
            <div>
                <input type="submit" name="submit-login" class="button3" value="UPDATE PROFILE">
            </div>
        </form>
<?php   
}
?>      <div class="button">
            <a href="tools.php" class="button3">RETURN</a>
        </div>
    </div>
</article>
</section>

<?php 

}else{
echo "<div class ='danger'>You need to log into our website to access this page</div>";
}
include 'assets/php/footer.php'; ?>