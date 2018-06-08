<?php
try {
		$bdd = new
	PDO('mysql:host=localhost;dbname=Annuaire;charset=utf8',
		'simoccauch19','azerty');
} catch (Exception $e) {
	die('Erreur:'.$e->getMessage());
}
$ville = $bdd->query('SELECT * FROM contacts WHERE ville ="Auch" ') ;
$email = $bdd->query('SELECT * FROM contacts WHERE email LIKE "%gmail.com"') ;
$cpt = $bdd->query('SELECT COUNT(*) AS nb_contacts FROM contacts') ;
$reponse = $bdd->query('SELECT * FROM contacts') ;

?>


<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="annuaire.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
	function afficher_div_masque() {
    var toto = document.getElementById("toto");
    toto.style.display = "block";
}
	</script>
	<title>Mon annuaire</title>
</head>
<body>
	<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Annuaire</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="Annuaire.php">Annuaire</a></li>
        <li><a href="AjouterContact.php">Nouveau contact</a></li>
      </ul>
    </div>
  </nav>
<div id="nbContact">
<?php

while($result=$cpt->fetch()){

      echo '<span>Nombre de contacts: ' . $result[0];
}
?>
</div>
<div id="contact">
<table>
<?php
while($donnees=$reponse->fetch()){
      echo '<tr><td>Nom: ' . $donnees['nom'] .'<td> Prénom: ' . $donnees['prenom']
	       . '<td> Email: ' . $donnees['email'] .'<td> Tel: ' . $donnees['telephone']
	       . '<td> Ville: ' . $donnees['ville'] ;
}
?>
</table>
</div>
<div id="contactAuch">
<table id="contactAuchT">
<?php
while($retour=$ville->fetch()){
	echo '<tr><td id="contactTD">Contacts habitants à Auch: ' . $retour['nom'] ;

}
?>
</table>
</div>
<div id="boutton">
<button class="waves-effect waves-light btn-small" title="Afficher le div" onclick="afficher_div_masque()">Contacts avec une adresse gmail</button>
</div>
<div id="toto" style="display:none;">
<table>
<?php
while($retour_email=$email->fetch()){
	echo '<tr><td id="gmail">Contacts avec adresse gmail: ' . $retour_email['nom'] ;
 }
$up = $bdd->query('UPDATE contacts SET email = "ogatien@simplon.co" WHERE id = 18');
 
// $de = $bdd->query('DELETE FROM appartenir WHERE fk_contact = 1 ');
//$del = $bdd->query('DELETE FROM contacts WHERE id = 1')
?>
</table>
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


