<?php
/**
 * Fonctions du thème enfant TwentyTwentyFive - VENA (main-site)
 * 
 * @package TwentyTwentyFive_Child
 * @version 1.0.0
 */

// ══════════════════════════════════════════════════════════════
// SÉCURITÉ : Empêcher l'accès direct au fichier
// ══════════════════════════════════════════════════════════════
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// ══════════════════════════════════════════════════════════════
// CONFIGURATION DU THÈME (SETUP)
// ══════════════════════════════════════════════════════════════

/**
 * Configuration initiale du thème enfant
 */
function twentytwentyfive_child_setup() {
    // Chargement des traductions pour le thème enfant (dossier /languages)
    load_child_theme_textdomain( 'twentytwentyfive-child', get_stylesheet_directory() . '/languages' );
    
    // Support SEO pour générer automatiquement la balise <title>
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'twentytwentyfive_child_setup' );

// ══════════════════════════════════════════════════════════════
// CHARGEMENT DES FEUILLES DE STYLE
// ══════════════════════════════════════════════════════════════

/**
 * Charge les styles du thème parent ET du thème enfant
 * 
 * Ordre de chargement :
 * 1. Style du parent (twentytwentyfive/style.css)
 * 2. Style de l'enfant (twentytwentyfive-child/style.css)
 * 
 * Ainsi, le CSS de l'enfant surcharge celui du parent.
 */
function twentytwentyfive_child_enqueue_styles() {

    // Charge le style enfant après le parent.
    // filemtime() force le rechargement du CSS à chaque modification du fichier (cache busting).
    wp_enqueue_style(
        'twentytwentyfive-child-style',
        get_stylesheet_uri(),
        array( 'twentytwentyfive-style' ),
        filemtime( get_stylesheet_directory() . '/style.css' )
    );

    // Google Fonts : Space Grotesk (front page)
    wp_enqueue_style(
        'twentytwentyfive-child-fonts',
        'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&display=swap',
        array(),
        null
    );
}

// Hook WordPress : Exécute la fonction au moment du chargement des styles
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_styles' );

/**
 * Ajoute les balises preconnect pour Google Fonts (optimisation de performance)
 */
function twentytwentyfive_child_preconnect_google_fonts( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin' => '',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        );
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'twentytwentyfive_child_preconnect_google_fonts', 10, 2 );




// ══════════════════════════════════════════════════════════════
// INTÉGRATION ÉDITEUR (GUTENBERG)
// ══════════════════════════════════════════════════════════════

/**
 * Enregistre une catégorie de compositions pour le Portfolio
 * Utile pour organiser les patterns liés au plugin 'portfolio-projets'
 */
function twentytwentyfive_child_register_pattern_categories() {
    register_block_pattern_category(
        'portfolio',
        array( 'label' => __( 'Portfolio', 'twentytwentyfive-child' ) )
    );
}
add_action( 'init', 'twentytwentyfive_child_register_pattern_categories' );

// ══════════════════════════════════════════════════════════════
// PERSONNALISATIONS FUTURES (à décommenter si besoin)
// ══════════════════════════════════════════════════════════════

/**
 * Exemple : Ajouter un script JavaScript personnalisé
 * 
 * function twentytwentyfive_child_enqueue_scripts() {
 *     wp_enqueue_script(
 *         'custom-script',
 *         get_stylesheet_directory_uri() . '/assets/js/custom.js',
 *         array('jquery'),
 *         '1.0.0',
 *         true
 *     );
 * }
 * add_action( 'wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_scripts' );
 */

/**
 * Exemple : Modifier la longueur des extraits
 * 
 * function custom_excerpt_length( $length ) {
 *     return 30; // 30 mots au lieu de 55 par défaut
 * }
 * add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
 */

// ══════════════════════════════════════════════════════════════
// CUSTOM POST TYPE: OUTILS (section "Mes outils" — front page)
// ══════════════════════════════════════════════════════════════

/**
 * Enregistre le Custom Post Type "Outil".
 *
 * Chaque post représente un outil (Docker, Nginx, PHP…).
 * Le titre du post = nom de l'outil.
 * L'ordre d'affichage = champ "Ordre" (Attributs de la page → menu_order).
 */
function tt25_child_register_outil_cpt() {
    $labels = array(
        'name'          => _x( 'Outils', 'Post Type General Name', 'twentytwentyfive-child' ),
        'singular_name' => _x( 'Outil', 'Post Type Singular Name', 'twentytwentyfive-child' ),
        'menu_name'     => __( 'Mes outils', 'twentytwentyfive-child' ),
        'all_items'     => __( 'Tous les outils', 'twentytwentyfive-child' ),
        'add_new_item'  => __( 'Ajouter un outil', 'twentytwentyfive-child' ),
        'add_new'       => __( 'Ajouter', 'twentytwentyfive-child' ),
        'edit_item'     => __( 'Modifier l\'outil', 'twentytwentyfive-child' ),
        'not_found'     => __( 'Aucun outil trouvé', 'twentytwentyfive-child' ),
    );
    $args = array(
        'label'               => __( 'Outil', 'twentytwentyfive-child' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'page-attributes' ), // title = nom, page-attributes = ordre
        'hierarchical'        => false,
        'public'              => false,   // Pas d'URL publique, usage interne uniquement
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-hammer',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );
    register_post_type( 'outil', $args );
}
add_action( 'init', 'tt25_child_register_outil_cpt', 0 );

/**
 * Ajoute la boîte de métadonnées pour les détails d'un outil.
 */
function tt25_child_add_outil_meta_box() {
    add_meta_box(
        'outil_details',
        __( 'Détails de l\'outil', 'twentytwentyfive-child' ),
        'tt25_child_outil_meta_box_callback',
        'outil',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'tt25_child_add_outil_meta_box' );

/**
 * Affiche les champs de la boîte de métadonnées.
 */
function tt25_child_outil_meta_box_callback( $post ) {
    wp_nonce_field( 'tt25_child_save_outil_meta', 'tt25_child_outil_nonce' );

    $sigle        = get_post_meta( $post->ID, '_outil_sigle', true );
    $connaissance = get_post_meta( $post->ID, '_outil_connaissance', true );
    $maitrise     = get_post_meta( $post->ID, '_outil_maitrise', true );
    ?>
    <table class="form-table" style="width:100%;">
        <tr>
            <th style="width:160px;">
                <label for="outil_sigle"><strong><?php _e( 'Sigle (2–3 lettres)', 'twentytwentyfive-child' ); ?></strong></label>
            </th>
            <td>
                <input type="text"
                       id="outil_sigle"
                       name="outil_sigle"
                       value="<?php echo esc_attr( $sigle ); ?>"
                       maxlength="4"
                       style="width:80px;"
                       placeholder="Ex: Do" />
                <p class="description"><?php _e( 'Abréviation affichée dans l\'icône (ex : Do pour Docker, Ng pour Nginx).', 'twentytwentyfive-child' ); ?></p>
            </td>
        </tr>
        <tr>
            <th>
                <label for="outil_connaissance"><strong><?php _e( 'Connaissance (%)', 'twentytwentyfive-child' ); ?></strong></label>
            </th>
            <td>
                <input type="number"
                       id="outil_connaissance"
                       name="outil_connaissance"
                       value="<?php echo esc_attr( $connaissance ); ?>"
                       min="0" max="100"
                       style="width:80px;" />
                <span>%</span>
            </td>
        </tr>
        <tr>
            <th>
                <label for="outil_maitrise"><strong><?php _e( 'Maîtrise (%)', 'twentytwentyfive-child' ); ?></strong></label>
            </th>
            <td>
                <input type="number"
                       id="outil_maitrise"
                       name="outil_maitrise"
                       value="<?php echo esc_attr( $maitrise ); ?>"
                       min="0" max="100"
                       style="width:80px;" />
                <span>%</span>
            </td>
        </tr>
    </table>
    <p style="margin-top:12px; color:#666;">
        <em><?php _e( 'L\'ordre d\'affichage se définit via "Attributs de la page → Ordre" (0 = en premier).', 'twentytwentyfive-child' ); ?></em>
    </p>
    <?php
}

/**
 * Sauvegarde les métadonnées de l'outil.
 */
function tt25_child_save_outil_meta( $post_id ) {
    // Vérifications de sécurité
    if ( ! isset( $_POST['tt25_child_outil_nonce'] )
        || ! wp_verify_nonce( $_POST['tt25_child_outil_nonce'], 'tt25_child_save_outil_meta' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Sigle (max 4 caractères, alphanumérique)
    if ( isset( $_POST['outil_sigle'] ) ) {
        $sigle = sanitize_text_field( $_POST['outil_sigle'] );
        $sigle = substr( $sigle, 0, 4 );
        update_post_meta( $post_id, '_outil_sigle', $sigle );
    }

    // Connaissance (entier 0–100)
    if ( isset( $_POST['outil_connaissance'] ) ) {
        $val = min( 100, max( 0, absint( $_POST['outil_connaissance'] ) ) );
        update_post_meta( $post_id, '_outil_connaissance', $val );
    }

    // Maîtrise (entier 0–100)
    if ( isset( $_POST['outil_maitrise'] ) ) {
        $val = min( 100, max( 0, absint( $_POST['outil_maitrise'] ) ) );
        update_post_meta( $post_id, '_outil_maitrise', $val );
    }
}
add_action( 'save_post_outil', 'tt25_child_save_outil_meta' );

// =============================================================
// CUSTOM POST TYPE: PROJETS (section "Projets" - front page)
// =============================================================

/**
 * Enregistre le Custom Post Type "Projet".
 * Titre = nom, Image a la une = apercu 16/9, Ordre = menu_order.
 */
function tt25_child_register_projet_cpt() {
    $labels = array(
        'name'          => _x( 'Projets', 'Post Type General Name', 'twentytwentyfive-child' ),
        'singular_name' => _x( 'Projet', 'Post Type Singular Name', 'twentytwentyfive-child' ),
        'menu_name'     => __( 'Projets front page', 'twentytwentyfive-child' ),
        'all_items'     => __( 'Tous les projets', 'twentytwentyfive-child' ),
        'add_new_item'  => __( 'Ajouter un projet', 'twentytwentyfive-child' ),
        'add_new'       => __( 'Ajouter', 'twentytwentyfive-child' ),
        'edit_item'     => __( 'Modifier le projet', 'twentytwentyfive-child' ),
        'not_found'     => __( 'Aucun projet trouve', 'twentytwentyfive-child' ),
    );
    $args = array(
        'label'               => __( 'Projet', 'twentytwentyfive-child' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 21,
        'menu_icon'           => 'dashicons-portfolio',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );
    register_post_type( 'projet', $args );
}
add_action( 'init', 'tt25_child_register_projet_cpt', 0 );

// Image a la une pour le CPT projet
add_action( 'after_setup_theme', function() {
    add_theme_support( 'post-thumbnails', array( 'projet' ) );
} );

/**
 * Meta box pour les details d'un projet.
 */
function tt25_child_add_projet_meta_box() {
    add_meta_box(
        'projet_details',
        __( 'Details du projet', 'twentytwentyfive-child' ),
        'tt25_child_projet_meta_box_callback',
        'projet',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'tt25_child_add_projet_meta_box' );

function tt25_child_projet_meta_box_callback( $post ) {
    wp_nonce_field( 'tt25_child_save_projet_meta', 'tt25_child_projet_nonce' );

    $nature     = get_post_meta( $post->ID, '_projet_nature', true );
    $desc       = get_post_meta( $post->ID, '_projet_description', true );
    $lien_url   = get_post_meta( $post->ID, '_projet_lien_url', true );
    $lien_texte = get_post_meta( $post->ID, '_projet_lien_texte', true );
    ?>
    <table class="form-table" style="width:100%;">
        <tr>
            <th style="width:180px;"><label for="projet_nature"><strong><?php _e( 'Nature (label bleu)', 'twentytwentyfive-child' ); ?></strong></label></th>
            <td>
                <input type="text" id="projet_nature" name="projet_nature" value="<?php echo esc_attr( $nature ); ?>" style="width:100%;" placeholder="Ex : Jeu web, Bot Discord..." />
                <p class="description"><?php _e( 'Texte en accent au-dessus du titre.', 'twentytwentyfive-child' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="projet_description"><strong><?php _e( 'Description', 'twentytwentyfive-child' ); ?></strong></label></th>
            <td><textarea id="projet_description" name="projet_description" rows="3" style="width:100%;"><?php echo esc_textarea( $desc ); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="projet_lien_url"><strong><?php _e( 'URL du bouton', 'twentytwentyfive-child' ); ?></strong></label></th>
            <td><input type="url" id="projet_lien_url" name="projet_lien_url" value="<?php echo esc_attr( $lien_url ); ?>" style="width:100%;" placeholder="https://..." /></td>
        </tr>
        <tr>
            <th><label for="projet_lien_texte"><strong><?php _e( 'Texte du bouton', 'twentytwentyfive-child' ); ?></strong></label></th>
            <td>
                <input type="text" id="projet_lien_texte" name="projet_lien_texte" value="<?php echo esc_attr( $lien_texte ); ?>" style="width:60%;" placeholder="Ex : Jouer, Voir le bot..." />
                <p class="description"><?php _e( 'La fleche est ajoutee automatiquement.', 'twentytwentyfive-child' ); ?></p>
            </td>
        </tr>
    </table>
    <p style="margin-top:12px;color:#666;"><em><?php _e( "Image a la une = apercu 16/9. Ordre = Attributs de la page -> Ordre (0 = premier).", 'twentytwentyfive-child' ); ?></em></p>
    <?php
}

function tt25_child_save_projet_meta( $post_id ) {
    if ( ! isset( $_POST['tt25_child_projet_nonce'] )
        || ! wp_verify_nonce( $_POST['tt25_child_projet_nonce'], 'tt25_child_save_projet_meta' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
    if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }

    if ( isset( $_POST['projet_nature'] ) )
        update_post_meta( $post_id, '_projet_nature', sanitize_text_field( $_POST['projet_nature'] ) );
    if ( isset( $_POST['projet_description'] ) )
        update_post_meta( $post_id, '_projet_description', sanitize_textarea_field( $_POST['projet_description'] ) );
    if ( isset( $_POST['projet_lien_url'] ) )
        update_post_meta( $post_id, '_projet_lien_url', esc_url_raw( $_POST['projet_lien_url'] ) );
    if ( isset( $_POST['projet_lien_texte'] ) )
        update_post_meta( $post_id, '_projet_lien_texte', sanitize_text_field( $_POST['projet_lien_texte'] ) );
}
add_action( 'save_post_projet', 'tt25_child_save_projet_meta' );


// ══════════════════════════════════════════════════════════════
// SÉCURITÉ & NETTOYAGE
// ══════════════════════════════════════════════════════════════

/**
 * 1. Désactive XML-RPC
 * Empêche les attaques par force brute et DDoS via ce protocole obsolète.
 */
add_filter( 'xmlrpc_enabled', '__return_false' );
add_action( 'init', function() {
    if ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) {
        http_response_code( 403 );
        exit( 'XML-RPC Forbidden' );
    }
});

/**
 * 2. Désactive l'énumération des utilisateurs via l'API REST
 * Correction : Utilisation des vrais chevrons < > au lieu des entités HTML.
 */
add_filter( 'rest_endpoints', function( $endpoints ){
    if ( isset( $endpoints['/wp/v2/users'] ) ) {
        unset( $endpoints['/wp/v2/users'] );
    }
    if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
        unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
    }
    return $endpoints;
});

/**
 * 3. Bloque l'énumération des auteurs via l'URL (?author=1)
 * Redirige vers l'accueil si un bot tente de scanner les ID utilisateurs.
 */
function tt25_child_block_author_scans() {
    if ( is_admin() ) return;
    
    // Si le paramètre author est présent ou si c'est une page auteur
    if ( isset( $_GET['author'] ) || ( is_author() && ! is_admin() ) ) {
        wp_redirect( home_url(), 301 );
        exit;
    }
}
add_action( 'template_redirect', 'tt25_child_block_author_scans', 1 );

/**
 * 4. Masque la version de WordPress dans le code source
 * Rend les scans via curl moins informatifs pour les attaquants.
 */
remove_action('wp_head', 'wp_generator');