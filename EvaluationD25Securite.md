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

*



#4. Exploiter la faille “File Inclusion” sur http://localhost/vulnerabilities/fi/?page=include.php.
Afficher le code source du fichier “http://localhost/vulnerabilities/fi/index.php”. Quelle
technique avez-vous utilisée ? Expliquer quel pourrait-être l’impact de cette attaque.
Comment pourrait-on s’en protéger ?

*



#5. Exploiter la faille “SQL Injection” de manière manuelle (c’est à dire sans SQLMap). Lister
toutes les tables présentes sur la base de données. Vous décrirez précisément étapes par
étapes comment vous avez procédé. Expliquer quel pourrait-être l’impact de cette attaque.
Comment pourrait-on s’en protéger ?

*




#6. Exploiter la faille “SQL Injection (Blind)” avec SQLMap. Vous décrirez précisément
quelles commandes vous avez utilisez et pourquoi. Quelle est la spécificité d’une injection
SQL en mode “aveugle” ?

*



#7. Exploiter la faille “XSS Reflected”. Modifier le comportement ou l’aspect de la page. Vous
décrirez précisément étapes par étapes comment vous avez procédé. Expliquer quel
pourrait-être l’impact de cette attaque. Comment pourrait-on s’en protéger ?

*




#8. Exploiter la faille “XSS Stored”. Modifier le comportement ou l’aspect de la page. Vous
décrirez précisément étapes par étapes comment vous avez procédé. Pourquoi une XSS
stockées est-elle plus impactante qu’une volatile ?

*


#9. (Bonus) Que signifie DIA (ou CIA en anglais) ?

*


#10. (Bonus) Expliquer la différence entre chiffrer et hasher. Quelle est l’utilité de rajouter un
“salt” dans un hash ?

*