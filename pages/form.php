<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>La boutique E-commerce privée</title>



      <link rel="stylesheet" href="/Tp3/css/style.css">


</head>

<body>

  <header>
    <h1>Game-Mania</h1>
  </header>

  <nav id="topNav">
    <ul>
    <li><a href="/Tp3/accueil.php">Accueil</a></li>
      <li><a href="/Tp3/pages/produit.php">Produit</a></li>
      <li><a href="/Tp3/pages/form.php">Ajout de produit</a></li>
      <li><a href="/Tp3/pages/panier.php">Panier</a></li>
      <li><a href="/Tp3/index.php">Déconnexion</a></li>
    </ul>
  </nav>




  <main>

    <h1> Ajouter les produits qui manque à notre boutique </h1>
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
    <?php

		/* Definition d'une constante  */
		define('HTML_TEMPLATE', 'layout.php');

		/* Condition si le fichier n'existe pas constante manquante   */
		if (!file_exists(HTML_TEMPLATE))
			die( HTML_TEMPLATE . ' est manquant');

		/* Si La variable de requête HTTP REQUEST existe  */
		if (isset($_REQUEST['save'])) {
			/* Alors on déclare une variable inputs qui permet d'inserer via la méthode filter_input_array  */
			$inputs = filter_input_array(INPUT_POST, array(
				'page_name' => 'name',
				'page_title' => 'title',
				'page_content' => 'content',
			));

			/* Ici une variable tampon qui recupere le contenu */
			$memory = file_get_contents(HTML_TEMPLATE);

			/* Puis grace a la function str_replace on remplace notre premier tableau par le deuxieme  */
			$memory = str_replace(array('%title%', '%content%'), array($inputs['page_title'], $inputs['page_content']), $memory);

			/* Ici on insere le contenu dans la variable pour créer le chemin */
			if (file_put_contents($path = "ajout/{$inputs['page_name']}.php", $memory))
				{
					echo "<ul> <li> <a href='$path'>Votre site </a> <span></span></li></ul><li> ";

					die('Fichier Creer: '. realpath($path));
				}
			else
				die('Impossible de creer ' . realpath($path));
		}

		?>

		<div class="formname">


			 <!-- Ici on recupère le formulaire avec les clés du tableau $inputs  -->
			<form method="post">
				<label for="page_name">Nom de votre produit : </label><input type="text" name="page_name" id="page_name" /><br /><br />
				<label for="page_title">Prix de votre produits : </label><input type="text" name="page_title" id="page_title" /><br /><br />
				<label for="page_content"> Image de votre produit : </label><textarea name="page_content" id="page_content"></textarea><br /><br />
				<input type="submit" name="save" value="Creer" />
				<input type="reset" value="Reinitialiser" />
			</form>

		</div>
  </main>

  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script  src="/Tp3/js/index.js"></script>




</body>

</html>
