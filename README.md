# toits-unis

Adèle/Nassima
    DATABASE_URL="mysql://root@127.0.0.1:3306/toits-unis"

Bintou
 DATABASE_URL="mysql://root:root@127.0.0.1:8889/toits-unis?serverVersion=5.7&charset=utf8mb4"

Danielle
 DATABASE_URL="mysql://root@127.0.0.1:3306/toits-unis?serverVersion=5.7&charset=utf8mb4"


 MAILER_DSN
 MAILER_DSN=smtp://71330ed2a24d0a:12e1384c737979@sandbox.smtp.mailtrap.io:2525?encryption=tls&auth_mode=login



Bien sûr ! Voici un exemple de contenu pour un fichier README avec le nom de projet "Toits Unis" :

# Toits Unis


Toits Unis est un projet visant à faciliter l'accès au logement pour les personnes dans le besoin en mettant en relation des hébergeurs solidaires avec des personnes cherchant un toit temporaire.

## Description

Toits Unis est une plateforme en ligne qui permet aux hébergeurs d'offrir des hébergements temporaires chez eux à des personnes dans le besoin, telles que les réfugiés, ou les personnes en situation de précarité.
Le projet vise à créer une communauté solidaire et à favoriser l'intégration sociale en offrant un environnement chaleureux et accueillant.

## Fonctionnalités

- Inscription des hébergeurs vis l'associations Toits Unis.  - - -Les personnes cherchant un logement s'inscrivent directement via les associations qui géront le profil du guest sur la plateform
- Recherche et filtrage des hébergements disponibles
- Mettre des hébergements en favoris


## Installation

2. Clonez le repository :
· Faire un repository Git

· Git clone https://github.com/votre-utilisateur/toits-unis.git

·Placer votre dossier dans le dossier wamp de vos fichiers

·Creation du projet:
symfony new my_project_directory --version="6.3.*" --appweb

Pré requis pour le projet :

· télécharger Composer install (packages PHP) et l'exécuter

· s’assurer que la commande PHP est bien disponible dans le terminal : php -v


·Dans le fichier .env : commenter la dernière ligne DATABASE_URL et décommenter celle du dessus en changeant les informations (root, etc….)
·Création de la base de données et l’initialiser dans php myadmin
php bin/console doctrine:database:create

  : Récupérer la template bootstrap sur le site adminkit.io, 
  https://adminkit.io/
  
  télécharger le fichier de la template que l’on souhaite intégrer à notre projet. Récupérer l’intégralité du dossier “dist” et le coller dans le dossier Public de notre projet.

  faire un symphony server/start :

Accédez à l'application via votre navigateur à l'adresse `http://127.0.0.1:8000/`.
 pour stopper le proccessus faire un:

 faire un symphony server/stop


## Contribuer

Les contributions sont les bienvenues ! Si vous souhaitez contribuer à Toits Unis, veuillez suivre les étapes suivantes :

1. Fork du repository.
2. Créez une branche pour votre fonctionnalité (`git checkout -b fonctionnalite/ma-fonctionnalite`).
3. Effectuez les modifications et commit (`git commit -m 'Ajout de ma fonctionnalite'`).
4. Push vers la branche (`git push origin fonctionnalite/ma-fonctionnalite`).
5. Ouvrez une pull request.

Veuillez vous référer aux directives de contribution pour plus d'informations.

## Contact

Pour toute question ou demande de renseignements, veuillez nous contacter à l'adresse email [contact@toitsunis.com](mailto:contact@toitsunis.com).

---
Ce projet est porté par 4 femmes unique et extraordinaires
(Ceci est un projet fictif pour le moment :)
