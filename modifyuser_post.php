<?php
$page = 'modifyuser_post.php';
require 'assets/php/connect.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';

if(isset($_GET['id'])){ // SI L'ID EST BIEN RECUPEREE
    
if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email'])){
    $prenom = htmlspecialchars($_POST['firstname']);
    $nom = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $id = $_GET['id'];
    
    $sth = $db->prepare("UPDATE user SET firstname=?, lastname=?, email=? WHERE id=?"); // MISE A JOUR DE L'USER

    $sth->bindValue(1, $prenom);
    $sth->bindValue(2, $nom);
    $sth->bindValue(3, $email);
    $sth->bindValue(4, $id);
    // si la requete s'execute on affiche un msg de succès
    if($sth->execute()){
        echo "<div class ='success'>User profile has been updated!</div>";
        header("Location:tools.php"); // REDIRECTION
        

    }else{
        echo "<div class ='danger'>Something when wrong!</div>";
        
    }
}
}
?>