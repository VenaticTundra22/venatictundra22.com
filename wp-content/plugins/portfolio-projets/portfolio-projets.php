<?php
/**
 * Plugin Name: Portfolio Projets
 * Plugin URI: https://venatictundra22.com
 * Description: Affiche dynamiquement les projets techniques via un shortcode [mes_projets]
 * Version: 1.0.0
 * Author: VenaticTundra22
 * Author URI: https://venatictundra22.com
 * License: GPL v2 or later
 * Text Domain: portfolio-projets
 */

// Sécurité : empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Définir les constantes du plugin
define('PORTFOLIO_PROJETS_VERSION', '1.0.0');
define('PORTFOLIO_PROJETS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('PORTFOLIO_PROJETS_PLUGIN_URL', plugin_dir_url(__FILE__));

// Charger les fichiers nécessaires
require_once PORTFOLIO_PROJETS_PLUGIN_DIR . 'includes/shortcodes.php';
require_once PORTFOLIO_PROJETS_PLUGIN_DIR . 'includes/data-projets.php';

/**
 * Charger les styles CSS du plugin
 */
function portfolio_projets_enqueue_styles() {
    wp_enqueue_style(
        'portfolio-projets-styles',
        PORTFOLIO_PROJETS_PLUGIN_URL . 'assets/css/projets.css',
        array(),
        PORTFOLIO_PROJETS_VERSION
    );
}
add_action('wp_enqueue_scripts', 'portfolio_projets_enqueue_styles');

/**
 * Message d'activation du plugin
 */
function portfolio_projets_activation() {
    // Log dans le fichier de debug de WordPress (optionnel)
    error_log('Plugin Portfolio Projets activé');
}
register_activation_hook(__FILE__, 'portfolio_projets_activation');
