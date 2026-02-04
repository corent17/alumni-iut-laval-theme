# Installation du thème WordPress Alumni IUT Laval

## Prérequis

- WordPress 6.0 ou supérieur
- PHP 7.4 ou supérieur
- Un serveur web (Apache/Nginx)
- MySQL ou MariaDB

## Installation rapide

### Méthode 1 : Via l'interface WordPress (Recommandé)

1. **Créer le package ZIP**
   ```bash
   cd /home/runner/work/alumni-iut-laval-theme
   zip -r alumni-iut-laval-theme.zip alumni-iut-laval-theme/ \
     -x "alumni-iut-laval-theme/.git/*" \
        "alumni-iut-laval-theme/.github/*" \
        "alumni-iut-laval-theme/node_modules/*" \
        "alumni-iut-laval-theme/components/*" \
        "alumni-iut-laval-theme/pages/*"
   ```

2. **Installer dans WordPress**
   - Connectez-vous à votre administration WordPress
   - Allez dans **Apparence > Thèmes**
   - Cliquez sur **Ajouter**
   - Cliquez sur **Téléverser un thème**
   - Sélectionnez le fichier `alumni-iut-laval-theme.zip`
   - Cliquez sur **Installer maintenant**
   - Activez le thème

### Méthode 2 : Installation manuelle via FTP/SFTP

1. **Télécharger les fichiers**
   - Téléchargez ou clonez le dossier `alumni-iut-laval-theme`

2. **Uploader via FTP**
   - Connectez-vous à votre serveur via FTP/SFTP
   - Naviguez vers `/wp-content/themes/`
   - Uploadez le dossier complet `alumni-iut-laval-theme`

3. **Activer le thème**
   - Allez dans **Apparence > Thèmes** dans WordPress
   - Trouvez "Alumni IUT Laval" et cliquez sur **Activer**

## Configuration post-installation

### 1. Créer les menus

1. Allez dans **Apparence > Menus**
2. Créez un nouveau menu "Menu Principal"
3. Assignez-le à l'emplacement "Menu Principal"
4. Ajoutez les pages : Accueil, À propos, Actualités, Services
5. Créez un menu "Menu Footer" pour le footer

### 2. Créer les pages

Créez les pages suivantes :

#### Page d'accueil
- Titre : "Accueil" ou votre titre personnalisé
- Dans **Réglages > Lecture**, définissez cette page comme "Page d'accueil"

#### Page À propos
- Titre : "À propos"
- Template : Sélectionnez "À propos" dans les attributs de page
- Ajoutez du contenu dans la section "Notre Histoire"

#### Page Actualités (optionnel)
- Titre : "Actualités"
- Type : Page standard
- Le blog s'affichera automatiquement via `archive.php`

### 3. Configurer les widgets du footer

1. Allez dans **Apparence > Widgets**
2. Vous verrez 4 zones de widgets pour le footer :
   - **Footer 1** : Informations sur Alumni IUT
   - **Footer 2** : Liens rapides
   - **Footer 3** : Réseaux des départements
   - **Footer 4** : Contact

### 4. Personnaliser via le Customizer

1. Allez dans **Apparence > Personnaliser**
2. Configurez :
   - **Identité du site** : Ajoutez votre logo
   - **Options du thème** : 
     - Texte du footer
     - URLs des réseaux sociaux (Facebook, Twitter, LinkedIn, Instagram)
   - **Couleurs** : Personnalisez si besoin
   - **Image d'en-tête** : Pour le hero de la page d'accueil

### 5. Créer des articles

1. Allez dans **Articles > Ajouter**
2. Ajoutez votre contenu
3. Sélectionnez une catégorie (Événement, Carrière, Témoignage, Formation)
4. Sélectionnez un département (TC, MMI, INFO, GB)
5. Ajoutez une image à la une

### 6. Configurer les permaliens

1. Allez dans **Réglages > Permaliens**
2. Choisissez "Nom de l'article" ou "Structure personnalisée"
3. Enregistrez les modifications

## Départements (Taxonomie personnalisée)

Le thème crée automatiquement 4 termes de taxonomie "Département" :

- **TC** : Techniques de Commercialisation
- **MMI** : Métiers du Multimédia et de l'Internet
- **INFO** : Informatique
- **GB** : Génie Biologique

Vous pouvez les gérer dans **Articles > Départements**.

## Catégories recommandées

Pour profiter des badges colorés, créez ces catégories :

1. **Événement** → Badge orange (#FF9800)
2. **Carrière** → Badge rose (#E91E8C)
3. **Témoignage** → Badge cyan (#00BCD4)
4. **Formation** → Badge bleu (#3F51B5)

## Dépannage

### Le thème ne s'affiche pas correctement

1. Vérifiez que tous les fichiers sont présents dans `/wp-content/themes/alumni-iut-laval-theme/`
2. Vérifiez les permissions des fichiers (644 pour les fichiers, 755 pour les dossiers)
3. Videz le cache du navigateur et de WordPress (si vous utilisez un plugin de cache)

### Les images ne s'affichent pas

1. Vérifiez que le dossier `assets/images/` existe
2. Vérifiez les permissions d'écriture
3. Régénérez les miniatures avec un plugin comme "Regenerate Thumbnails"

### Les menus ne fonctionnent pas

1. Assurez-vous d'avoir créé et assigné les menus dans **Apparence > Menus**
2. Vérifiez que les emplacements "Menu Principal" et "Menu Footer" sont bien assignés

### Erreurs PHP

Si vous voyez des erreurs PHP :
1. Vérifiez que votre version de PHP est 7.4 ou supérieure
2. Activez le mode débogage WordPress temporairement :
   ```php
   define('WP_DEBUG', true);
   define('WP_DEBUG_LOG', true);
   ```

## Support

Pour obtenir de l'aide :
- Consultez la documentation complète dans `README-THEME.md`
- Contactez l'équipe Alumni IUT Laval
- Ouvrez une issue sur GitHub

## Mise à jour du thème

Pour mettre à jour le thème :

1. **Sauvegardez** vos modifications personnalisées
2. Téléchargez la nouvelle version
3. Remplacez les fichiers via FTP ou réinstallez via WordPress
4. Réappliquez vos personnalisations si nécessaire

**Important** : N'éditez jamais directement les fichiers du thème. Utilisez un thème enfant pour vos modifications personnalisées.

## Création d'un thème enfant (optionnel)

Si vous souhaitez personnaliser le thème :

1. Créez un dossier `/wp-content/themes/alumni-iut-laval-child/`
2. Créez `style.css` :
   ```css
   /*
   Theme Name: Alumni IUT Laval Child
   Template: alumni-iut-laval-theme
   */
   ```
3. Créez `functions.php` :
   ```php
   <?php
   add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');
   function child_theme_enqueue_styles() {
       wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
   }
   ```
4. Activez le thème enfant au lieu du thème parent

---

Bon développement avec le thème Alumni IUT Laval ! 🎓
