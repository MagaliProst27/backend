<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Accueil </title>
</head>
<body>   
 <?php
 // HEADER
 include "header.php";
    echo "<main>";

            echo '<div id="admin-box" class="box-container">';
            echo '<div class="adminPage">';
            echo '<div class="fold-container shadow form-admin">';
                 
                    echo "<H1 class='form-legend'>Bienvenue Administrateur</H1>";
                  
            echo '</div>';
            echo '</div>'; 
            echo '<div class="adminPage">';
            echo '<div  class="fold-container shadow form-admin">';
       
            echo '</div>';
            echo '</div>';
            echo '</div>';
       
echo'<div class="article">';
echo '<img src="img/kit1.PNG" alt="">';
echo '<img src="img/cloture1.PNG" alt="">';
echo '<img src="img/portail1.PNG" alt=""> ';
'</div>';

   
   

    echo "</main>";
    // FOOTER
     include "footer.php";
?>
</body>
</html>