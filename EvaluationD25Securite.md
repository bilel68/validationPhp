#1. Auditer http://localhost/about.php avec Lighthouse. Suite à cet audit, proposez des
améliorations pour optimiser les différents scores. Des explications techniques sont
attendues. (Exemple: Les attributs “alt” ne sont pas présents. cela est nécessaire pour la
lecture d’écran. Il faut rajouter dans la balise img un attribut “alt” décrivant brièvement
l’image).



# Opportuninties

* Supprimer les ressources qui bloque l'affichage de certains élément de la page . Créer un fichier Css ou js au lieu de faire du developemment inline.

# Accessibility

* La couleur d'arrière plan et de premier plan n'est pas adapté pour le lecteur car le ration contrast n'est pas suffisant. 

* Il manque l'attribut "lang" dans la balise <html> afin d'améliorer l'interprétation du contenu du site dans d'autre pays.

# Best Practices

* Non usage du protocol HTTP/2 qui offre de meilleur bénéfice que le HTML/1 permetant d'inclure des données binaire dans le header d'effectuer du multiplexing et d'effectuer des push sur le server 

* Les liens vers les destinations d'origine croisée sont dangereuses donc il faut rajouter l'attribut rel='noopener' ou rep="noreferer"

* Dans une page html il manque le DOCTYPE 

# SEO

* Ne possède pas de balise meta name="viewport" par rapport au tag de largeur donc il faut le rajouter pour avoir un meilleur réferencement

* La taille de la polise n'est pas assez grande il faut la mettre une police egal ou superieur a 12px pour les visiteurs qui ont un écran de smartphone





#2. Réaliser un brute force sur http://localhost avec l’outil Dirbuster pour trouver des fichiers et
répertoires cachés. Un des fichiers peut nous apporter beaucoup d’informations sur la
configuration de l’application et du serveur, quel est son nom (s’il a été trouvé) ? Expliquer
quel est l’objectif de cette attaque. Comment pourrait-on s’en protéger ?

* le nom du serveur est Apache 2.0 Handler 

* Le brute force est une méthode utilisée en cryptanalise pour trouver un mot de passe ou des fichier cachée ainsi que des infos cachée au publique .Donc des données sensible tels que des identifiant ou des données par rapport à la configuration de l'applications.

* Pour s'en proteger il faut mettre en place des programmes de détections qui peuvent bloquer certaines IPs si des attaques brute-force sont détectées notamment Fail2ban.
Filtrer les accès aux services (filtrage IPs etc).

* Ou encore ralentir l'acces avec un temps aléatoire au cas ou la même addresse IP accède a l'application plusieur fois de suite .





#3. Exploiter la faille “Command Injection” sur http://localhost/vulnerabilities/exec/ pour
afficher le fichier /etc/passwd et la liste des connexions actives sur le serveur.
Décrivez votre procédure ainsi que toute les commandes utilisées (même celles ayant
échouées). Expliquer quel pourrait-être l’impact de cette attaque. Comment pourrait-on s’en
protéger ?
Bonus: Expliquer la différence entre un “bind shell” et un “reverse shell”. Pourquoi est-il plus
efficace d’utiliser un reverse shell ?

* Pour exploiter la faille command Injection il suffit d'entrer une adresse IP tel que 8.8.8.8 et rajouter la ligne de commande cat /etc/passwd comme cela : "8.8.8.8 &&  cat /etc/passwd" ainsi cette action est éffectuer lorsqu'un script est vulnérable et cela et cela a une impact sur la sécurité de l'application tels que l'efacement de contenu , le vol d'informations , la compromission du serveur etc.

* La différence entre un bind shell et un reverse shell c'est le fait que la victime possede une machine sur qui est sur ecoute . Donc l'attaque (soit la communication)  provient du hacker . 

* Alors que le reverse shell provient de la communication lancée par la victime et donc la victime a moins de chance s'en rendre compte



#4. Exploiter la faille “File Inclusion” sur http://localhost/vulnerabilities/fi/?page=include.php.
Afficher le code source du fichier “http://localhost/vulnerabilities/fi/index.php”. Quelle
technique avez-vous utilisée ? Expliquer quel pourrait-être l’impact de cette attaque.
Comment pourrait-on s’en protéger ?

* L’inclusion de fichier  consiste en le fait d’utiliser l’application et ses fonctionnalités afin de charger des pages et des fichiers spécifiques

* Dans des exploitations plus avancées, une faille LFI/RFI peut permettre l’exécution de code côté serveur

* Charger une image iso par exemple qui est un gros fichier va permettre de bloque la communication le temps que la requete soit traitée . On parle alors de déni de service

* Il faudrait ne pas laisser la possibilité de passer de paramètre dans l'url . Et mettre la valeur directement dans le code. On peut aussi utiliser une autre méthode tel que l'usage de la liste blanche par laquelle tout ce qui n'est pas explicitement autorisée est interdit.
Concernant les failles de types LFI, il est possible de cloisonner les droits et les accès d’un serveur web afin que celui-ci ne puisse pas remonter une arborescence web au delà d’un certain point.

#5. Exploiter la faille “SQL Injection” de manière manuelle (c’est à dire sans SQLMap). Lister
toutes les tables présentes sur la base de données. Vous décrirez précisément étapes par
étapes comment vous avez procédé. Expliquer quel pourrait-être l’impact de cette attaque.
Comment pourrait-on s’en protéger ?

* http://127.0.0.1/vulnerabilities/sqli/?id=a' UNION SELECT (SELECT GROUP_CONCAT(TABLE_NAME) FROM information_schema.TABLES), "";-- -&Submit=Submit.

* Cela permet de recuperer  ou encore de modifier/supprimer/ajouter des donnée d'informations dans la bdd tels que le noms des tables , ou des champs ou encore les insertions sensibles 

* Les fonctions addslashes() et magic_quotes_gpc() mysqli_real_escape_string() sont aussi utilisées pour protèger des injection sql .

Un moyen qui tend à se généraliser mais impacte légèrement les performances est l’utilisation des commandes préparées

Les procédures stockées nécessitent plus de connaissances mais peuvent aussi être utilisées. L’identification restera bien protégée à l’intérieur de la procédure et ne pourra plus être détournée.

Enfin, il faut préférer l’utilisation de comptes utilisateurs à accès limité pour empêcher la modification ou suppression d’éléments de la base de données. Et éventuellement vérifier les données avec des expressions régulières ou utiliser des tableaux contenant tous les résultats possibles.


#6. Exploiter la faille “SQL Injection (Blind)” avec SQLMap. Vous décrirez précisément
quelles commandes vous avez utilisez et pourquoi. Quelle est la spécificité d’une injection
SQL en mode “aveugle” ?

'python sqlmap.py -u "http://127.0.0.1/vulnerabilities/sqli_blind/?id=1&Submit=Submit#" --cookie="PHPSESSID=rriiutgo9mhfghjlecnbtt8e87; security=low" --all 



#7. Exploiter la faille “XSS Reflected”. Modifier le comportement ou l’aspect de la page. Vous
décrirez précisément étapes par étapes comment vous avez procédé. Expliquer quel
pourrait-être l’impact de cette attaque. Comment pourrait-on s’en protéger ?

'http://127.0.0.1/vulnerabilities/xss_d/?default=Spanish<script>document.body.append('test')</script>

Grace a cette methode on peut directement intervenir dans le code coté server-side dans le navigateur -> network. On peut s'en proteger en filtrant a l'aide de conditions tels que l'utilisation de conditions if ou switch case.





#8. Exploiter la faille “XSS Stored”. Modifier le comportement ou l’aspect de la page. Vous
décrirez précisément étapes par étapes comment vous avez procédé. Pourquoi une XSS
stockées est-elle plus impactante qu’une volatile ?

'http://127.0.0.1/vulnerabilities/xss_d/?default=Spanish<script>document.body.append('test')</script>

 La faille est la plus simple des deux. Elle est appelée non permanente car elle n'est pas enregistrée dans un fichier ou dans une base de données. Elle est donc éphémère 

La faille permanente est la faille XSS la plus sérieuse car le script est sauvegardé dans un fichier ou une base de données. Il sera donc affiché à chaque ouverture du site

#9. (Bonus) Que signifie DIA (ou CIA en anglais) ?

* Confidantiality, Integrity, Availability (C.I.A.)


#10. (Bonus) Expliquer la différence entre chiffrer et hasher. Quelle est l’utilité de rajouter un
“salt” dans un hash ?

* Hachage
une fonction de hachage est un algorithme permettant de modifier un texte (appelé message) en valeur de longueur fixe (appelé hash)

Le chiffrement
En cryptographie, on encode un texte de telle sorte que seuls des personnes autorisées puissent le déchiffrer. Ici, le processus d'encodage se nomme : "chiffrement". Le mot cryptage n'existe pas.

 Les sels sont utilisés pour protéger les mots de passe stockés. Auparavant, un mot de passe était stocké en texte brut sur un système, mais au fil du temps, des protections supplémentaires ont été développées pour protéger le mot de passe d'un utilisateur contre toute lecture par le système. Un sel est l'une de ces méthodes