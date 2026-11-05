# venatictundra22.com — Site principal

Code du site principal [venatictundra22.com](https://venatictundra22.com) : un WordPress (thème enfant + plugin maison) qui tourne dans Docker sur un serveur Debian.

> Ce dépôt contient uniquement le **site principal**. Le reverse proxy (nginx + certbot) et la base de données ont chacun leur propre dossier sur le serveur (voir [Architecture](#-architecture)).

---

## 🧰 Technologies

| Rôle | Technologie |
|---|---|
| CMS | WordPress (PHP-FPM, image Docker officielle) |
| Thème | Thème enfant de *Twenty Twenty-Five* |
| Plugin maison | `portfolio-projets` (shortcodes `[mes_projets]` et `[hunt_commandes]`) |
| Conteneurs | Docker Compose |
| Serveur web | Nginx (dans un dossier séparé, `reverse-proxy/`) |
| Base de données | MariaDB (dans un dossier séparé, `database/`) |
| HTTPS | Let's Encrypt (Certbot) |

---

## 🏗️ Architecture

Le serveur est découpé en plusieurs dossiers indépendants. Chacun a son `docker-compose.yml` et ils communiquent par deux réseaux Docker partagés.

```
/srv
├── reverse-proxy/   nginx + certbot   (ports 80 / 443)
├── database/        MariaDB           (aucun port exposé)
├── site-principal/  ← CE DÉPÔT        (WordPress du site principal)
├── site-portfolio/  WordPress du sous-domaine portfolio
└── site-bookstack/  BookStack du sous-domaine edu
```

```
Internet
   │  :80 / :443
   ▼
┌─────────────┐  réseau frontend   ┌────────────────┐  réseau backend   ┌─────────┐
│ proxy-nginx │ ─────────────────▶ │ site-principal │ ────────────────▶ │ mariadb │
└─────────────┘   FastCGI :9000    └────────────────┘                   └─────────┘
```

- Les réseaux `frontend` et `backend` et le volume `site-principal-data` sont créés **à l'avance** (`external: true` dans le compose).
- La base de données n'est joignable **que** par WordPress : aucun `ports:` n'est défini sur son service.

---

## 📁 Contenu du dépôt

```
site-principal/
├── docker-compose.yml      # Service WordPress (PHP-FPM)
├── .env.example            # Modèle des variables d'environnement
├── php-custom/
│   └── security.ini        # Réglages PHP sécurisés
└── wp-content/
    ├── themes/twentytwentyfive-child/   # Thème enfant (pages, CSS, images)
    └── plugins/portfolio-projets/       # Plugin maison
```

Le reste de WordPress (cœur, autres plugins, thème parent, `uploads/`) **n'est pas versionné** : voir [.gitignore](.gitignore).

### Thème enfant

- `front-page.php` : page d'accueil.
- `page-hunt-unit.php` : page du bot Discord H.U.N.T (template « HUNT »), avec son style dans `Projets/HUNT.css`.
- `assets/` : images (au format WebP pour être légères).

### Plugin `portfolio-projets`

Affiche les projets et les commandes du bot grâce à des shortcodes WordPress.
Les données sont dans `includes/data-projets.php`.

---

## 🔒 Sécurité

La sécurité est organisée en plusieurs niveaux :

**Côté serveur (Debian)** :

- **SSH sécurisé** : connexion uniquement par clé **Ed25519-SK (YubiKey)** (mots de passe désactivés), connexion `root` désactivée et port SSH personnalisé.
- **Pare-feu (UFW)** : seuls les ports HTTP (`80`), HTTPS (`443`) et SSH sont ouverts ; tout le reste est bloqué par défaut.
- **Fail2Ban** : surveille SSH ainsi que les logs Nginx (`/wp-login.php`, `xmlrpc.php`, BookStack) et bannit automatiquement les IP abusives (directement sur la chaîne `DOCKER-USER`, avec une règle `recidive` pour les attaques répétées).
- **Sauvegardes automatiques** : tâche `cron` quotidienne qui sauvegarde les bases MariaDB, les fichiers des sites et les configurations sur 7 jours glissants.

**Côté Docker & Nginx** (dossier `reverse-proxy/`) :

- **Isolation réseau** : MariaDB tourne sur un réseau interne (`backend`) sans aucun port exposé vers l'extérieur.
- **HTTPS & protection web** : certificats Let's Encrypt renouvelés automatiquement, en-têtes de sécurité (HSTS, CSP, `X-Frame-Options`…), limitation à 5 requêtes/minute sur `/wp-login.php` et blocage des fichiers cachés (`.env`, `.git`…).

**Côté PHP & WordPress** ([`php-custom/security.ini`](php-custom/security.ini)) :

- `DISALLOW_FILE_EDIT` activé : l'éditeur de code de l'admin WordPress est désactivé.
- `expose_php = Off` et `display_errors = Off` : version de PHP masquée, erreurs écrites uniquement dans les logs.
- `open_basedir` restreint aux dossiers de WordPress et fonctions système dangereuses (`exec`, `system`, `shell_exec`…) désactivées.
- Cookies de session protégés (`HttpOnly`, `Secure`, `SameSite=Lax`).

**Secrets** : aucun mot de passe n'est dans le dépôt. Ils sont stockés dans un fichier `.env` local ignoré par Git (seul [`.env.example`](.env.example) est versionné).

---

## 🚀 Installation

### Prérequis

- Un serveur Linux avec Docker et Docker Compose v2
- Le dossier `reverse-proxy/` (nginx) et le dossier `database/` (MariaDB) déjà en place
- Un nom de domaine qui pointe vers le serveur

### Étapes

```bash
# 1. Créer les ressources Docker partagées (une seule fois)
docker network create frontend
docker network create backend
docker volume create site-principal-data

# 2. Cloner le dépôt
git clone https://github.com/VenaticTundra22/venatictundra22.com.git site-principal
cd site-principal

# 3. Créer le fichier de secrets
cp .env.example .env
nano .env        # remplacer toutes les valeurs CHANGE_ME

# 4. Lancer WordPress
docker compose up -d
docker compose ps
```

> ⚠️ Les identifiants `WORDPRESS_DB_*` doivent correspondre à ceux de la base créée dans `database/`.

---

## 🛠️ Développement

Les fichiers du thème et du plugin sont montés directement dans le conteneur (`./wp-content`). Une modification est donc visible tout de suite (Ctrl+F5 pour vider le cache du navigateur).

Pour vérifier la syntaxe d'un fichier PHP :

```bash
docker exec site-principal php -l /var/www/html/wp-content/themes/twentytwentyfive-child/page-hunt-unit.php
```

### Performances

La page H.U.N.T a été optimisée avec PageSpeed Insights : images WebP aux bonnes dimensions (`width`/`height`, `srcset`), compression gzip et cache navigateur côté nginx.

---

## 📜 Licence

Projet sous licence [MIT](LICENSE).

---

*Projet fil rouge — Candidature BUT Informatique*
