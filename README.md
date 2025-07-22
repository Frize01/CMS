<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# F-CMS  (en cours de développement)

Un CMS complet construit avec Laravel, pensé pour être **modulaire**, **sécurisé** et **personnalisable**.
Interface d'administration moderne avec DaisyUI (backend uniquement) et prise en charge de **thèmes frontend entièrement libres**.

## Stack technique

| Élément           | Choix                     |
| ----------------- | ------------------------- |
| Framework backend | Laravel 11                |
| Authentification  | Laravel Fortify           |
| CSS (admin)       | Tailwind CSS              |
| Design system     | DaisyUI (admin only)      |
| JS minimaliste    | Alpine.js                 |
| Frontend (public) | Thèmes Blade indépendants |


## Fonctionnalités principales (Ne pas prendre en compte actuellement)

* Gestion de contenu (pages, articles)
* Éditeur de texte enrichi (WYSIWYG)
* Upload et gestion des médias (images, vidéos, PDF…)
* Catégories et étiquettes (taxonomies)
* Authentification sécurisée (Fortify)
* Gestion des utilisateurs et rôles (RBAC)
* Interface d'administration complète et responsive
* Système de thèmes personnalisables côté public (à venir)
* Personnalisation des permaliens (à venir)
* Historique des révisions de contenu (à venir)
* Commentaires et modération (à venir)
* Paramètres globaux du site (titre, langue, logo…)
* API REST (à venir)
* Prise en charge future des plugins et extensions (à venir)

## Arborescence simplifiée

```
├── app/
├── config/
├── public/
├── resources/
│   ├── views/
│   │   ├── admin/           # Interface d'administration (DaisyUI)
│   │   └── themes/
│   │       └── default/     # Thème frontend par défaut (aucune dépendance DaisyUI)
│   ├── css/
│   │   └── admin.css
│   └── js/
│       └── admin.js
├── routes/
│   ├── web.php
│   └── admin.php
├── database/
└── ...
```

## Installation (résumé)

> Ce projet n'utilise pas Breeze ni Jetstream pour une personnalisation complète de l'authentification.

1. Cloner le dépôt
2. Installer les dépendances backend
3. Compiler les assets Tailwind/DaisyUI
4. Configurer `.env` et générer la clé d'application
5. Lancer les migrations et seeders si disponibles
6. Accéder au panneau d'administration via `/admin`

## Gestion des thèmes frontend

Chaque thème est stocké dans `resources/views/themes/{nom_du_theme}`.

Un fichier de config (`theme.json` ou `config.php`) permet de déclarer les propriétés du thème (nom, auteur, version…).

Le thème actif est défini via le fichier `config/cms.php` :

```php
return [
    'active_theme' => 'default',
];
```

## Authentification

Laravel Fortify est utilisé pour gérer :

* Connexion / déconnexion
* Réinitialisation de mot de passe
* Vérification d'email (optionnelle)
* 2FA (optionnelle)

Les vues sont personnalisées dans `/resources/views/auth/`.

## À venir (roadmap)

* Système de plugins (extensions)
* Interface de gestion de thèmes
* Revisions de contenu (historique)
* API REST publique
* Multilingue
* Système de commentaires avec modération

## Auteur

Ce CMS a été conçu comme une alternative à WordPress avec une architecture moderne, évolutive et orientée performance.
