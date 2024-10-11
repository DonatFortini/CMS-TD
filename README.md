# Projet CMS

## Description 
Ce projet a été réalisé dans un cadre scolaire et permet de créer et de gérer un blog à l'aide d'un CMS (Content Management System). Il offre des fonctionnalités telles que la création d'articles, la gestion des utilisateurs et l'administration du contenu.

## Technologie
- **Server** : Laravel
- **Base de données** : MySQL

## Prérequis 
- [PHP](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)
- [MySQL](https://dev.mysql.com/downloads/mysql/)
- Un client MySQL tel que [MySQL Workbench](https://dev.mysql.com/downloads/workbench/) ou [phpMyAdmin](https://www.phpmyadmin.net/downloads/)
- Un serveur web tel que [Apache](https://httpd.apache.org/download.cgi) pour exécuter le PHP

## Installation 
- Installer les dépendances : ```composer install```
- Générer la clé d'application : ```php artisan key:generate```
- Instancier un fichier .env contenant les attributs suivant :

## Utilisation 
- Lancer le serveur : ```php artisan serve```
- L'application sera accessible à l'adresse suivante : ```http://127.0.0.1:8000```

