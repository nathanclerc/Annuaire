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

$reponse = $bdd->query('SELECT * FROM contacts') ;
while($donnees=$reponse->fetch()){
      echo '<tr><td>Nom: ' . $donnees['nom'] .'<td> Prénom:' . $donnees['prenom'] . '<td> Email: ' . $donnees['email'] .'<td> Tel:' . $donnees['telephone'] . '<td> Ville' . $donnees['ville'] ;
}

?>

</table>
</body>
</html>