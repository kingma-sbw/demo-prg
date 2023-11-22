<?php declare(strict_types=1);

/* db verbindung */
$server = 'localhost';
$dbname = 'm290_import_test';
$dbuser = 'm290';
$dbpass = 'm290';

$db = new PDO(
  "mysql:dbname=$dbname;host=$server",
  $dbuser,
  $dbpass, [ 
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
  ]
);



;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <form>
    <select name="lp_id">
      <?php
      $sql  = "SELECT * FROM `lp`";
      $stmt = $db->prepare( $sql );
      $stmt->execute();
      while( $lp = $stmt->fetch() ) {
        echo '<option value="' . $lp['ID'] . '">' . $lp['Nachname'] . ' ' . $lp['Vorname'] . '</option>';
      } ?>
    </select>
  </form>

</body>

</html>