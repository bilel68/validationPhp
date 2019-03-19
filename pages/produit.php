<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>La boutique E-commerce privée</title>
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

    <h1>Produit Disponible</h1>

    <?php

    session_start();

    if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
      // On teste pour voir si nos variables ont bien été enregistrées
    	echo '<html>';
    	echo '<head>';
    	echo '<title>Page de notre section membre</title>';
    	echo '</head>';

    	echo '<body>';
    	echo 'Bienvenue   -> '.$_SESSION['login'].' <-  dans la boutique de gaming privée, accédé(e) à nos produits pour faire de petites amplettes :)';
    	echo '<br />';

    }else {
    	echo 'Les variables ne sont pas déclarées.';
    }
    ?>

  <br /><br />
  <table>
    <td>
      <tr><img src="/img/wrc.jpg" alt="imageWrc" style="height: 300px;">
        <p>Libellé :WRC sur ps4</p>
        <p>Prix : 59 euros</p>
        <tr><a href="panier.php?action=ajout&amp;l=WRC&amp;q=1&amp;p=59"; return false;>Ajouter au panier</a> </tr>
      </td><br /><br />

      <td>
        <tr><img src="/img/thecrew.jpg" alt="imageTheCrew" style="height: 300px;">
        <p>Libellé :The crew sur ps4</p>
        <p>Prix : 29 euros</p></tr>
        <tr><a href="panier.php?action=ajout&amp;l=CREW&amp;q=1&amp;p=29"; return false;>Ajouter au panier</a> </tr>
      </td><br /><br />

      <td>
        <tr><img src="/img/assetto.jpg" alt="imageAssetto" style="height: 300px;">
        <p>Libellé : Assetto</p>
        <p>Prix : 69 euros</p></tr>
        <tr><a href="panier.php?action=ajout&amp;l=Assetto&amp;q=1&amp;p=69"; return false;>Ajouter au panier</a></tr>
      </td>


  </table>


  </main>

  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script  src="/Tp3/js/index.js"></script>




</body>

</html>
