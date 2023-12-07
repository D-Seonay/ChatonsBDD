# Photothèque de Chatons - Projet Symfony

Bienvenue dans la photothèque de chatons, un projet Symfony avec une BDD développé dans le cadre du cours à l'EPSI. Cette application vous permettra de gérer et afficher une collection de photos adorables de chatons.

## Configuration requise

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- [Symfony](https://symfony.com/download)
- [PHP](https://www.php.net/manual/en/install.php)
- [Composer](https://getcomposer.org/download/)

## Installation

1. Clonez le dépôt :

   ```bash
   git@github.com:D-Seonay/ChatonsBDD.git
   ```

2. Installez les dépendances avec Composer :

   ```bash
   cd ChatonsBDD
   composer install
   ```

3. Lancez le serveur Symfony :

   ```bash
    symfony server:start
   ```

   Votre application sera accessible à l'adresse [http://localhost:8000](http://localhost:8000).

4. Faire la migration 
   ```bash
    symfony console doctrine:migrations:migrate
   ```

## Auteurs

- DELAUNAY Mathéo | Seonay
