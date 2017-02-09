<?php
require("konf2.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// sql ühendus
$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}


$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// valin kõik read tabelist
$query = "SELECT * FROM malestusmargid WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// xml i algus
echo '<malestusmargid>';

// iga jaoks rida
while($row = @mysql_fetch_assoc($result)){
  // xml dokumenti lisamine
  echo '<marker ';
  echo 'name="' . parseToXML($row['Nimi']) . '" ';
  echo 'address="' . parseToXML($row['Asukoht']) . '" ';
  echo 'lat="' . $row['Lat'] . '" ';
  echo 'lng="' . $row['Lng'] . '" ';
  echo 'type="' . $row['Tyyp'] . '" ';
  echo '/>';
}


echo '</malestusmargid>';

?>
