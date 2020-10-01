<?php

if($page == 'index.php'){
    echo '<body style="background-image: url(assets/img/main.jpg);">';
    
} elseif($page == 'register.php') {
    echo '<body style="background-image: url(assets/img/main.jpg);">';

} elseif($page == 'profile.php') {
    echo '<body style="background-image: url(assets/img/profile.jpg);">';
    
} elseif($page == 'modifyuser.php') {
    echo '<body style="background-image: url(assets/img/profile.jpg);">';

} elseif($page == 'modifyuser_post.php') {
    echo '<body style="background-image: url(assets/img/profile.jpg);">';
    
} elseif($page == 'displaywine.php') {
    echo '<body style="background-image: url(assets/img/displaywine.jpg);">'; 
} elseif($page == 'add_wine.php') {
    echo '<body style="background-image: url(assets/img/addwine.jpg);">';

} elseif($page == 'add_wine_post.php') {
    echo '<body style="background-image: url(assets/img/addwine.jpg);">';
    
} elseif($page == 'winelist.php') {
    echo '<body style="background-image: url(assets/img/displaywine.jpg);">';

} elseif($page == 'comments.php') {
    echo '<body style="background-image: url(assets/img/displaywine.jpg);">';

} elseif($page == 'vote.php') {
    echo '<body style="background-image: url(assets/img/tools.jpg);">';

} elseif($page == 'tools.php') {
    echo '<body style="background-image: url(assets/img/tools.jpg);">';

} elseif($page == 'modifywine.php') {
    echo '<body style="background-image: url(assets/img/addwine.jpg);">'; 

} elseif($page == 'modifywine_post.php') {
    echo '<body style="background-image: url(assets/img/addwine.jpg);">';  
}else{
    echo '<body>';
}