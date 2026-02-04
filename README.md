# Alumni IUT Laval Theme

Thème HTML/CSS complet pour le site web du réseau Alumni IUT Laval.

## Description

Ce thème contient une structure complète de pages HTML et composants CSS pour le site web de la communauté des anciens étudiants de l'IUT de Laval. Il inclut 4 pages principales avec tous les composants nécessaires pour un site moderne et responsive.

## Pages disponibles

- **Accueil** (`pages/index.html`) - Page d'accueil avec hero, statistiques, actualités, services et newsletter
- **À propos** (`pages/a-propos.html`) - Présentation du réseau, valeurs, équipe et missions
- **Actualités** (`pages/actualites.html`) - Liste des actualités avec filtres et événements à venir
- **Article** (`pages/article.html`) - Page de détail d'un article avec contenu complet

## Structure du projet

```
alumni-iut-laval-theme/
├── assets/
│   ├── css/
│   │   ├── style.css (fichier principal qui importe tous les autres)
│   │   ├── components/
│   │   │   ├── header.css
│   │   │   ├── footer.css
│   │   │   ├── cards.css
│   │   │   ├── buttons.css
│   │   │   ├── forms.css
│   │   │   └── hero.css
│   │   ├── pages/
│   │   │   ├── home.css
│   │   │   ├── about.css
│   │   │   ├── blog.css
│   │   │   └── article.css
│   │   └── utilities/
│   │       ├── variables.css (couleurs, typographie, espacements)
│   │       ├── reset.css (normalisation CSS)
│   │       └── responsive.css (breakpoints et utilitaires)
│   ├── js/
│   │   ├── main.js (initialisation générale)
│   │   ├── navigation.js (menu mobile)
│   │   └── newsletter.js (formulaire newsletter)
│   └── images/
│       └── .gitkeep
├── components/
│   ├── header.html
│   ├── footer.html
│   ├── navigation.html
│   ├── card-article.html
│   ├── card-event.html
│   ├── card-service.html
│   ├── card-team.html
│   ├── hero-section.html
│   ├── stats-section.html
│   ├── newsletter-section.html
│   ├── values-section.html
│   └── related-articles.html
└── pages/
    ├── index.html
    ├── a-propos.html
    ├── actualites.html
    └── article.html
```

## Caractéristiques techniques

### Design System

Le thème utilise un design system complet défini dans `assets/css/utilities/variables.css` :

- **Couleurs principales** : Rose/Magenta (#E91E8C) avec variantes
- **Couleurs départements** : TC (Cyan), MMI (Magenta), INFO (Bleu), GB (Vert)
- **Typographie** : Police Inter avec échelle modulaire
- **Espacements** : Système d'espacement cohérent (xs à 3xl)
- **Bordures et ombres** : Variables réutilisables

### Technologies

- **HTML5 sémantique** : Utilisation appropriée des balises (`header`, `nav`, `main`, `section`, `article`, `footer`)
- **CSS moderne** : 
  - Flexbox et CSS Grid pour les layouts
  - Variables CSS (custom properties)
  - Architecture modulaire avec imports
- **JavaScript vanilla** : Pas de dépendances externes
- **Responsive design** : Mobile-first avec breakpoints
  - Mobile : < 768px
  - Tablet : 768px - 1023px
  - Desktop : >= 1024px

### Accessibilité

- Attributs ARIA pour la navigation et les formulaires
- Contraste suffisant pour la lisibilité
- Navigation au clavier fonctionnelle
- Images avec attributs alt descriptifs
- Structure sémantique claire

## Installation et utilisation

### Utilisation simple

1. Clonez ou téléchargez ce repository
2. Ouvrez les fichiers HTML dans le dossier `pages/` directement dans un navigateur
3. Tous les styles et scripts sont référencés de manière relative

### Avec un serveur local

Pour un meilleur rendu (notamment des imports CSS), utilisez un serveur local :

```bash
# Avec Python 3
python -m http.server 8000

# Avec Node.js et npx
npx http-server

# Avec PHP
php -S localhost:8000
```

Puis accédez à `http://localhost:8000/pages/index.html`

### Structure des URLs

Les pages HTML sont dans le dossier `pages/` et les assets dans `assets/`. Les chemins relatifs sont configurés comme suit :

- `pages/index.html` → `../assets/css/style.css`
- Les liens entre pages utilisent des chemins relatifs

## Composants réutilisables

Le dossier `components/` contient des exemples de composants HTML que vous pouvez copier-coller dans vos pages :

- **Cards** : card-article, card-event, card-service, card-team
- **Sections** : hero, stats, newsletter, values, related-articles
- **Layout** : header, footer, navigation

## Personnalisation

### Couleurs

Modifiez les variables CSS dans `assets/css/utilities/variables.css` :

```css
:root {
  --color-primary: #E91E8C; /* Votre couleur principale */
  --color-tc: #00BCD4; /* Couleur département TC */
  /* ... */
}
```

### Typographie

Changez la police dans `assets/css/style.css` et `assets/css/utilities/variables.css` :

```css
@import url('https://fonts.googleapis.com/css2?family=VotrePolice:wght@400;600;700&display=swap');

:root {
  --font-family: 'VotrePolice', sans-serif;
}
```

### Contenu

Remplacez les images placeholder (`https://via.placeholder.com/...`) par vos propres images dans `assets/images/` et mettez à jour les chemins dans les fichiers HTML.

## Badges et catégories

Le thème inclut des badges colorés pour différencier les départements et catégories :

**Départements :**
- TC (Cyan) : `<span class="badge badge--tc">TC</span>`
- MMI (Magenta) : `<span class="badge badge--mmi">MMI</span>`
- INFO (Bleu) : `<span class="badge badge--info">INFO</span>`
- GB (Vert) : `<span class="badge badge--gb">GB</span>`

**Catégories d'actualités :**
- Événement (Orange) : `<span class="badge badge--evenement">ÉVÉNEMENT</span>`
- Carrière (Rose) : `<span class="badge badge--carriere">CARRIÈRE</span>`
- Témoignage (Cyan) : `<span class="badge badge--temoignage">TÉMOIGNAGE</span>`
- Formation (Bleu) : `<span class="badge badge--formation">FORMATION</span>`

## Fonctionnalités JavaScript

### Navigation mobile

Le menu mobile s'ouvre/ferme automatiquement avec le bouton hamburger. La gestion est dans `assets/js/navigation.js`.

### Newsletter

Le formulaire newsletter inclut une validation basique et un système de feedback. Voir `assets/js/newsletter.js` pour personnaliser le comportement (actuellement simulé).

## Support navigateurs

Le thème est compatible avec :
- Chrome/Edge (dernières versions)
- Firefox (dernières versions)
- Safari (dernières versions)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Licence

© 2026 Alumni IUT Laval. Tous droits réservés.