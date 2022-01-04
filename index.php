<?php
require 'db.php';
$success = false;
if ( isset($_POST['create-new-member']) && !empty($_POST['name']) ) {
  $name = $_POST['name'];
	$req2 = $pdo->prepare("INSERT INTO argonautes (name) VALUES (?)");
  $req2->execute([$name]);
  $success = true;
};
$req = $pdo->prepare("SELECT * FROM argonautes");
$req->execute();
$argonautes = $req->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Dev tech challenge</title>
</head>
<body>

	<!-- Header section -->
<header>
  <h1>
    <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
    Les Argonautes
  </h1>
</header>
<?php if ($success): ?>
  <div class="container-fluid alert alert-success">
    Argonaute ajouté !
  </div>
<?php endif; ?>

<!-- Main section -->
<main>
  
  <!-- New member form -->
  <h2>Ajouter un(e) Argonaute</h2>
  <form class="new-member-form" method="POST">
    <label for="name">Nom de l&apos;Argonaute</label>
    <input id="name" name="name" type="text" placeholder="Charalampos" />
    <button type="submit" name="create-new-member">Envoyer</button>
  </form>
  
  <!-- Member list -->
  <h2>Membres de l'équipage</h2>
  <div class="row text-center my-3">
    <section class="member-list">
      <?php foreach ($argonautes as $argonaute) {
        echo '<div class="member-item">' . $argonaute->name . '</div>';
      }; ?>
  </section>
  </div>
</main>

<footer>
  <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
</footer>

</body>
</html>