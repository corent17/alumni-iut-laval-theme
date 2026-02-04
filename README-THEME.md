# Alumni IUT Laval WordPress Theme

Thème WordPress officiel du réseau Alumni IUT Laval - Réseau des anciens élèves de l'IUT de Laval.

## Description

Ce thème WordPress complet est conçu spécifiquement pour le réseau Alumni IUT Laval. Il offre toutes les fonctionnalités nécessaires pour gérer un site web d'anciens étudiants avec actualités, événements, et services.

## Caractéristiques

- **Design moderne et responsive** : Mobile-first, optimisé pour tous les appareils
- **Taxonomie personnalisée** : Gestion des départements (TC, MMI, INFO, GB)
- **Templates personnalisés** : Page d'accueil, À propos, Blog, Articles
- **Widgets** : 4 zones de widgets dans le footer + sidebar
- **Menus personnalisables** : Menu principal et menu footer
- **Support des fonctionnalités WordPress** :
  - Images à la une
  - Custom logo
  - Custom background
  - HTML5 sémantique
  - Navigation au clavier
  - Internationalisation (i18n)

## Installation

### Installation via WordPress (Recommandé)

1. Téléchargez le thème au format ZIP
2. Dans WordPress, allez dans **Apparence > Thèmes > Ajouter**
3. Cliquez sur **Téléverser un thème**
4. Sélectionnez le fichier ZIP
5. Cliquez sur **Installer maintenant**
6. Activez le thème

### Installation manuelle

1. Téléchargez les fichiers du thème
2. Uploadez le dossier `alumni-iut-laval-theme` dans `/wp-content/themes/`
3. Activez le thème depuis **Apparence > Thèmes**

## Configuration initiale

### 1. Créer les menus

Allez dans **Apparence > Menus** et créez :
- Un menu principal (emplacement : Menu Principal)
- Un menu footer (emplacement : Menu Footer)

### 2. Créer les pages essentielles

Créez les pages suivantes :
- **Accueil** : Définir comme page d'accueil dans Réglages > Lecture
- **À propos** : Utilisez le template "À propos"
- **Actualités** : Page standard pour les articles

### 3. Configurer les widgets

Allez dans **Apparence > Widgets** et configurez les 4 zones du footer.

### 4. Personnaliser le thème

Allez dans **Apparence > Personnaliser** pour :
- Ajouter votre logo
- Définir les couleurs
- Configurer les réseaux sociaux
- Personnaliser le texte du footer

## Structure des fichiers

```
alumni-iut-laval-theme/
├── style.css                 # Fichier principal avec métadonnées du thème
├── functions.php             # Fonctions PHP du thème
├── screenshot.png            # Aperçu du thème
├── header.php                # En-tête
├── footer.php                # Pied de page
├── sidebar.php               # Barre latérale
├── index.php                 # Template principal (fallback)
├── front-page.php            # Page d'accueil
├── page.php                  # Template de page par défaut
├── page-a-propos.php         # Template "À propos"
├── archive.php               # Liste des articles
├── single.php                # Article individuel
├── search.php                # Résultats de recherche
├── searchform.php            # Formulaire de recherche
├── 404.php                   # Page 404
├── assets/
│   ├── css/                  # Fichiers CSS
│   ├── js/                   # Fichiers JavaScript
│   └── images/               # Images du thème
├── inc/
│   ├── customizer.php        # Options de personnalisation
│   ├── template-functions.php
│   └── template-tags.php
└── template-parts/
    ├── content.php           # Template de contenu
    ├── content-none.php      # Aucun résultat
    └── card-article.php      # Carte d'article
```

## Taxonomies personnalisées

### Départements

Le thème inclut une taxonomie "Département" avec les termes suivants :
- **TC** : Techniques de Commercialisation
- **MMI** : Métiers du Multimédia et de l'Internet
- **INFO** : Informatique
- **GB** : Génie Biologique

Utilisez ces taxonomies pour organiser vos articles et événements par département.

## Catégories d'articles recommandées

Pour bénéficier des badges colorés, créez ces catégories :
- **Événement** : Badge orange
- **Carrière** : Badge rose
- **Témoignage** : Badge cyan
- **Formation** : Badge bleu

## Personnalisation

### Variables CSS

Les couleurs principales peuvent être modifiées dans `assets/css/utilities/variables.css` :

```css
:root {
  --color-primary: #E91E8C;       /* Rose/Magenta principal */
  --color-tc: #00BCD4;            /* Cyan pour TC */
  --color-mmi: #E91E8C;           /* Magenta pour MMI */
  --color-info: #3F51B5;          /* Bleu pour INFO */
  --color-gb: #4CAF50;            /* Vert pour GB */
}
```

### Fonctions de template

Le thème fournit plusieurs fonctions utiles :

```php
// Afficher le badge de département
<?php alumni_iut_departement_badge(); ?>

// Afficher le badge de catégorie
<?php alumni_iut_category_badge(); ?>

// Afficher le temps de lecture
<?php alumni_iut_reading_time(); ?>

// Afficher le fil d'Ariane
<?php alumni_iut_breadcrumbs(); ?>
```

## Compatibilité

- **WordPress** : 6.0 ou supérieur
- **PHP** : 7.4 ou supérieur
- **Navigateurs** : Chrome, Firefox, Safari, Edge (dernières versions)

## Support et contribution

Pour signaler un bug ou demander une fonctionnalité :
- Ouvrez une issue sur GitHub
- Contactez l'équipe Alumni IUT Laval

## Licence

Ce thème est distribué sous licence GPL v2 or later.

## Crédits

- **Développé par** : Alumni IUT Laval
- **Design System** : Basé sur les maquettes Alumni IUT Laval
- **Icônes** : Émojis Unicode

---

© 2026 Alumni IUT Laval. Tous droits réservés.
