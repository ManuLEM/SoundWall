<?php

	$BDD = mysql_connect('localhost', 'root','');
	mysql_set_charset('utf8',$BDD);
	mysql_select_db('test');

	$sql = "SELECT * FROM information";
	$sql = mysql_query($sql);

	$interview = array();
	while($data=mysql_fetch_array($sql)) {	
		$interview[] = array(
			"id" => $data['id'],
			"nom" => iconv("UTF-8", "ISO-8859-1//TRANSLIT", $data['nom']),
			"prenom" => iconv("UTF-8", "ISO-8859-1//TRANSLIT", $data['prenom']), // lors des caractère spéciaux
			"bio" => iconv("UTF-8", "ISO-8859-1//TRANSLIT", $data['bio']),
			"wiki" => $data['wiki'],
			"facebook" => $data['facebook'],
			"twitter" => $data['twitter'],
			"site" => $data['site'],
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
		<link rel="stylesheet" href="css/style.css"/>
		<?php
			$interview = json_encode($interview);
		echo "<script>
				var interview = ".$interview.";
		</script>";
		?>
		<script type="text/javascript" src="scripts/soundcloud.player.api.js"></script>
		<script type="text/javascript">
		   soundcloud.addEventListener('onPlayerReady', function(player, data) {

   			});
		</script>
		<div id="haut">
			<div id="logo">

			</div>
			<div id="lecteur">
				<object height="81" width="100%" id="myPlayer" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
  					<param name="movie" value="http://player.soundcloud.com/player.swf?url=https://soundcloud.com/matas/hobnotropic&enable_api=true&object_id=myPlayer"></param>
 					<param name="allowscriptaccess" value="always"></param>
 					<embed allowscriptaccess="always" height="81" src="http://player.soundcloud.com/player.swf?url=https://soundcloud.com/matas/hobnotropic&enable_api=true&object_id=myPlayer" type="application/x-shockwave-flash" width="100%" name="myPlayer"></embed>
				</object>
			</div>
			<div id="info">

			</div>
		</div>
		<ul id="liste">
			
		</ul>
		<div id="footer">
			
		</div>
		<script >
				for (var l = 0; l < 30; l++) {
					document.getElementById('liste').innerHTML += "<li id='number_"+ (l+1) +"' onclick='details(this)'></li>";
				};
		</script>
	</body>
</html>