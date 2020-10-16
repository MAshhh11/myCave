<?php 
$page = 'modifywine.php';
require 'assets/php/connect.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';


if(isset($_SESSION['id'])){    // VISIBLE SEULEMENT DES USERS
    if(isset($_GET['id'])) { 

        $id = $_GET['id']; // RECUPERE L'ID
        $sql = $db->query("SELECT * FROM wine WHERE id=$id");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
    
        $result = $sql->fetch(); // AFFICHAGE LES DONNEES DU VIN A MODIFIER
    }

?>

<section>
<article id="cartouche">
<div id="text-welcome">
    <h2 class="ml3">MODIFY WINE</h2>
    <p>Please, modify the information provided:</p>
    <form action="modifywine_post.php?id=<?= $result['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="flex3">
    <div>
        <div>
            <input type="text" name="name" value="<?= $result['name'] ?>" >
        </div>
        <div>
            <input type="text" name="grapes" value="<?= $result['grapes'] ?>" >
        </div>
        <div>
            <input type="text" name="year" value="<?= $result['wine_year'] ?>" >
        </div>
    </div>
    <div>
        <div>
            <input type="text" name="country" value="<?= $result['country'] ?>" >
        </div>
        <div>
            <input type="text" name="region" value="<?= $result['region'] ?>" >
        </div>
        <div>
            <input type="text" name="description" value="<?= $result['description'] ?>">
        </div>
        </div> 
    </div>
        <div>
            <label for="file" class="label-file">ADD PICTURE
            <input id="file" class="input-file" type="file" name="picture">
            </label>
        </div> 
        <div class="button2">
            <input type="submit" name="submit-wine" class="button3" value="UPDATE WINE">
        </div>
    </form>
    <div class="button">
    <a href="displaywine.php?id=<?= $id ?>" class="button3">RETURN</a>
    </div>
</div>
</article>
</section>

<?php  
}else{
echo "<div class ='danger'>You need to log into our website to access this page</div>";

} 

include 'assets/php/footer.php';?>
