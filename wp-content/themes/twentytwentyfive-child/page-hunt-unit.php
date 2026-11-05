<?php
/*
Template Name: HUNT
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HUNT UNIT - Bot Discord</title>
  <meta name="description" content="Découvrez HUNT UNIT, un bot Discord sur-mesure, performant et 100% gratuit. La réponse fiable pour votre serveur.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" media="print" onload="this.media='all'">
  <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"></noscript>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/Projets/HUNT.css?v=<?php echo filemtime(get_stylesheet_directory() . '/Projets/HUNT.css'); ?>">
</head>
<body <?php body_class(); ?>>

  <!-- En-tête (spécifique à cette page) -->
  <header class="header-hunt">
    <div class="container header-hunt-bar">
      <a class="header-hunt-back" href="<?php echo esc_url( home_url( '/' ) ); ?>">← Mon Site</a>
      <span class="vertical-divider"></span>
      <div class="brand-hunt">
        <span class="brand-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/bot-discord-64.webp" width="32" height="32" alt="Logo H.U.N.T - UNIT"></span>
        <span class="brand-name">H.U.N.T <span>— UNIT</span></span>
      </div>
      <nav class="nav-hunt">
        <a href="#profil">Profil</a>
        <a href="#histoire">Histoire</a>
        <a href="#code">Code</a>
        <a href="#fonctions">Fonctions</a>
        <a href="#politique">Politiques</a>
      </nav>
      <a class="btn btn-primary btn--disabled" aria-disabled="true">Déployer</a>
    </div>
  </header>

  <main class="hero-hunt">
    <div class="container">
      <p class="eyebrow-text">UNITÉ D'AIDE // BOT DISCORD</p>
      <h1 class="display-title">H.U.N.T <span class="title-accent">—</span> UNIT</h1>
      <p class="hero-hunt-description">
        Un bot Discord sur-mesure conçu pour être performant, qualitatif
        et 100% gratuit. Une réponse fiable pour correspondre exactement à
        vos besoins, sans fioritures.
      </p>
    </div>

    <div class="profile-block" id="profil">
      <div class="profile-banner">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/bot-discord-banner-1436.webp"
             srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/bot-discord-banner-900.webp 900w, <?php echo get_stylesheet_directory_uri(); ?>/assets/bot-discord-banner-1436.webp 1436w"
             sizes="(max-width: 944px) calc(100vw - 64px), 880px"
             width="1436" height="506" fetchpriority="high" alt="Bannière H.U.N.T - UNIT">
      </div>
      <div class="avatar-area">
        <div class="avatar-frame">
          <span class="corner tl"></span><span class="corner tr"></span>
          <span class="corner bl"></span><span class="corner br"></span>
          <div class="avatar"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/bot-discord-208.webp" width="96" height="96" alt="Avatar H.U.N.T - UNIT"></div>
          <div class="status-dot"></div>
        </div>
        <div class="user-tag">
          H.U.N.T&nbsp;-&nbsp;UNIT#7184 <span class="app-badge">APP</span>
        </div>
      </div>
    </div>

    <div class="main-grid">
      <div class="panel">
        <h2 class="display-title">Description</h2>
        <p>
          H.U.N.T (Helper Unit for Network Tasks) est un bot pensé pour la qualité et la performance.
          Fini les bots usines à gaz ou les fonctionnalités payantes bloquées derrière un abonnement.
          H.U.N.T se concentre sur l'essentiel : faire exactement ce dont vous avez besoin,
          de la meilleure façon possible. Chaque fonction est développée pour être parfaite et 100% gratuite.

          <br> <br>

          Ce projet est développé par un étudiant en informatique sur son temps libre
          et n'a aucune ambition de devenir le bot numéro 1 le plus utilisé sur Discord.
          Son seul objectif est d'être utile,
          stable et de répondre parfaitement aux attentes de ceux qui l'utilisent.
        </p>
        <div class="tag-list">
          <span class="tag-badge">100% GRATUIT</span>
          <span class="tag-badge">SUR-MESURE</span>
          <span class="tag-badge">ÉVOLUTIF</span>
          <span class="tag-badge">QUALITÉ & PERFORMANCE</span>
        </div>
        <div style="display: flex; gap: 14px; flex-wrap: wrap;">
          <a class="btn btn-primary btn--disabled" aria-disabled="true">
            <i class="fa-solid fa-arrow-down"></i>
            Déployer sur mon serveur
          </a>
          <a class="btn btn-outline btn--disabled" aria-disabled="true">
            <i class="fa-brands fa-discord"></i>
            Serveur Support
          </a>
        </div>
      </div>

      <div class="logo-panel">
        <span class="corner-label">UNIT.LOGO</span>
        <span class="corner-label bottom-right">H.U.N.T // 7184</span>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/HUNTXDISCORD-960.webp"
             srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/HUNTXDISCORD-480.webp 480w, <?php echo get_stylesheet_directory_uri(); ?>/assets/HUNTXDISCORD-960.webp 960w"
             sizes="(max-width: 880px) calc(100vw - 48px), 480px"
             width="960" height="960" loading="lazy" alt="Logo H.U.N.T - UNIT en grand format">
      </div>
    </div>

    <section class="section-hunt" id="histoire">
      <div class="panel">
        <h2 class="display-title">
          Histoire du projet <span style="font-size: 12px; color: var(--color-text-muted);">au 15/03/2026</span>
        </h2>

        <p>
          L'idée de H.U.N.T a émergé d'un besoin simple : pouvoir avoir un bot Discord qui fait exactement ce que
          je veux et de la manière dont je le veux, sans avoir à passer par des bots tiers. Entre les bots payants
          qui ne proposent pas des fonctions à la hauteur de leurs prix, et les bots gratuits qui proposent trop de
          choses mais restent très limités, il fallait un bot qui soit parfait pour mes besoins.

          <br> <br>

          Le but avec H.U.N.T est de se placer comme le complément parfait aux bots déjà bien implémenté au sein de la
          communauté discord comme Draftbot ou MEE6, qui proposent déjà un large panel de commandes et de venir
          les compléter avec des commandes plus premium et personnalisable, tout en restant gratuit et open-source.

          <br> <br>

          Le bot ne propose a sa sortie que 2 fonctions : la création d'embeds personnalisés et l'envoi de plusieurs
          embeds personnalisés d'un coup (le builder), avec la possibilité de mettre un message texte avant l'envoi des
          embeds. <br>
          Se sont les 2 commandes dont j'avais le plus besoin a se moment la pour simplement faire des messages plus
          propres sur mon serveur.

          <br> <br>

          Je n'ai pour le moment pas l'ambition de deployer ce bot publiquement, il est pour le moment réservé a mon
          serveur et a celui de mon cercle proche. 2 fonctionnalités seulement ne mérite pas un déploiement public,
          mais qui sait ce que l'avenir nous réserve. <br>
          Le projet est open-source, donc si vous souhaitez le deployer sur votre propre serveur, ou même reprendre le
          code pour l'améliorer ou y ajouter des fonctionnalités, n'hesitez pas.
        </p>

      </div>
    </section>

    <section class="section-hunt" id="code">
      <div class="panel">
        <h2 class="display-title">Sous le capot</h2>
        <p>
          H.U.N.T est développé en utilisant les technologies modernes de l'écosystème Node.js pour garantir des
          performances optimales et une réactivité sans faille. L'architecture du bot est pensée pour être légère,
          modulaire et facilement maintenable, permettant d'ajouter de nouvelles fonctionnalités rapidement tout en
          gardant une base de code propre et optimisée pour l'API de Discord.
        </p>

        <p style="color: var(--color-text-muted); font-size: 14.5px; line-height: 1.75; margin-top: 10px;">
          • <strong>Hébergement Docker :</strong> Le bot est entièrement conteneurisé avec <strong>Docker</strong>, ce
          qui assure un environnement d'exécution isolé, stable et un déploiement simplifié et portable sur n'importe
          quelle machine ou service d'hébergement.
          <br><br>
          • <strong>Architecture Modulaire :</strong> Chaque commande slash possède son propre fichier dans le dossier
          <span class="inline-code">/commands</span>. Le bot charge, met à jour et enregistre automatiquement toutes les commandes auprès de
          l'API Discord au démarrage, évitant ainsi toute configuration manuelle fastidieuse.
        </p>

        <div class="tag-list" style="margin-top: 14px;">
          <span class="tag-badge">Node.js</span>
          <span class="tag-badge">Discord.js</span>
          <span class="tag-badge">Docker</span>
          <span class="tag-badge">Architecture Modulaire</span>
        </div>

        <div style="display: flex; gap: 14px; flex-wrap: wrap; margin-top: 20px;">
          <a class="btn btn-outline" href="https://github.com/VenaticTundra22/H.U.N.T---UNIT/blob/main/GUIDE_COMMANDES.md"
            target="_blank" rel="noopener noreferrer">
            <i class="fa-regular fa-file-lines"></i>
            Guide technique (readme.md)
          </a>
          <a class="btn btn-outline" href="https://github.com/VenaticTundra22/H.U.N.T---UNIT" target="_blank"
            rel="noopener noreferrer">
            <i class="fa-brands fa-github"></i>
            Code source GitHub
          </a>
        </div>
      </div>
    </section>

    <section class="section-hunt" id="fonctions">
      <div class="section-header">
        <h3 class="display-title">Fonctions du bot</h3>
        <span class="module-ref">MODULE_LIST // 03</span>
      </div>
      <div class="functions-grid">
        <?php echo do_shortcode('[hunt_commandes]'); ?>
      </div>
    </section>

    <section class="privacy-section" id="politique">
      <div class="container">
        <div class="privacy-header">
          <span class="eyebrow-text">LEGAL // POLITIQUES</span>
          <h2 class="display-title">Nos Politiques</h2>
          <p class="privacy-date">Dernière mise à jour : 09/10/2026</p>
        </div>

        <div class="privacy-grid">

          <div class="privacy-card">
            <div class="privacy-icon">🤖</div>
            <h3 class="display-title">À propos du bot</h3>
            <p>
              <strong>H.U.N.T — UNIT</strong> est un bot Discord personnel développé et maintenu par
              <strong>VenaticTundra22</strong>. Il s'agit d'un projet indépendant, non affilié à Discord Inc.,
              fourni gratuitement sans aucune garantie de service continu.
            </p>
          </div>

          <div class="privacy-card">
            <div class="privacy-icon">📦</div>
            <h3 class="display-title">Données collectées</h3>
            <p>
              Le bot traite uniquement les données nécessaires à l'exécution des commandes :
              identifiants de serveur, de salons et d'utilisateurs (IDs Discord). Aucune donnée personnelle
              n'est stockée de manière permanente. Les sauvegardes de serveur générées par
              <span class="inline-code">/sauvegarder-serveur</span> sont transmises directement à l'administrateur
              et ne sont jamais conservées côté serveur.
            </p>
          </div>

          <div class="privacy-card">
            <div class="privacy-icon">🔒</div>
            <h3 class="display-title">Utilisation des données</h3>
            <p>
              Les données traitées par le bot ne sont ni vendues, ni partagées, ni transmises à
              des tiers. Elles servent exclusivement au fonctionnement des commandes sur le serveur
              Discord où elles sont émises, et ne sont pas conservées au-delà de la durée d'exécution
              de la commande.
            </p>
          </div>

          <div class="privacy-card">
            <div class="privacy-icon">📜</div>
            <h3 class="display-title">Conditions d'utilisation</h3>
            <p>
              H.U.N.T — UNIT est fourni gratuitement, « tel quel » et sans garantie. En l'utilisant, vous
              vous engagez à respecter les <strong>conditions d'utilisation de Discord</strong> et à ne pas
              détourner le bot à des fins abusives ou nuisibles (spam, harcèlement, ...). Tout usage abusif peut
              entraîner son retrait de votre serveur. Je ne peux être tenu responsable d'une perte
              de données ou d'une interruption de service.
            </p>
          </div>

          <div class="privacy-card featured">
            <div class="privacy-icon">⚠️</div>
            <h3 class="display-title">Droit de retrait & arrêt du projet</h3>
            <p>
              Je me réserve le droit, <strong>à tout moment et sans préavis</strong>, de :
            </p>
            <ul>
              <li>Suspendre ou arrêter définitivement le projet H.U.N.T — UNIT.</li>
              <li>Faire quitter le bot de n'importe quel serveur Discord, pour quelque raison que ce soit.</li>
              <li>Modifier, restreindre ou supprimer des fonctionnalités sans justification.</li>
            </ul>
            <p>
              En ajoutant ce bot à votre serveur, vous acceptez ces conditions et reconnaissez
              qu'aucun niveau de disponibilité n'est garanti.
            </p>
          </div>

        </div>

      </div>
    </section>

  </main>

  <!-- Pied de page (spécifique à cette page) -->
  <footer class="footer-hunt">
    <div class="footer-hunt-bar">
      <p class="footer-hunt-text">H.U.N.T — UNIT // HELPER UNIT FOR NETWORK TASKS</p>
      <div class="footer-links">
        <a href="#profil">Profil</a>
        <a href="#histoire">Histoire</a>
        <a href="#code">Code</a>
        <a href="#fonctions">Fonctions</a>
        <a href="#politique">Politiques</a>
      </div>
      <a class="footer-hunt-back" href="<?php echo esc_url( home_url( '/' ) ); ?>">← Retour à l'accueil</a>
    </div>
  </footer>

</body>
</html>