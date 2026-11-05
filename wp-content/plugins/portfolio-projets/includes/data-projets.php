<?php
/**
 * Données des projets techniques
 * 
 * Ce fichier contient la liste des projets sous forme de tableau PHP.
 * Pour ajouter un projet, il suffit d'ajouter un élément au tableau.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Retourne la liste des projets
 * 
 * @return array Tableau associatif des projets
 */
function portfolio_get_projets() {
    return array(
        array(
            'emoji' => '🖥️',
            'titre' => 'Infrastructure Web Full-Stack',
            'description' => 'Déploiement d\'un site WordPress sécurisé sur serveur Debian, avec architecture Docker (Nginx + MariaDB + PHP-FPM), pare-feu UFW, et authentification SSH par clés Ed25519.',
            'badges' => array('Docker', 'Nginx', 'Linux', 'PHP', 'MariaDB'),
            'competences' => 'SysAdmin, DevOps, Sécurité réseau'
        ),
        array(
            'emoji' => '🎨',
            'titre' => 'Développement Frontend',
            'description' => 'Création d\'un thème enfant WordPress avec variables CSS personnalisées, animations au survol, et design responsive adapté aux mobiles.',
            'badges' => array('CSS', 'HTML', 'Responsive Design', 'WordPress'),
            'competences' => 'Frontend, UX/UI, Accessibilité'
        ),
        array(
            'emoji' => '🔐',
            'titre' => 'Sécurité & Hardening',
            'description' => 'Mise en place de Fail2Ban pour le bannissement automatique d\'IP malveillantes, configuration d\'un reverse proxy Nginx avec en-têtes de sécurité HTTP, et gestion des secrets via variables d\'environnement (.env).',
            'badges' => array('Fail2Ban', 'UFW', 'SSL/TLS', 'OWASP'),
            'competences' => 'CyberSécurité, Best Practices'
        ),
        array(
            'emoji' => '📝',
            'titre' => 'Documentation Technique',
            'description' => 'Rédaction d\'un journal de bord détaillé (JOURNAL.md) documentant chaque étape du projet, les problèmes rencontrés, et les solutions apportées. Publication sous forme d\'articles de blog sur le site.',
            'badges' => array('Markdown', 'Git', 'Communication écrite'),
            'competences' => 'Veille technique, Rigueur méthodologique'
        ),
	array(
            'emoji' => '🚀',
            'titre' => 'Plugin WordPress Maison',
            'description' => 'Développement d\'un plugin PHP personnalisé avec shortcode [mes_projets], séparation données/présentation, et sécurisation via esc_html(). Code versionné sur Git.',
            'badges' => array('PHP', 'WordPress API', 'Shortcodes', 'POO'),
            'competences' => 'Développement Backend, Architecture logicielle'
        ),
    );
}

/**
 * Retourne la liste des commandes du bot H.U.N.T
 * 
 * @return array Tableau associatif des commandes
 */
function portfolio_get_hunt_commandes() {
    return array(
        array(
            'idx'   => 'MOD.01',
            'title' => '/Help',
            'desc'  => "Permet d'avoir de l'aide sur l'utilisation des différentes commandes et des informations sur le bot lui-même telle que le nombre de serveur sur lequel il se trouve et sa latence."
        ),
        array(
            'idx'   => 'MOD.02',
            'title' => '/Embed',
            'desc'  => "Créez vos propres embeds personnalisés et envoyez-les à votre guise sur votre serveur. Prend en charge l'ajout de titre, de texte supportant le MarkDown, d'images via leurs URL, de couleurs personnalisées et d'un footer personnalisé."
        ),
        array(
            'idx'   => 'MOD.03',
            'title' => '/Builder',
            'desc'  => "Permet exactement la même chose que la fonction \"Embed\" mais de manière beaucoup plus avancée. Permet d'envoyer plusieurs embeds d'un seul coup et d'y ajouter un message texte envoyé avant les embeds, idéal pour des messages de publicité ou des messages d'information."
        ),
        array(
            'idx'   => 'MOD.04',
            'title' => '/Clear',
            'desc'  => "Supprime un nombre défini de messages dans un salon. Seuls les utilisateurs ayant la permission <strong>Gérer les messages</strong> peuvent l'utiliser."
        ),
        array(
            'idx'   => 'MOD.05',
            'title' => '/ReactionRole',
            'desc'  => "Permet d'attribuer des rôles par réaction. Les utilisateurs peuvent cliquer sur un bouton pour obtenir un rôle et le retirer en cliquant à nouveau. Utilise discord components V2 pour un rendu premium."
        ),
        array(
            'idx'   => 'MOD.06',
            'title' => '/Say',
            'desc'  => "Permet d'envoyer un message via le bot avec la possibilité d'y ajouter une image."
        ),
        array(
            'idx'   => 'MOD.07',
            'title' => '/Paslu',
            'desc'  => "Permet de réagir a un message via son id avec les émoji P A S L U."
        ),
        array(
            'idx' => 'MOD.08',
            'title' => '/Sauvegarder-serveur',
            'desc' => "Permet de sauvegarder un serveur sous forme de fichier .json (JSON brut) téléchargeable (aucune sauvegarde serveur si le fichier n'est pas téléchargé il est perdu)."
        ),
        array(
            'idx' => 'MOD.09',
            'title' => '/Importer-serveur',
            'desc' => "Permet d'importer un serveur sauvegarder avec la commande <strong>Sauvegarde-serveur</strong> (le json peut être modifié avant d'être importé si vous voulez changer des choses)."
        ),
    );
}

