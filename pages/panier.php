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
    	echo '<title>Panier</title>';
    	echo '</head>';

    	echo '<body>';
    	echo 'Membre  -> '.$_SESSION['login'].'  <- voici votre panier :';
    	echo '<br />';
    }else {
      echo 'Les variables ne sont pas déclarées.';
    }




    include_once("fonctionsPanier.php");


    $erreur = false;

    $action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
    if($action !== null)
    {
       if(!in_array($action,array('ajout', 'suppression', 'refresh')))
       $erreur=true;

       //récuperation des variables en POST ou GET
       $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
       $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
       $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

       //Suppression des espaces verticaux
       $l = preg_replace('#\v#', '',$l);
       //On verifie que $p soit un float
       $p = floatval($p);

       //On traite $q qui peut etre un entier simple ou un tableau d'entier

       if (is_array($q)){
          $QteArticle = array();
          $i=0;
          foreach ($q as $contenu){
             $QteArticle[$i++] = intval($contenu);
          }
       }
       else
       $q = intval($q);

    }

    if (!$erreur){
       switch($action){
          Case "ajout":
             ajouterArticle($l,$q,$p);
             break;

          Case "suppression":
             supprimerArticle($l);
             break;

          Case "refresh" :
             for ($i = 0 ; $i < count($QteArticle) ; $i++)
             {
                modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
             }
             break;

          Default:
             break;
       }
    }

    echo '<?xml version="1.0" encoding="utf-8"?>';?>

    <form method="post" action="panier.php">
    <table style="width: 400px">
    	<tr>
    		<td colspan="4">Votre panier</td>
    	</tr>
    	<tr>
    		<td>Libellé :</td>
    		<td>Quantité :</td>
    		<td>Prix Unitaire :</td>
    		<td>Supprimer</td>
    	</tr>


    	<?php
    	if (creationPanier())
    	{
    	   $nbArticles=count($_SESSION['panier']['libelleProduit']);
    	   if ($nbArticles <= 0)
    	   echo "<tr><td>Votre panier est vide </ td></tr>";
    	   else
    	   {
    	      for ($i=0 ;$i < $nbArticles ; $i++)
    	      {
    	         echo "<tr>";
    	         echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
    	         echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
    	         echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
    	         echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">XX</a></td>";
    	         echo "</tr>";
    	      }

    	      echo "<tr><td colspan=\"2\"> </td>";
    	      echo "<td colspan=\"2\">";
    	      echo "Total : ".MontantGlobal();
    	      echo "</td></tr>";

    	      echo "<tr><td colspan=\"4\">";
    	      echo "<input type=\"submit\" value=\"Rafraichir\"/>";
    	      echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

    	      echo "</td></tr>";
    	   }
    	}

    	?>
</table>
</form>


  </main>

  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script  src="/Tp3/js/index.js"></script>




</body>

</html>
