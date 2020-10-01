<?php 
$page = 'add_wine.php';
require 'assets/php/connect.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';

if(isset($_SESSION['id'])){    
        
    
?>
<section>
    <article id="cartouche">
        <div id="text-welcome">
            <h2 class="ml3">ADD WINE</h2>
            <p>Please fill in all fields:</p>
            <form action="add_wine_post.php" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" name="name" placeholder="NAME" >
                </div>
                <div>
                    <input type="text" name="grapes" placeholder="GRAPES" >
                </div>
                <div>
                    <input type="text" name="year" placeholder="YEAR" >
                </div>
                <div>
                    <input type="text" name="country" placeholder="COUNTRY" >
                </div>
                <div>
                    <input type="text" name="region" placeholder="REGION" >
                </div>
                <div>
                    <input type="text" name="description" placeholder="DESCRIPTION" >
                </div>
                <div>
                    <label for="file" class="label-file">ADD PICTURE
                    <input id="file" class="input-file" type="file" name="picture">
                    </label>
                </div> 
                <div class="button">
                    <input type="submit" name="submit-wine" class="btn" value="ADD WINE">
                </div> 
            </form>
            <div class="button">
                <?php if($page == 'winelist.php'){?>
            <a href="winelist.php" class="btn2">RETURN</a>
                <?php }else{?>
                        <a href="profile.php" class="button3">RETURN</a>
            <?php  }?>
            </div>
        </div>
    </article>
</section>

<?php  
    }else{
        echo "<div class ='danger'>You need to log into our website to access this page</div>";
    
    } 
    
    include 'assets/php/footer.php';?>