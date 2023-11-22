<?php

/* db verbindung */
$server = 'localhost';
$dbname = 'm307_formdb';
$dbuser = 'm307';
$dbpass = 'm307PW';

$db = new PDO(
  "mysql:dbname=$dbname;host=$server",
  $dbuser,
  $dbpass, // [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);


$kommentarId = $_GET['kommentar-id'];
/* SQL Befehl vorbereiten */
$sql  =
  "SELECT email, kommentar
  FROM kommentare
  WHERE id=?";
$stmt = $db->prepare( $sql );

/* SQL Befehlt ausführen mit Parameter */
$stmt->execute( [ $kommentarId ] );

/* resultat holen */
$row = $stmt->fetch();

/* und auswerten */
$email     = $row['email'];
$kommentar = $row['kommentar'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Erfolg</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1> Dankeschön</h1>
  <p>Dein Kommentar, lieber
    <?= $email ?> lautet
  </p>
  <hr>
  <p>
    <?= $kommentar ?>
  </p>
  <hr>
  <a href="index.php">Schreib noch mal eins!</a>
</body>

</html>