<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>La boutique E-Gaming</title>



      <link rel="stylesheet" href="/css/style.css">


</head>

<body>

  <header>
    <h1>Game-Mania</h1>
  </header>

  <nav id="topNav">
    <ul>
      <li><a href="/accueil.php">Accueil</a></li>
      <li><a href="/pages/produit.php">Produit</a></li>
      <li><a href="/pages/form.php">Ajout de produit</a></li>
      <li><a href="/pages/panier.php">Panier</a></li>
      <li><a href="/index.php">Déconnexion</a></li>
    </ul>
  </nav>




  <main>


    <?php

    session_start();

    if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
      // On teste pour voir si nos variables ont bien été enregistrées
    	echo '<html>';
    	echo '<head>';
    	echo '<title>Page de notre section membre</title>';
    	echo '</head>';

    	echo '<body>';
    	echo 'Bienvenue   -> '.$_SESSION['login'].' <-  dans la boutique de gaming privée, accédé(e) à nos produits pour faire de petites emplettes :)';
    	echo '<br />';



    }
    else {
    	echo 'Les variables ne sont pas déclarées.';
    }
    ?>
  </main>

  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script  src="js/index.js"></script>




</body>

</html>
