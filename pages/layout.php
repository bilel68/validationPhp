<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>%title%</title>
		<link rel="stylesheet" href="/Tp2/style.css">

	</head>
	<body>

		<ul>
			<li><a href="/Tp2/create.php">Page Admin</a> <span></span></li>
		</ul>

		<h1>Voici votre contenu html :</h1> <br>

			%content%

		<h1>   Voici vos fichier :</h1>

		<ul>
				<li>
					<?php
					$scanDir = scandir('./');

					foreach ($scanDir as $key => $value)
					{

						echo " <li> [ $value ] </li> ";

					}
					?>

				</li>
		</ul>

	</body>
</html>
