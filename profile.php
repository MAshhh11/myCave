<?php 
$page = 'profile.php';
require 'assets/php/connect.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';

    // si un user est connecté on recupère l'id et on prépare une requete pour afficher les données
    if(isset($_SESSION['id'])){

        $id = $_SESSION['id'];
        $sql = $db->query("SELECT * FROM user WHERE id = $id");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $row = $sql->fetch();
        
    // si les champs du formulaire ne sont pas vide on récupere les données insérées pour l'user pour les mettre à jour dans la BD   
    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email'])){
        $nom = htmlspecialchars($_POST['lastname']);
        $prenom = htmlspecialchars($_POST['firstname']);
        $email = htmlspecialchars($_POST['email']);
        $id = $_SESSION['id'];
        

        $sth = $db->prepare("UPDATE user SET lastname=?, firstname=?, email=? WHERE id=?"); // MET A JOUR LE PROFIL USER

        $sth->bindValue(1, $nom);
        $sth->bindValue(2, $prenom);
        $sth->bindValue(3, $email);
        $sth->bindValue(4, $id);
        // si la requete s'execute on affiche un msg de succès
        if($sth->execute()){
            echo "<div class ='success'> Your profile has been updated!</div>";
            header('Location: profile.php?id='.$id);
            

        }else{
            echo "<div class ='danger'> Something went wrong!</div>";
            
        }
    }
?>

<section>
    <article id="cartouche">
        <div id="text-welcome">
            <h2 class="ml3">Welcome to MyCave!</h2>
            <h3>YOUR PROFILE</h3>
            <p>Please check your informations below:</p>
            <!-- FORMULAIRE -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
            <div class="button">
            <p>Here is your profile, you can decide whether to update it or to add new wine in our database:</p>
                <a href="add_wine.php" class="button3">ADD WINE</a>
                <a href="winelist.php" class="button3">WINE LIST</a>
            </div>
            <div id="card3">
                <?php
                if (isset($_SESSION['id']) && $_SESSION['id'] == 3){ 
                    // SELON SI L'USER EST ADMIN OU PAS AFFICHAGE D'UNE CARTE AVEC DES BOUTONS ?>
                <div class="button"> 
                    <p>Your admin privileges permit the following actions:</p>
                    <a href="tools.php" class="button3">ADMIN TOOLS</a>
                    <a href="register.php" class="button3">ADD USER</a>
                </div>
                <?php
                }else{ ?>
                    <p class="mb-5">For any request contact an admin at admin@mycave.com</p>
        <?php  }
                ?>
            </div>
        </div>
    </article>
</section>

<?php 

}else{
    echo "<div class ='danger'>You need to log into our website to access this page</div>";
}
include 'assets/php/footer.php'; ?>