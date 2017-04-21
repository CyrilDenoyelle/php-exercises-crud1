<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>coucoucoucoucoucocuocucoucoucou</title>
</head>
<body>
	<?php 
	// $pdo= new PDO('mysql:host=localhost;dbname=colyseum','root','root');
	try {
		$bdh = new PDO('mysql:host=localhost;dbname=colyseum','root','root');
		//$bdh = null;
	} catch (PDOException $e) {
		print "Erreur !:".$e->getMessage()."<br />";
		die();
	}
	?>
	
	<h2>exercice 1</h2>
	<ul>		
		<?php 
		foreach($bdh->query('SELECT * FROM clients') as $row){
			echo "<li>" . $row['id'] . ' - ' . $row['lastName'] . ' ' . $row['firstName'] . '</li>';
		}
		?>
	</ul>
	
	<h2>exercice 2</h2>
	<ul>		
		<?php 
		foreach ($bdh->query('SELECT * FROM showTypes') as $row) {
			echo "<li>" . utf8_encode($row['type']) . "</li>";
		}
		?>
	</ul>
	
	<h2>exercice 3</h2>
	<ul>		
		<?php 
		foreach ($bdh->query('SELECT * FROM clients LIMIT 20') as $row) {
			echo "<li>" . $row['id'] . ' - ' . $row['lastName'] . ' ' . $row['firstName'] . '</li>';
		}
		?>
	</ul>

	<h2>exercice 4</h2>
	<ul>
		<?php 
		foreach ($bdh->query('SELECT * FROM clients AS client, cards AS card WHERE client.cardNumber = card.cardNumber AND card.cardTypesId = 1') as $r) {
			echo "<li>" . $r['lastName'] . " " . $r['firstName'] . "</li>";
		}
		?>
	</ul>

	<h2>exercice 5</h2>
	<ul>
		<?php 
		foreach($bdh->query('SELECT * FROM clients WHERE lastName LIKE "M%" ORDER BY lastName ASC') as $row){
			echo "<li> Nom :" . $row['lastName'] . '<br> Prénom :' . $row['firstName'] . '</li>';
		}
		?>
	</ul>

	<h2>exercice 6</h2>
	<ul>
		<?php 
		foreach ($bdh->query('SELECT title, performer, date, startTime FROM shows ORDER BY title ASC') as $r) {
			echo "<li>" . $r['title'] . " par " . $r['performer'] . ", le " . $r['date'] . " à " . $r['startTime'] . "</li>";
		}
		?>
	</ul>

	<h2>exercice 7</h2>
	<ul>
		<?php 
		foreach ($bdh->query('SELECT * FROM clients LEFT OUTER JOIN cards ON clients.cardNumber = cards.cardNumber') as $r) {
			echo '<li>Nom :' . $r['lastName'] .  '<br /> Prénom :' . $r['firstName'] .  '<br /> Date de naissance :' . $r['birthDate'] . "<br /> Carte de fidélité: ";
			if($r['card']){
				echo 'Numéro de carte :' . $r['cardNumber'] . "</li>";
			}else{
				echo "Pas de carte" . "</li>";
			}
		}
		?>
	</ul>

</body>
</html>