<?php declare(strict_types= 1);

$email     = $_POST['email'] ?? '';
$kommentar = $_POST['kommentar'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form DB</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h2>Kommentar</h2>
  <form action="index-save.php" method="post">
    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" value="<?= $email ?>"><br>
    <label for="kommentar">Kommentar</label><br>
    <textarea name="kommentar" id="kommentar" cols="30" rows="5"><?= $kommentar ?></textarea><br>
    <input type="submit" value="Senden">
  </form>
</body>

</html>