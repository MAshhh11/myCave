<?php

if($page == 'index.php'){
    echo '<body style="background-image: url(assets/img/main.jpg); background-size: 200%; background-position:50% 0%; width: 100%">';
    
} elseif($page == 'register.php') {
    echo '<body style="background-image: url(assets/img/main.jpg); background-size: 200%; background-position:50% 0%; width: 100%">';

} elseif($page == 'profile.php') {
    echo '<body style="background-image: url(assets/img/profile.jpg); background-size: 200%; background-position:50% 50%; width: 100%">';
    
} elseif($page == 'modifyuser.php') {
    echo '<body style="background-image: url(assets/img/profile.jpg); background-size: 200%; background-position:50% 50%; width: 100%">';

} elseif($page == 'modifyuser_post.php') {
    echo '<body style="background-image: url(assets/img/profile.jpg); background-size: 200%; background-position:50% 50%; width: 100%">';
    
} elseif($page == 'displaywine.php') {
    echo '<body style="background-image: url(assets/img/displaywine.jpg); background-size: 200%; background-position:50% 0%; width: 100%">'; 
    
} elseif($page == 'add_wine.php') {
    echo '<body style="background-image: url(assets/img/addwine.jpg); background-size: 200%; background-position:60% 0%; width: 100%">';

} elseif($page == 'add_wine_post.php') {
    echo '<body style="background-image: url(assets/img/addwine.jpg); background-size: 200%; background-position:60% 0%; width: 100%">';
    
} elseif($page == 'winelist.php') {
    echo '<body style="background-image: url(assets/img/displaywine.jpg); background-size: 200%; background-position:50% 0%; width: 100%">';

} elseif($page == 'tools.php') {
    echo '<body style="background-image: url(assets/img/tools.jpg); background-size: 200%; background-position:60% 0%; width: 100%">';

} elseif($page == 'modifywine.php') {
    echo '<body style="background-image: url(assets/img/addwine.jpg); background-size: 200%; background-position:60% 0%; width: 100%">'; 

} elseif($page == 'modifywine_post.php') {
    echo '<body style="background-image: url(assets/img/addwine.jpg); background-size: 200%; background-position:60% 0%; width: 100%">';  
}else{
    echo '<body>';
}