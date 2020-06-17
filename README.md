# blow

Developpement d'un logiciel de réservation de salle

## Built with

* [Laravel](https://laravel.com/docs/7.x) - Le framework utilisé


##Comment le lancer ?

-Récupérez le dossier blow sur votre ordinateur.
-Faites un copier-coller du fichier .env.example( si vous ne le voyez afficher les fichiers cachés)
-Rennomer cette copie seulement .env
-Ouvrez ce fichier et supprimez toutes les lignes commençant par DB SAUF la première.
-Changez DB_CONNECTION=mysql en DB_CONNECTION=sqlite.
-Dans votre terminal:
  placez vous bien sur le dossier blow
  faites php artisan make:model Event -m
-Dans blow/app/Event remplacer votre code par celui qui est sur le git
-Faites de même pour la migrations avec le mot events dans blow/database/migrations.
-créer le fichier database.sqlite dans blow/database.
-Dans votre terminal:
  placez vous bien sur le dossier blow
  faites php artisan db:seed (cela va vous permettre de remplir les salles dans votre base de données automatiquement)
  et ensuite faites php artisan serve
-Vous pouvez ensuite accéder au projet sur votre serveur local.(localhost:8000)
