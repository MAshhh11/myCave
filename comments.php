<?php 
$page = 'comments.php';
require 'assets/php/connect.php';
require 'assets/php/function.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';


    
    if(isset($_GET['id'])){ // SI L'ID EST RECUPEREE
    
    $id = $_GET['id'];
    $sql = $db->query("SELECT * FROM rate AS r RIGHT JOIN wine AS w on w.id=r.id_wine WHERE w.id=$id");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    // AFFICHAGE DES NOTE DU VIN EN PARTICULIER
    }
?>

<section>
    <article id="cartouche">
        <div id="text-welcome">
            <h3 class="ml3">What people think of this wine: </h3>
        
            <?php while($row = $sql->fetch()){ ?>
                <div id="card" class="flex">
                    <p><?= $row['user_fullname']; ?>: "<?= $row['comment']; ?>" RATE GIVEN: <?= $row['rate']; ?>

                <?php                 
                //AFFICHAGE DES ETOILES SELON LA NOTE
                    if($row['rate'] >= 1 && $row['rate'] < 2){ ?>
                         <img src="assets/img/star1.png" alt="star1" class="ministars" width="90" height="20">
            <?php }if($row['rate'] >= 2 && $row['rate'] < 3){ ?>
                         <img src="assets/img/star2.png" alt="star2" class="ministars" width="90" height="20">
            <?php }if($row['rate'] >= 3 && $row['rate'] < 4){ ?>
                         <img src="assets/img/star3.png" alt="star3" class="ministars" width="90" height="20">
            <?php }if($row['rate'] >= 4 && $row['rate'] < 5){ ?>
                         <img src="assets/img/star4.png" alt="star4" class="ministars" width="90" height="20">
            <?php }if($row['rate'] >= 5  && $row['rate'] < 6){ ?>
                        <img src="assets/img/star5.png" alt="star5" class="ministars" width="90" height="20">
             <?php } ?></p>
                
                <?php

                if (isset($_SESSION['id']) && $_SESSION['id'] == 3){ ?>
                    <div class="button2">
                    <a class="confirm button3" href="deletecomment.php?id=<?= $row['id_rate']; ?>"> DELETE</a>
                    </div>
                    <?php
                } ?>
                </div>

    <?php  }?>
             <div class="button2">
                <a href="displaywine.php?id=<?= $id ?>" class="button3">RETURN</a>
            </div>

        </div>
    </article>
</section>

<?php 

include 'assets/php/footer.php'; 

?>