Description du Projet:
Arcadia Zoo est une application web interactive conçue pour enrichir l’expérience des visiteurs en leur offrant des informations complètes sur les animaux, leurs habitats, et les services proposés. Cette application se donne pour mission de sensibiliser les visiteurs aux enjeux environnementaux, témoignant de l’engagement du zoo en faveur de la durabilité et de la préservation de la nature.

les technologies utilisé:

-   Pour le deploiement : j'ai utilisé heroku
-   La gestion des dépendences : composer
-   Variable d'environnement : Dotenv
-   Base de données non relationnel : Mongodb (Nosql)
-   Le stockage des images : elle sont stocker directement dans le projet
-   Base de données relationnel: MySql(sql)
-   Back-End : PHP avec PDO
-   Envoie de mail : Php Mailer
-   Front-end : HTML5, Bootstrap(il gènère automatiquement le css, et la responsivité), JavaScript


Fonctionnalités:

-CRUD (Create, Read, Update, Delete)j'ai utilisé le CRUD sur plusieurs entités: les animaux, les habitats, les races, les utilisateurs, les services, les rapports véto, les avis, ainsi que les contacts.
-Gestion des permissions des utilisateurs, en fonction de leur role, chaque utilisaturs en fonctions de leur role on eu Dashboard bien défini
-Gestion des avis des services, des habitats, des contacts,des animaux, des rapports, des utilisateurs, des races, en sql, et gestion des horairs en NoSql avec MongoDb compass

-Les utilisaterus on accès au services que proposent le zoo, au horaires, au habitats, au formulaire de contacts, aux avis et peuvent rédigé un avis si il le souhaitent, a la présentation du zoo et sa localisation, ils peuvent également acceder aux animaux et sur la page habitat(univers) ils peuvent acceder aux animaux par univers

Explication de la mise en place du projet et des technologies utilisé:
-Creation du dossier Projet sur le bureau et lors du telechargement de xampp je vais tranferer le projet dans htdocs
-Xampp : Serveur local avec Apache et MySQL:
    - Pour ce faire j'ai télécharger Xampp sur le site officiel
    - j'ai installer xampp  et par la suite j'ai lancer le services Apache et MySQL
    - pour acceder au site en local j'ai ouvert mon navigateur et taper dans la barre de recherche localhost pour acceder au dossier du projet

-Pour ce projet j'ai utilisé PHP 8.2.4, pour connaitre la version de mon PHP j'ai utilisé la commande PHP -V dans mon shell

-Pour ce projet j'ai utilisé composer pour la gestion des dépendances


Instalation et deploiement du projet:
git clone https://github.com/

composer install






