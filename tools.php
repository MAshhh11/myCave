<?php 
$page = 'tools.php';
require 'assets/php/connect.php';
require 'assets/php/function.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';
if (isset($_SESSION['id']) && $_SESSION['id'] == 3){
?>

<section>
    <article id="cartouche">
        <div id="text-welcome">
        <h2 class="ml3">WELCOME TO THE ADMIN PANEL!</h2>
        <h3>USER LIST</h3>
        <p>You can decide whether to update users profile or to remove users from database:</p>
            <div class="flex" id="results">

            <?php
                displayAllUsers(); //FONCTION QUI AFFICHE LES USERS
            ?>
            </div>
         <h3>WINE LIST</h3>
         <p>You can decide whether to update wines descriptions or to remove wines from database:</p>
            <div class="flex" id="results">
            <?php
                displayAllWineTools(); //FONCTION QUI AFFICHE LES VINS
            ?>
            </div>
            <div class="button2">
                <a href="profile.php" class="button3">RETURN</a>
            </div>
        </div>
        
    </article>
</section>

<?php  
}else{
    echo "<div class ='danger'>You need privilege user admin to access this page!</div>";
}
include 'assets/php/footer.php'; ?>