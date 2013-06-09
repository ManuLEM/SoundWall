<?php

	$BDD = mysql_connect('localhost', 'root','');
	mysql_set_charset('utf8',$BDD);
	mysql_select_db('test');

	$sql = "SELECT * FROM interview";
	$sql = mysql_query($sql);

	$interview = array();
	while($data=mysql_fetch_array($sql)) {	
		$interview[] = array(
			"nom" => $data['nom']),
			"prenom" => $data['prenom']), // lors des caractère spéciaux
			"bio" => $data['bio']),
			"img" => $data['image']
		);
	}
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>test</title>
		<link rel="stylesheet" href="css/normalize.css"/>
		<link rel="stylesheet" href="css/sc-player-minimal.css" type="text/css">
		<link rel="stylesheet" href="css/style.css"/>
		<?php
			$interview = json_encode($interview);
		echo "<script>
				var interview = ".$interview.";
		</script>";
		?>
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/soundcloud.player.api.js"></script>
		<script type="text/javascript" src="js/sc-player.js"></script>
	</head>
	<body>
		<div id="haut">
			<div id="logo">

			</div>
			<div id="lecteur">
				<a href="https://soundcloud.com/macklemore/macklemore-x-ryan-lewis-cant" class="sc-player"></a>
			</div>
			<div id="info">

			</div>
		</div>
		<ul id="liste">
			
		</ul>
		<div id="footer">

		</div>
		<script>
			$(function() {
				$(document).ready(function(){
					for (var i = 0; i < interview.length; i++) {
						$('#liste').append("<li data-index='"+ i +"'></li>");
					};
					$('#liste li').click(function(){
						var index = $(this).attr('data-index');
						$('#info').html("<p id='ligne_nom'>hi there " + interview[index].prenom + "</p>");
					});
				});
			});
		</script>
	</body>
</html>