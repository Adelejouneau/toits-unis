# toits-unis

Adèle/Nassima
    DATABASE_URL="mysql://root@127.0.0.1:3306/toits-unis"

Bintou
 DATABASE_URL="mysql://root:root@127.0.0.1:8889/toits-unis?serverVersion=5.7&charset=utf8mb4"

Danielle
 DATABASE_URL="mysql://root@127.0.0.1:3306/toits-unis?serverVersion=5.7&charset=utf8mb4"


 MAILER_DSN
 MAILER_DSN=smtp://71330ed2a24d0a:12e1384c737979@sandbox.smtp.mailtrap.io:2525?encryption=tls&auth_mode=login


# Toits Unis


Toits Unis est un projet visant à faciliter l'accès au logement pour les personnes dans le besoin en mettant en relation des hébergeurs solidaires avec des personnes cherchant un toit temporaire.

## Description

Toits Unis est une plateforme en ligne qui permet aux hébergeurs d'offrir des hébergements temporaires chez eux à des personnes dans le besoin, telles que les réfugiés, ou les personnes en situation de précarité.
Le projet vise à créer une communauté solidaire et à favoriser l'intégration sociale en offrant un environnement chaleureux et accueillant.

## Fonctionnalités

- Inscription des hébergeurs et des personnes cherchant un logement via les associations
- Recherche et filtrage des hébergements disponibles
- Mettre des hébergements en favoris
- Système de commentaires pour évaluer les expériences d'hébergement

## Prérequis

## Installation

1. Clonez le repository :

```bash
git clone https://github.com/votre-utilisateur/toits-unis.git


2.Installez les dépendances :

bash
cd toits-unis
npm install


3.Configurez les variables d'environnement :

bash
cp .env.example .env


4.Modifiez le fichier `.env` avec vos propres configurations.

5.Démarrez le serveur :
bash
npm start

## Instalations:

Pré requis pour le projet :

· télécharger Composer (packages PHP) et l'exécuter
· Faire un repository Git
· s’assurer que la commande PHP est bien disponible dans le terminal : php -v

·Installer la CLI de Symfony : https://symfony.com/download
scoop install symfony-cli
·Lancer la commande symfony check:requirements pour s’assurer que tout est ok
·Relancer tous les terminaux et lancer la commande symfony -v

Création du projet Symfony:

Une fois que tous les pré-requis sont réunis, on lance la commande pour créer l’arborescence de notre projet Symfony :
symfony new projet-final —webapp -–version=5.4
·Si les dossiers var Et vendor ne se sont pas installés, lancer la commande composer install
·Dans le fichier .env : commenter la dernière ligne DATABASE_URL et décommenter celle du dessus en changeant les informations (root, etc….)
·Création de la base de données et l’initialiser dans php myadmin  : Récupérer la template bootstrap sur le site adminkit.io, télécharger le fichier de la template que l’on souhaite intégrer à notre projet. Récupérer l’intégralité du dossier “dist” et le coller dans le dossier Public de notre projet.

Accédez à l'application via votre navigateur à l'adresse `http://127.0.0.1:8000/`.

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
