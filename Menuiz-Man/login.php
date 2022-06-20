<?php
 
session_start();
include("infos.php");
include("modelUsers.php");
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {
    $userM = new ModelUsers(0);
// include("connexion.php");
$utilisateur = $userM->RecupUserByMail($email)->fetchAll();
        
// s'il ya un utilisateur en bdd avec l'email saisi
if (!empty($utilisateur[0])){
$_SESSION["prenom_nom"] = "Moi";
// ucfirst(strtolower($user[0]["prenom"])) .
// " "  .  strtoupper($user[0]["nom"]);
$_SESSION["connecter"] = "yes";
header("location:session.php");
} else
$erreur = "Mauvais login ou mot de passe!";
}
?>
 
<!DOCTYPE  html>
<html>
<head>
<meta  charset="utf-8"  />
<style>
* {
font-family: arial;
}
body {
margin: 20px;
}
 
form {
position: absolute;
top: 50%;
left: 50%;
margin-left: -150px;
margin-top: -100px;
}
h1 {
text-align: center;
color: #FFFAFA;
background: gray;
}
 
input[type=submit] {
border: solid  1px  violet;
margin-bottom: 10px;
float: right;
padding: 15px;
outline: none;
border-radius: 7px;
width: 120px;
}
input[type=text],
[type=password] {
border: solid  1px  violet;
margin-bottom: 10px;
padding: 16px;
outline: none;
border-radius: 7px;
width: 300px;
}
.erreur {
text-align: center;
color: red;
margin-top: 10px;
}
 
a {
font-size: 14pt;
color: blue;
text-decoration: none;
font-weight: normal;
}
a:hover {
text-decoration: underline;
}
</style>
</head>
<body >
<h1>Authentification</h1>
<div  class="erreur"><?php  echo  $erreur  ?></div>
<form  name="form"  method="post"  action="">
<input  type="email"  name="email"  placeholder="Votre email"  /><br  />
<input  type="password"  name="password"  placeholder="Mot de passe"  /><br  />
<input  type="submit"  name="valider"  value="S'authentifier"  />
<a  href="inscription.php">Créer votre Compte</a>
</form>
</body>
</html>