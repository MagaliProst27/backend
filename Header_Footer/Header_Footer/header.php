
<header>
<?php session_start();
if ((isset($_SESSION['login'])) || (!empty($_SESSION['login']))) 
{$user=$_SESSION['login']; }
    ?>    <nav>
            <h3><?php echo "Utilisateur : ".$user." "; ?> </h3>
            <a href="index.php">Accueil</a>
           
           
           
            <img class="logo headLogo" src="img\MenuizMan_logo.png" alt="logo">
        </nav>
</header>