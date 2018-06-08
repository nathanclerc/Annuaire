<html>
<head>
	<title>Ajouter un contact</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="ajoutercontact.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
</head>
<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Annuaire</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="Annuaire.php">Annuaire</a></li>
        <li><a href="AjouterContact.php">Nouveau contact</a></li>
      </ul>
    </div>
  </nav>

<body>
	<div id="title">
	<h1 id="titre1">Ajouter un nouveau contact</h1>
	<h3 id="titre2">Attention les champs nom, prénom et email sont obligatoire!!!</h3>
	</div>
	<div id="form">
<form method="POST" ACTION="">
<label>Nom</label>
<input type="text" name="nom" size="20" maxlength="20"> 
<label>Prénom</label>
<input type="text" name="prenom" size="20" maxlength="20">
<label>Email</label>
<input type="text" name="email" size="20" maxlength="20"> 
<label>Entreprise</label>
<input type="text" name="entreprise" size="20" maxlength="20"> 
<label>Date de naissance</label>
<input type="text" name="datenaissance" size="20" maxlength="20"> 
<label>Rue</label>
<input type="text" name="rue" size="20" maxlength="20"> 
<label>Code postal</label>
<input type="text" name="cp" size="20" maxlength="20"> 
<label>Ville</label>
<input type="text" name="ville" size="20" maxlength="20"> 
<label>Tel</label>
<input type="text" name="telephone" size="20" maxlength="20"> 
<button  class="btn waves-effect waves-light" name="submit" type="submit" value="Envoyer">Envoyer</button>
</form>
</div>
</body>
        <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">En voir plus</h5>
                <p class="white-text">Merci d'avoir regarder mon annuaire.</br> A bientôt!</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Plus de lien</h5>
                <ul>
                  <li><a class="white-text" href="#!"><i class="fa fa-twitch"></i> Twitch</a></li>
                  <li><a class="white-text" href="#!"><i class="fa fa-twitter"></i> Twitter</a></li>
                  <li><a class="white-text" href="#!"><i class="fa fa-facebook-square"></i> Facebook</a></a></li>
                  <li><a class="white-text" href="#!"><i class="fa fa-youtube"></i> Youtube</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2018 Copyright
            </div>
          </div>
        </footer>
</html>
 
<?php

if(!empty($_POST['submit'])){
if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']))
{
echo 'Champs bien remplis, insertion dans la base de donnée.'; 
//Insertion dans la BDD de la saisie du formulaire
    try {
         $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
         $bdd = new PDO('mysql:host=localhost;dbname=Annuaire;charset=utf8', 'simoccauch19','azerty', $pdo_options);

         $req = $bdd->prepare('INSERT INTO contacts(nom, prenom, email, entreprise, datenaissance, rue, cp, ville, telephone)
   VALUES(:nom, :prenom, :email, :entreprise, :datenaissance, :rue, :cp, :ville, :telephone)');
$req->execute(array(
     ':nom' => $_POST['nom'],
     ':prenom' => $_POST['prenom'],
     ':email' => $_POST['email'],
     ':entreprise' => $_POST['entreprise'],
     ':datenaissance' => $_POST['datenaissance'],
     ':rue' => $_POST['rue'],
     ':cp' => $_POST['cp'],
     ':ville' => $_POST['ville'],
     ':telephone' => $_POST['telephone']
    ));

         header('Location: AjouterContact.php');
        }
    catch (Exception $e)
        {
        die('Erreur : ' . $e->getMessage());
        }
}
}
?>
