<?php

$page = 'vote_wine_post.php';
require 'assets/php/connect.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';

if (isset($_SESSION['id'])){
    $id_user = $_SESSION['id'];

    if(isset($_GET['id'])){
        $id_wine = $_GET['id'];
    
        if(!empty($_POST['fullname']) && !empty($_POST['vote']) && !empty($_POST['comment'])){
                        
            $user_fullname = htmlspecialchars($_POST['fullname']);
            $rate = $_POST['vote'];
            $comment = htmlspecialchars($_POST['comment']);
                             
             $sth = $db->prepare(" INSERT INTO rate(user_fullname,rate,comment, id_user, id_wine) VALUES (:user_fullname,:rate,:comment,:id_user,:id_wine)");
                $sth->bindValue(':user_fullname',$user_fullname);
                $sth->bindValue(':rate',$rate);
                $sth->bindValue(':comment',$comment);
                $sth->bindValue(':id_user',$id_user);
                $sth->bindValue(':id_wine',$id_wine);
                if($sth->execute()){


                    $sql = $db->query("SELECT * FROM wine WHERE id=$id_wine");
                    $sql->setFetchMode(PDO::FETCH_ASSOC);

                    $row = $sql->fetch();
                    $count_rate = $row['count_rate'] + 1;

                    $sth2 = $db->prepare(" UPDATE wine SET count_rate=:count_rate  WHERE id=:id");
                    $sth2->bindValue(':count_rate',$count_rate);
                    $sth2->bindValue(':id',$id_wine);
                    $sth2->execute();

                    header('Location:winelist.php');

                }else{
                    echo '<div class="danger">Something went wrong!</div>';
                }

        }else{
             echo '<div class="danger">You must fill out all required fields!</div>';
        }
    }else{
        echo '<div class="danger">$_GET is empty!</div>';
    }          
}else{
    echo "<div class ='danger'>You need to log into our website to access this page</div>";
    
}

        include 'assets/php/footer.php';?>