<?php
$page = 'modifywine_post.php';
require 'assets/php/connect.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';

if(isset($_SESSION['id'])){ // VISIBLE SEULEMENT DES USERS
    
if(isset($_GET['id'])){
    
    $id = $_GET['id']; // RECUPERE L'ID'
    if(!empty($_POST['name']) && !empty($_POST['grapes']) && !empty($_POST['year']) && !empty($_POST['country']) && !empty($_POST['region']) && !empty($_POST['description'])){
        $file = $_FILES['picture'];
        $name = htmlspecialchars($_POST['name']);
        $grapes = $_POST['grapes'];
        $year = $_POST['year'];
        $country = $_POST['country'];
        $region = htmlspecialchars($_POST['region']);
        $description = htmlspecialchars($_POST['description']);
        
        if($file['size'] <= 1000000): // si la taille de fichier n'excède pas 1000000 alors on l'upload
            $dbname = uniqid() . '_' . $file['name'];
            $upload_dir = "upload/img/";
            $upload_name = $upload_dir . $dbname;
            $move_result = move_uploaded_file($file['tmp_name'], $upload_name);
            if($move_result):
                 
                $sth = $db->prepare(" UPDATE wine SET name=:name, grapes=:grapes,wine_year=:wine_year, country=:country, region=:region, description=:description ,picture=:picture, id_user=:id_user  WHERE id=:id
                ");
                   $sth->bindValue(':name',$name);
                   $sth->bindValue(':grapes',$grapes);
                   $sth->bindValue(':wine_year',$year);
                   $sth->bindValue(':country',$country);
                   $sth->bindValue(':region',$region);
                   $sth->bindValue(':description',$description);
                   $sth->bindValue(':picture',$upload_name);
                   $sth->bindValue(':id_user',$_SESSION['id']);
                   $sth->bindValue(':id',$id);
                   $sth->execute();
            else: 
                echo '<div class="danger">Error in uploading the file</div>';
                
                die();
            endif;
        else: 
            echo '<div class="danger">the size of the file is not suitable</div>';
            
            die();
        endif;
        echo '<div class="success">Your modifications have been saved!</div>';
        header('location:winelist.php');
        

    }else{
        echo '<div class="danger">You must fill out all required fields</div>';
    }

}

}else{
    echo "<div class ='danger'>You need to log into our website to access this page</div>";
}
?>