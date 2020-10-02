<?php

$page = 'add_wine_post.php';
require 'assets/php/connect.php';
include 'assets/php/background-image.php';
include 'assets/php/header.php';
include 'assets/php/nav.php';
          
if(!empty($_POST['name']) && !empty($_POST['grapes']) && !empty($_POST['year']) && !empty($_POST['country']) && !empty($_POST['region']) && !empty($_POST['description'])){ // RECUPERE LES DONNEES DU FORMULAIRE
                
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
                // si l'upload réussi on envoie la requete
                     
                    $sth = $db->prepare(" INSERT INTO wine(name,grapes,wine_year,country,region,description,picture,id_user) VALUES (:name,:grapes,:wine_year,:country,:region,:description,:picture,:id_user)");
                        $sth->bindValue(':name',$name);
                        $sth->bindValue(':grapes',$grapes);
                        $sth->bindValue(':wine_year',$year);
                        $sth->bindValue(':country',$country);
                        $sth->bindValue(':region',$region);
                        $sth->bindValue(':description',$description);
                        $sth->bindValue(':picture',$upload_name);
                        $sth->bindValue(':id_user',$_SESSION['id']);
                        $sth->execute();
                        
                else: 
                    echo '<div class="danger">Error in uploading the file</div>';
                    die();
                endif;
            else: 
                echo '<div class="danger">The size of the file is not suitable</div>';
                die();
            endif;
            echo '<div class="success">Congrats your wine list has been updated!</div>';
            header('location:winelist.php');

}else{
     echo '<div class="danger">You must fill out all required fields!</div>';
}

        include 'assets/php/footer.php';?>