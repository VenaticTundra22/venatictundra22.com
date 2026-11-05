<?php
/**
 * Template : Pied de page du site (main-site)
 *
 * @package TwentyTwentyFive_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<footer>
    <div class="conteneur pied-barre">

        <span class="logo"><span>VENA</span></span>

        <nav class="liens-pied" aria-label="<?php esc_attr_e( 'Navigation pied de page', 'twentytwentyfive-child' ); ?>">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Accueil', 'twentytwentyfive-child' ); ?></a>
            <a href="<?php echo esc_url( home_url( '/#projets' ) ); ?>"><?php esc_html_e( 'Projets', 'twentytwentyfive-child' ); ?></a>
            <a href="<?php echo esc_url( home_url( '/#mes-outils' ) ); ?>"><?php esc_html_e( 'Outils', 'twentytwentyfive-child' ); ?></a>
            <a href="<?php echo esc_url( home_url( '/#a-propos' ) ); ?>"><?php esc_html_e( 'À propos', 'twentytwentyfive-child' ); ?></a>
            <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Contact', 'twentytwentyfive-child' ); ?></a>
        </nav>

        <span class="copyright">
            &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> VenaticTundra22
        </span>

    </div>
</footer>

<script>
/* Animation d'apparition au défilement */
(function () {
    var els = document.querySelectorAll('.apparition');
    if (!els.length) return;
    if (!('IntersectionObserver' in window)) {
        els.forEach(function (el) { el.classList.add('est-visible'); });
        return;
    }
    var obs = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) {
                e.target.classList.add('est-visible');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
    els.forEach(function (el) { obs.observe(el); });
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
