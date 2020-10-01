<?php 
$page = 'modifywine.php';
require 'assets/php/connect.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';


if(isset($_SESSION['id'])){   
    if(isset($_GET['id'])) {

        $id = $_GET['id'];
        $sql = $db->query("SELECT * FROM wine WHERE id=$id");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
    
        $result = $sql->fetch();
    }

?>

<section>
<article id="cartouche">
<div id="text-welcome">
    <h2 class="ml3">MODIFY WINE</h2>
    <form action="modifywine_post.php?id=<?= $result['id'] ?>" method="post" enctype="multipart/form-data">
        <div>
            <input type="text" name="name" value="<?= $result['name'] ?>" >
        </div>
        <div>
            <input type="text" name="grapes" value="<?= $result['grapes'] ?>" >
        </div>
        <div>
            <input type="text" name="year" value="<?= $result['wine_year'] ?>" >
        </div>
        <div>
            <input type="text" name="country" value="<?= $result['country'] ?>" >
        </div>
        <div>
            <input type="text" name="region" value="<?= $result['region'] ?>" >
        </div>
        <div>
            <input type="text" name="description" value="<?= $result['description'] ?>" >
        </div>
        <div>
            <label for="file" class="label-file">ADD PICTURE
            <input id="file" class="input-file" type="file" name="picture">
            </label>
        </div> 
        <div class="button">
            <input type="submit" name="submit-wine" class="btn2" value="UPDATE WINE">
        </div> 
    </form>
    <div class="button">
    <a href="winelist.php" class="button3">RETURN</a>
    </div>
</div>
</article>
</section>

<?php  
}else{
echo "<div class ='danger'>You need to log into our website to access this page</div>";

} 

include 'assets/php/footer.php';?>
