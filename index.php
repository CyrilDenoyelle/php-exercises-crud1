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
		foreach ($bdh->query('SELECT * FROM clients AS C, cards AS A WHERE C.cardNumber = A.cardNumber AND A.cardTypesId = 1') as $r) {
			echo $r['lastName'] . " " . $r['firstName'] . "<br />";
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

</body>
</html>