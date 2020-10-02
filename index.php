<?php 
$page = 'index.php';
require 'assets/php/connect.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';

if(isset($_POST['submit-login'])){ // VERIFICATION D'IDENTIFIANTS
    $user_email = htmlspecialchars($_POST['user_email']);
    $user_pass = htmlspecialchars($_POST['user_password']);
   $sql= $db->query("SELECT * FROM user WHERE email ='$user_email'");
   
    if($row = $sql->fetch()){
            $db_id = $row['id'];
            $db_email = $row['email'];
            $db_pass = $row['password'];
        
        if(password_verify($user_pass,$db_pass)){
            $_SESSION['id'] = $db_id;
            $_SESSION['email'] = $db_email;

            echo '<div class="success">Welcome to our website!</div>';
            header('Location:profile.php');
            
        }else{
            echo '<div class="danger">Incorrect Password!</div>';
        }
   }else{
       echo '<div class="danger">Unknown User ID!</div>';
    }
}
?>

<section>
    <article id="cartouche">
        <div id="text-welcome">
            <h1 class="ml3">WELCOME TO MYCAVE</h1>
            <p>If you are a member of the staff, please login to myCave:</p>
        <!-- FORMULAIRE -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div>
                    <input type="text" name="user_email" placeholder="EMAIL">
                </div>
                <div>
                    <input type="password" name="user_password" placeholder="PASSWORD">
                </div>
                <div>
                    <input type="submit" name="submit-login" class="btn" value="LOGIN">
                </div>
                <div>
                    <a href="winelist.php" class="button3">SEE OUR WINE GALLERY</a>
                </div>  
            </div>
            </form>
        </div>
    </article>
</section>

<?php include 'assets/php/footer.php'; ?>