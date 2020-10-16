<?php 
$page = 'register.php';
require 'assets/php/connect.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';

if (isset($_SESSION['id']) && $_SESSION['id'] == 3){
    // SEULEMENT VISIBLE DES ADMINISTRATEURS

if (isset($_POST['submit-signup'])){
    $user_email = htmlspecialchars($_POST['user_email_signup']);
    $user_pass = htmlspecialchars($_POST['user_password_signup']);
    $user_pass2 = htmlspecialchars($_POST['user_password_2_signup']);
    if($sql = $db->query("SELECT * FROM user WHERE email = '$user_email'")){ // VERIFICATION DE L'EMAIL EXISTANT OU NON
        $compteur = $sql->rowCount();
        if($compteur != 0){
            $message = "<div class ='danger'>This email already exists! </div>";
        }elseif(!empty($user_email) && !empty($user_pass)){
            if($user_pass == $user_pass2){
                $user_pass = password_hash($user_pass, PASSWORD_DEFAULT);
                $sth = $db->prepare("INSERT INTO user (email, password) VALUES (:email,:password)");
                $sth->bindValue(':email',$user_email);
                $sth->bindValue(':password',$user_pass);
                if($sth->execute()){
                    echo "<div class ='success'>User added with success!</div>";
                    header('Location:tools.php');
                    
                }
            }else{
                echo "<div class ='danger'>Passwords don't match'</div>";
                ;
            }
        }else{
            echo "<div class ='danger'>You must enter a password</div>";
            
        }
}else{
    echo "<div class ='danger'>Something went wrong!</div>";
    
}

}
?>

<section>
    <article id="cartouche">
        <div id="text-welcome">
            <h2 class="ml3">REGISTER NEW USER</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div>
                    <input type="text" name="user_email_signup" placeholder="EMAIL">
                </div>
                <div>
                    <input type="password" name="user_password_signup" placeholder="PASSWORD">
                </div>
                <div>
                    <input type="password" name="user_password_2_signup" placeholder="CONFIRM PASSWORD">
                </div>
                <div>
                    <input type="submit" name="submit-signup" class="button3" value="ADD NEW USER">
                </div>
            </form>
            <div class="button">
                <a href="profile.php" class="button3">RETURN</a>
            </div>
        </div>
    </article>
</section>

<?php 

}else{
    echo "<div class ='danger'>You need privilege user admin to access this page!</div>";
}include 'assets/php/footer.php'; ?>