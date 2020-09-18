# Ce test a été fait pour répondre à une offre d'emploi

# Test technique - Développeur back 

Les exercices qui vont suivre ont pour objectif d'évaluer votre connaissance de Laravel, la façon dont vous organisez votre code et raisonnez.
Nous seron donc particulièrement vigilent sur les points suivants :

- La bonne utilisation de Laravel
- Les bonnes pratiques de développement
- Le respect des PSRs
- Le principe de responsabilité des classes et méthodes

C'est un plus d'utiliser les design patterns suivants :

- Le patern d'actions
- Le patern de repositories

L'intégralité de ce test porte sur un système de labyrinthe (maze) et de cases (boxes).
Des tables et données sont déjà présentes dans le projet : ``php artisan migrate:refresh --seed``
L'authentification est gérée par Laravel Passport.


## Exercice 1 - Ecrire une API REST

Ecrire une API REST CRUD sécurisée par une authentification par Bearer token pour les éléments suivants :

- Mazes
- Boxes

La partie authentification est déjà en place dans le projet, vous pouvez récupérer un Bearer token via :

- Endpoint : ``api/auth/login``
- Email : test@test.com
- Mot de passe : 123456


## Exercice 2 - Commande de synchronisation

Développer une commande de synchronisation du "catalogue" de labyrinthes avec un service tiers.
La commande devra permettre de mettre à jour la base de données avec les labyrinthes retournés par le service tiers.

Le service tiers est "simulé" par cet endoint : ``api/generate-maze``
Le service est aussi sécurisé par Bearer token et l'endpoint vu dans l'exercice 1 devra être utilisé pour permettre cette authentification.


## Exercice 3 - Algorithme de résolution de labyrinthe

Il existe deux tests unitaires dans ``Unit\MazeResolverTest.php`` qui sont commentés et qui testent une classe de résolution de labyrinthe.
Vous devez donc implémenter cette classe pour valider ces deux tests unitaires.
Le resolver devra retourner le nombre de cases minimum nécéssaire pour aller d'un point A (start) à un point B (end) dans un labyrinthe donné. 

Les labyrinthes et les cases sont déjà créés en base de données grace aux seeder.

Les cases autorisées pour se rentre de A à B doivent avoir l'attribut ``is_allowed`` à ``true``.
Il n'est possible de se déplacer que verticalement ou horizontalement, pas de diagonal possible.

Nous serons attentif de la logique mise en place pour cet algorithme et pourrons faire abstraction de sa performance.  

# Installation

Exécuter :

``bash vessel init``

Puis exécuter :

``./vessel start``

Lancer les tests :

``./vessel test``