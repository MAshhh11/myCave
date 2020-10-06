<header>
    <nav id="navbar">
        <ul id="navbar-ul">

        <li><a href="index.php"><img id="pic" src="assets/img/logo-largeW.png" alt="logo"></a></li>
        <?php // si il y a une session et que l'id est 6 alors on affiche les "admin tools"
        if (isset($_SESSION['id']) && $_SESSION['id'] == 3){
        ?>
            <li>
            <a href="tools.php">ADMIN</a>
            </li>
            
        <?php } 
        if (isset($_SESSION['id'])){
        ?>
            <li>
            <a href="profile.php">PROFILE</a>
            </li>
            
        <?php } ?>
        <?php // si il n'y a pas de session alors on affiche "login"
        if (empty($_SESSION)){
        ?>
            <li>
            <a href="index.php">LOGIN</a>
            </li>
      <?php
      }
      ?>
      <?php // si un utilisateur est connecté on "affiche mon compte"
      if (isset($_SESSION['email'])){
        ?>
        <li>
        <a href="?logout" >LOGOUT</a>
        </li>
        <?php
      }
      ?>
      
        </ul>
    </nav>
</header>