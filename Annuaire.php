<?php
try {
		$bdd = new
	PDO('mysql:host=localhost;dbname=Annuaire;charset=utf8',
		'simoccauch19','azerty');
} catch (Exception $e) {
	die('Erreur:'.$e->getMessage());
}
?>
<html>
<head>
	<title>Mon annuaire</title>
</head>
<body>
	<table>
<?php
$ville = $bdd->query('SELECT * FROM contacts WHERE ville ="Auch" ') ;
$email = $bdd->query('SELECT * FROM contacts WHERE email LIKE "%gmail.com"') ;
$cpt = $bdd->query('SELECT COUNT(*) AS nb_contacts FROM contacts') ;
$reponse = $bdd->query('SELECT * FROM contacts') ;
while($donnees=$reponse->fetch()){
      echo '<tr><td>Nom: ' . $donnees['nom'] .'<td> Prénom:' . $donnees['prenom'] . '<td> Email: ' . $donnees['email'] .'<td> Tel:' . $donnees['telephone'] . '<td> Ville' . $donnees['ville'] ;
}
while($result=$cpt->fetch()){



      echo '<tr><td>Nombre de contacts= ' . $result[0];

}
while($retour=$ville->fetch()){
	echo '<tr><td>Contacts habitants à Auch= ' . $retour['nom'] ;

}
while($retour_email=$email->fetch()){
	echo '<tr><td>Contacts avec adresse gmail= ' . $retour_email['nom'] ;
 }
if(!empty($_POST['modifier'])) {
	$up = $bdd->query('UPDATE contacts SET email = "ogatien@simplon.co" WHERE id = 18');
	echo "email bien modifier";
}
 
 /*
 $de = $bdd->query('DELETE FROM appartenir WHERE fk_contact = 1 ');
 $del = $bdd->query('DELETE FROM contacts WHERE id = 1')
*/
?>

</table>
<form  methode="POST"><button type="button" name="modifier">Modifier l'id 18</button></form>

</body>
</html>


