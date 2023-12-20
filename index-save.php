<?php
$email     = $_POST['email'] ?? '';
$kommentar = $_POST['kommentar'] ?? '';

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
  /* db verbindung */
  $server = 'localhost';
  $dbname = 'm307_formdb';
  $dbuser = 'm307';
  $dbpass = 'm307PW';

  $db = new PDO(
    "mysql:dbname=$dbname;host=$server",
    $dbuser,
    $dbpass,
    [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
  );

  /* sql befehl vorbereiten */
  $sql = "INSERT INTO `kommentare` ) id,
      email,
      kommentar
    )
    VALUES (NULL, ?, ?);";

  $stmt = $db->prepare( $sql );
  /* sql befehl ausführen */
  $resultat = $stmt->execute( [ 
    $email,
    $kommentar
  ] );
  $id       = $db->lastInsertId();
  /* resultat ausgeben */
  if( $resultat ) {
    header( "Location: index-erfolg.php?kommentar-id=$id" );
  } else {
    header( "Location: index.php" );
  }
} else {
  $message = "";
}