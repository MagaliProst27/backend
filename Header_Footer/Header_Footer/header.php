
<header>
<?php session_start();
if ((isset($_SESSION['login'])) || (!empty($_SESSION['login']))) 
{$user=$_SESSION['login']; }
if (isset($_SESSION["name"])) {
    
    
    ?>    <nav>
          
            
           
          <?php
           echo '<a href="index.php">Accueil</a>';
    echo '<br /><br /><a href="logout.php">Se déconnecter</a>';
    } else {
     
    header("location:pdo_login.php");
    }
    
    echo '<H1 class="form-legend">Bienvenue ' . $_SESSION["name"] . ' !</H1>';
  ?>
            <img class="logo headLogo" src="img\MenuizMan_logo.png" alt="logo">
        </nav>
</header>