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

 //appel de la base de donnée
 echo "<main>";
 

        $mysqlConnection = new PDO('mysql:host=localhost;dbname=menuiz;charset=utf8', 'root', '');
        $produitStatement = $mysqlConnection->prepare('SELECT * FROM T_D_PRODUCT_PRD');

        $produitStatement->execute();
        $produits = $produitStatement->fetchAll();

        // On affiche chaque produit un à un
        foreach ($produits as $produit) {
        ?>
          <div class="card" id="product<?php echo $produit['PRD_ID'];?>">
                <p><?php echo $produit['PRD_DESCRIPTION']; ?> </p>
                <img src="https://youngplanneur.fr/wp-content/uploads/2018/09/portail-coulissant-aluminium-rioave-gris-l-350-cm-x-h-180-cm.jpg" alt="" >
                <p> garantie : <?php echo $produit['PRD_GUARANTEE']; ?> mois</p>
                <p><?php echo $produit['PRD_PRICE'];?> €</p>
                <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
 <?php
                echo '<a href="panier.php?action=ajout&amp;id_produit=' . $produit['PRD_ID'] . '&amp;quantite=1" 
       onclick="window.open(this.href, '', 
       'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes,
        copyhistory=no, width=600, height=350'); return false;"
          class="add-to-cart btn btn-primary">Ajouter au panier</a>';
               ?>
                </div>
        <?php
        }
       
    //   
        echo "</main>";
        include "panier.php";
    // FOOTER
     include "footer.php";
?>
</body>
</html>