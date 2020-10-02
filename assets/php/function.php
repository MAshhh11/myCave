<?php

    function shorten_text($text, $max = 50, $append =' &hellip;'){ 
    if (strlen($text)<=$max) return $text;
    $return = substr($text,0,$max);
    if (strpos($text,' ')===false) return $return . $append;
    return preg_replace('/\w+$/',' ',$return) . $append ; //fonction qui raccourcit le texte de description sans couper les mots
    }

    
    function displayWine(){ 
        // AFFICHE UNE ENTREE VIN 
            if(isset($_GET['id'])){
                global $db;
                $wine_id = $_GET['id'];
                $sql = $db->query("SELECT * FROM wine WHERE id = $wine_id");
                $sql->setFetchMode(PDO::FETCH_ASSOC);

                while($row = $sql->fetch()){ //BOUCLE D'AFFICHAGE DES DONNEES
                ?>
                <div class="cartouche">
                       
                        <div id="card2">
                            <h2><?= $row['name']; ?></h2>
                            <?php
                                rateYourWine(); // APPEL A LA FONCTION RATE
                            ?>
                            <p><?= $row['grapes']; ?></p>
                            <p><?= $row['wine_year']; ?></p>
                            <img class="imgwine" src="<?=$row['picture'];?>" alt="image_annonce" width="250" height="300">
                            <p><?= $row['country']; ?></p>
                            <p><?= $row['region']; ?></p>
                            <p class="description"><?= $row['description']; ?></p>
                            <a class="button3" href="winelist.php">RETURN</a>
                            <?php 
                            if(isset($_SESSION['id'])){
                                //BOUTONS MODIFY DELETE LES USERS  ?>
                                <div class="button2">
                                    <a class="button3" href="modifywine.php?id=<?= $row['id']; ?>">MODIFY</a>
                                    <a class="confirm button3" href="deletewine.php?id=<?= $row['id']; ?>">DELETE</a>
                                    <a class="button3" href="vote.php?id=<?= $row['id']; ?>">RATE</a>
                                </div>
                            <?php } ?>
                        </div>  
                </div>
                <?php
                }
            }
    }
    function displayAllUsers(){ //fonction admin pour afficher tous les users
        if (isset($_SESSION['id']) && $_SESSION['id'] == 3){
        global $db;
        $sql = $db->query("SELECT * FROM user");
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $sql->fetch()){ 
        ?>
           <div id="card">
                <p><?= $row['firstname']; ?></p>
                <p><?= $row['lastname']; ?></p>
                <p><?= $row['email']; ?></p>
                <a class="button3" href="modifyuser.php?id=<?= $row['id']; ?>"> MODIFY</a>
                <a class="confirm button3" href="deleteuser.php?id=<?= $row['id']; ?>"> DELETE</a>
            </div>
        <?php
        }
        } else {
            echo "<div class ='danger'>You need privilege user admin</div>";
            
        }
    }

    function displayAllWineTools(){ //fonction admin pour afficher tous les vins
        if (isset($_SESSION['id']) && $_SESSION['id'] == 3){
        global $db;
        $sql = $db->query("SELECT * FROM wine");
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $sql->fetch()){ 
        ?>
           <div id="card">
                <p><?= $row['name']; ?></p>
                <p><?= $row['grapes']; ?></p>
                <p><?= $row['wine_year']; ?></p>
                <a class="button3" href="modifywine.php?id=<?= $row['id']; ?>"> MODIFY</a>
                <a class="confirm button3" href="deletewine.php?id=<?= $row['id']; ?>"> DELETE</a>
            </div>
        <?php
        }
        } else {
            echo "<div class ='danger'>You need privilege user admin</div>";
            
        }
    }

    function rateYourWine(){
        if(isset($_GET['id'])){
            global $db;
            $wine_id = $_GET['id'];
            // RECUPERATION DES DONNEES : NOTES ET COMMENTAIRES D'UN VIN
            $sql = $db->query("SELECT * FROM wine AS w LEFT JOIN rate AS r on w.id=r.id_wine WHERE w.id=$wine_id");
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $row = $sql->fetch();

            //SOMME DES NOTES DONNEES A UN VIN DANS LE BUT DE CREER UNE MOYENNE
            $sql2 = $db->query("SELECT SUM(rate) FROM rate WHERE id_wine=$wine_id");
            $sql2->setFetchMode(PDO::FETCH_ASSOC);
            $row2 = $sql2->fetch();

            if($row['count_rate'] != 0 ) {
                $average_rate = $row2['SUM(rate)'] / $row['count_rate'];
                //AFFICHAGE DE LA MOYENNE AVEC LES ETOILES
                ?>
                <p>Global rate for this wine: <?= $average_rate ?></p>
                
                <div id="center">
                    <?php if($average_rate >= 1 && $average_rate < 2){ ?>
                        <img src="assets/img/star1.png" alt="star1" class="stars" width="40">
                   <?php }if($average_rate >= 2 && $average_rate < 3){ ?>
                        <img src="assets/img/star2.png" alt="star2" class="stars" width="40">
                    <?php }if($average_rate >= 3 && $average_rate < 4){ ?>
                        <img src="assets/img/star3.png" alt="star3" class="stars" width="40">
                    <?php }if($average_rate >= 4 && $average_rate < 5){ ?>
                        <img src="assets/img/star4.png" alt="star4" class="stars" width="40">
                    <?php }if($average_rate >= 5  && $average_rate < 6){ ?>
                        <img src="assets/img/star5.png" alt="star5" class="stars" width="40">
                    <?php } ?>
                    <a href="comments.php?id=<?= $row['id']; ?>">See comments</a>   
<?php } else{ ?>
                <img src="assets/img/star0.png" alt="star0" class="stars" width="40">
                 
     <?php } 
                
     }
           
}


?>


