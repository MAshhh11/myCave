<?php
$page = 'deleteuser.php';
require 'assets/php/connect.php';
require 'assets/php/function.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';

if (isset($_SESSION['id']) && $_SESSION['id'] == 3){ // VISIBLE SEULEMENT DES ADMINS
   
        if(isset($_GET['id'])){
            $id = $_GET['id']; // RECUPERE L'ID
            $sth = $db->prepare("DELETE FROM user WHERE id = $id");
            $sth->execute();
            
            if($sth){
                echo "<div class ='success'>User detected!</div>";
                header("Location:tools.php");
            }else{
                echo "<div class ='danger'>Something when wrong!</div>";
                
            }
        }
}else{
        echo "<div class ='danger'>You need privilege user admin</div>";
    }

?>