
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Lisamine</title>
</head>

<body>		
		
		<div id="body">
			<div class="blog">
				<div id="content">
					<h2>Lisa mälestusmärk siin:</h2><br>
		<?php
	require_once("konf.php");
  
	  if(!empty($_REQUEST["nimi"])){
		 $kask=$yhendus->prepare(
		  "INSERT INTO malestusmargid(Nimi, Asukoht, Autor, AvamiseAeg, TaasavamiseAeg, Info, Tyyp, Lat, Lng) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		 $kask->bind_param("sssssssdd", $_REQUEST["nimi"], $_REQUEST["asukoht"], $_REQUEST["autor"], $_REQUEST["avamine"], $_REQUEST["taasavamine"], $_REQUEST["info"], $_REQUEST["tyyp"], $_REQUEST["lat"], $_REQUEST["lng"]);
		 $kask->execute();
		 echo $yhendus->error;
		 header("Location: $_SERVER[PHP_SELF]");
		 $yhendus->close();
		 exit();
	  }
	?>
				<form action="?">
			   Nimi: 
				 <input type="text" name="nimi" />
				 <br><br>
				Asukoht:
				 <input type="text" name="asukoht" />
				 <br><br>
				Autor:
				 <input type="text" name="autor" />
				 <br><br>
				 Avamise aeg:
				 <input type="date" name="avamine" />
				 <br><br>
				 Taasavamise aeg:
				 <input type="date" name="taasavamine" />
				 <br><br>
				 Info:
				 <input type="text" name="info" />
				 <br><br>
				 Tüüp:
				 <input type="text" name="tyyp" />
				 <br><br>
				 Lat:
				 <input type="text" name="lat" />
				 <br><br>
				 Lng:
				 <input type="text" name="lng" />
				 <br><br>
				 <input type="submit" value="OK" />
				  <br><br>
			</form>
					
					
					
				</div>
			
			</div>
		</div>
		
		<div id="footer">
			<div>
				<div>
					<span>Vaata veel:</span>
					<a href="" target="_blank" id="f">Avaleht</a>
					<a href="" target="_blank" id="t">Nimekiri</a>
					<a href="" target="_blank" id="g">Statistika</a>
				</div>
				<p>
					 Lisainfo
				</p>
			</div>
		</div>

</body>

</html>