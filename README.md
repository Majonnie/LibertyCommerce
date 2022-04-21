# Liberty Commerce
Création d'un site d'e-commerce à l'aide du framework Laravel : catalogue trié par pays, gestion des produits pour les administrateurs, panier, profil de l'utilisateur avec historique des commandes...
<br>
<br>

* Dépendances :
  - Pour que le projet fonctionne correctement, vous aurez besoin d'installer différents packages :
    - composer, afin d'ensuite installer laravel ;
    - laravel (consultez cette page si besoin pour pouvoir l'installer
    à l'aide de composer : https://laravel.com/docs/9.x/installation#installation-via-composer) ;
    - mysql, en tant que SGBD de ce projet.

* Lancement du projet (Linux / Mac) :
  - `cd laravel_liberty_commerce`
  - `php artisan serve`
  - suivre le lien donné dans le terminal (par défaut : http://127.0.0.1:8000/)

* Gestion des données des produits :
  - SGBD utilisé pour ce test : mySQL
  - via mySQL, créer une base de données "liberty_commerce" :
  `CREATE DATABASE liberty_commerce;`
  - effectuer la migration des tables : `php artisan migrate`
  - génération, modification et suppression de produits :
  faisable depuis le site depuis un compte utilisateur administrateur.
  - génération, modification et suppression d'utilisateurs :
  uniquement faisable via mySQL (`INSERT INTO users VALUES...`, `UPDATE users SET...`, `DELETE FROM users;` ...)
