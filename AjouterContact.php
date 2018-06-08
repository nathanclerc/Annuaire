<html>
<head>
	<title>Ajouter un contact</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Ajouter un nouveau contact</h1>
	<h3>Attention les champs nom, prénom et email sont obligatoire!!!</h3>
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
<button name="submit" type="submit" value="Envoyer">envoyer</button>
</form>
</body>
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
