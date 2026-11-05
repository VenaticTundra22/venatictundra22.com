<?php
/**
 * Template : En-tête du site (main-site)
 *
 * @package TwentyTwentyFive_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $meta_desc = get_bloginfo( 'description' );
    if ( is_front_page() ) {
        $meta_desc = "Étudiant en BUT Informatique à Lille, passionné d'informatique. Ce site regroupe mes projets annexes, bots, jeux, essais divers en dehors de mon portfolio principal.";
    }
    ?>
    <meta name="description" content="<?php echo esc_attr( $meta_desc ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
    <div class="conteneur entete-barre">

        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <span>VENA</span>
        </a>

        <nav aria-label="<?php esc_attr_e( 'Navigation principale', 'twentytwentyfive-child' ); ?>">
            <a href="<?php echo esc_url( home_url( '/#projets' ) ); ?>"><?php esc_html_e( 'Projets', 'twentytwentyfive-child' ); ?></a>
            <span class="separateur" aria-hidden="true">/</span>
            <a href="<?php echo esc_url( home_url( '/#mes-outils' ) ); ?>"><?php esc_html_e( 'Outils', 'twentytwentyfive-child' ); ?></a>
            <span class="separateur" aria-hidden="true">/</span>
            <a href="<?php echo esc_url( home_url( '/#a-propos' ) ); ?>"><?php esc_html_e( 'À propos', 'twentytwentyfive-child' ); ?></a>
            <span class="separateur" aria-hidden="true">/</span>
            <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Contact', 'twentytwentyfive-child' ); ?></a>        
        </nav>

        <div class="actions-entete">
            <?php if ( is_user_logged_in() ) : ?>
                <a class="bouton bouton-discret" href="<?php echo esc_url( wp_logout_url( home_url( '/' ) ) ); ?>">
                    <?php esc_html_e( 'Déconnexion', 'twentytwentyfive-child' ); ?>
                </a>
            <?php else : ?>
                <a class="bouton bouton-discret" href="<?php echo esc_url( wp_login_url() ); ?>">
                    <?php esc_html_e( 'Connexion', 'twentytwentyfive-child' ); ?>
                </a>
            <?php endif; ?>
        </div>

    </div>
</header>
