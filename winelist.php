<?php 
$page = 'winelist.php';
require 'assets/php/connect.php';
require 'assets/php/function.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';

$sql = $db->query("SELECT * FROM wine");
$sql->setFetchMode(PDO::FETCH_ASSOC);

?>

<section>
      
    <article id="cartouche">
        <div id="text-welcome">
        <h2 class="ml3">Welcome to MyCave!</h2>
            <h3>WINE LIST</h3>
            <?php if(isset($_SESSION['id'])){ 
            ?>
            <p>Search for wine or you can also add a new entry to MyCave:</p>
            <div class="button">
                <a href="add_wine.php" class="button3">ADD WINE</a>
            </div>
        <?php
        }?>
        
            <p>You can find your favorite wine in our list below:</p>
            <form action="">
                <input id="search" type="text" placeholder="Search for wines..." name="search">
            </form>
            <div id="results" class="flex">
                <?php while($row = $sql->fetch()){ 
        ?>
                <div id="card" class="center">
                    <img src="<?=$row['picture'];?>" alt="image_wine" widht="200" height="150" style="border-radius:10px">
                    <h2><?= $row['name']; ?></h2>
                    <p><?= $row['grapes']; ?></p>
                    <p><?= $row['wine_year']; ?></p>
                    <p><?= shorten_text($row['description']); ?></p>
                    <a class="button3" href="displaywine.php?id=<?= $row['id']; ?>">SEE WINE</a>
                <?php 
                    if(isset($_SESSION['id'])){ ?>
                        
                             <a class="button3" href="modifywine.php?id=<?= $row['id']; ?>">MODIFY</a>
                            <a class="button3" href="deletewine.php?id=<?= $row['id']; ?>">DELETE</a>
                            <p>Give this wine a chance to shine:</p>
                            <a class="button3" href="vote.php?id=<?= $row['id']; ?>">RATE</a>
                        
                <?php } ?>
                </div>
            <?php } ?>
                
            </div>
            
        <?php if(!isset($_SESSION['id'])){
            ?>
             <div class="button2">
                <a href="index.php" class="button3">RETURN</a>
            </div>
            <?php
        }?>
        
        <?php if(isset($_SESSION['id'])){ 
            ?>
            <div class="button2">
                <a href="profile.php" class="button3">RETURN</a>
            </div>
        <?php
        }?>
        </div> 
    </article>

</section>

<?php include 'assets/php/footer.php'; ?>