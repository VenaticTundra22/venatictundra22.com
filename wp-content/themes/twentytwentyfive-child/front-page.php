<?php
/**
 * Template : Page d'accueil (main-site)
 *
 * @package TwentyTwentyFive_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php get_header(); ?>



<main id="contenu-principal">

    <!-- ── Bannière d'accueil ── -->
    <div class="bandeau-accueil apparition">
        <div class="conteneur">
            <div class="sur-titre">VT22's Productions</div>
            <h1><?php esc_html_e( "Un peu de tout et n'importe quoi, à côté du portfolio.", 'twentytwentyfive-child' ); ?></h1>
            <p><?php esc_html_e( "Étudiant en BUT Informatique à Lille, passionné d'informatique. Ce site regroupe mes projets annexes, bots, jeux, essais divers en dehors de mon portfolio principal.", 'twentytwentyfive-child' ); ?></p>
        </div>
    </div>

    <!-- ── Section Projets ── -->
    <section id="projets" class="bloc apparition" aria-labelledby="titre-projets">
        <div class="conteneur">
            <div id="titre-projets" class="titre-section"><?php esc_html_e( 'Projets', 'twentytwentyfive-child' ); ?></div>
            <div class="grille-projets">

                <?php
                $query_projets = new WP_Query( array(
                    'post_type'      => 'projet',
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ) );

                if ( $query_projets->have_posts() ) :
                    while ( $query_projets->have_posts() ) : $query_projets->the_post();
                        $nature     = get_post_meta( get_the_ID(), '_projet_nature', true );
                        $desc       = get_post_meta( get_the_ID(), '_projet_description', true );
                        $lien_url   = get_post_meta( get_the_ID(), '_projet_lien_url', true );
                        $lien_texte = get_post_meta( get_the_ID(), '_projet_lien_texte', true );
                        $href       = $lien_url ? esc_url( $lien_url ) : '#';
                        $target     = $lien_url ? ' target="_blank" rel="noopener noreferrer"' : '';
                ?>
                <a class="carte-projet" href="<?php echo $href; ?>"<?php echo $target; ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'medium_large', array( 'class' => 'apercu-projet' ) ); ?>
                    <?php else : ?>
                        <span class="apercu-projet" aria-hidden="true"></span>
                    <?php endif; ?>
                    <?php if ( $nature ) : ?>
                        <span class="categorie-projet"><?php echo esc_html( $nature ); ?></span>
                    <?php endif; ?>
                    <span class="titre-projet"><?php the_title(); ?></span>
                    <?php if ( $desc ) : ?>
                        <span class="texte-projet"><?php echo esc_html( $desc ); ?></span>
                    <?php endif; ?>
                    <?php if ( $lien_texte ) : ?>
                        <span class="lien-projet"><?php echo esc_html( $lien_texte ); ?> &rarr;</span>
                    <?php endif; ?>
                </a>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <p style="color:var(--couleur-texte-discret); font-size:0.875rem;">
                        <?php esc_html_e( 'Aucun projet publié.', 'twentytwentyfive-child' ); ?>
                    </p>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <!-- ── Section Mes outils (CPT outil) ── -->
    <section id="mes-outils" class="bloc apparition" aria-labelledby="titre-outils">
        <div class="conteneur">
            <div id="titre-outils" class="titre-section"><?php esc_html_e( 'Mes outils', 'twentytwentyfive-child' ); ?></div>
            <div class="grille-outils">

                <?php
                $query_outils = new WP_Query( array(
                    'post_type'      => 'outil',
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ) );

                if ( $query_outils->have_posts() ) :
                    while ( $query_outils->have_posts() ) : $query_outils->the_post();
                        $sigle        = esc_html( get_post_meta( get_the_ID(), '_outil_sigle', true ) );
                        $connaissance = absint( get_post_meta( get_the_ID(), '_outil_connaissance', true ) );
                        $maitrise     = absint( get_post_meta( get_the_ID(), '_outil_maitrise', true ) );
                        if ( ! $sigle ) {
                            $sigle = esc_html( mb_substr( get_the_title(), 0, 2 ) );
                        }
                ?>
                <div class="carte-outil">
                    <span class="icone-outil" aria-hidden="true"><?php echo $sigle; ?></span>
                    <span class="nom-outil"><?php the_title(); ?></span>
                    <div class="barres-competences">
                        <div>
                            <div class="label-competence"><?php esc_html_e( 'Connaissance', 'twentytwentyfive-child' ); ?></div>
                            <div class="piste-competence">
                                <div class="remplissage-competence" style="width:<?php echo $connaissance; ?>%;"></div>
                            </div>
                        </div>
                        <div>
                            <div class="label-competence"><?php esc_html_e( 'Maîtrise', 'twentytwentyfive-child' ); ?></div>
                            <div class="piste-competence">
                                <div class="remplissage-competence" style="width:<?php echo $maitrise; ?>%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <p style="color:var(--couleur-texte-discret); font-size:0.875rem;">
                        <?php esc_html_e( 'Aucun outil publié.', 'twentytwentyfive-child' ); ?>
                    </p>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <!-- ── Section À propos ── -->
    <section id="a-propos" class="bloc apparition" aria-labelledby="titre-a-propos">
        <div class="conteneur bloc-a-propos">
            <div id="titre-a-propos" class="titre-section"><?php esc_html_e( 'À propos', 'twentytwentyfive-child' ); ?></div>
            <h2><?php esc_html_e( 'Un espace pour mes projets à côté.', 'twentytwentyfive-child' ); ?></h2>
            <p><?php esc_html_e( "Étudiant en 1ère année de BUT Informatique à l'IUT de Lille, passionné par le développement web, d'applications et de nouvelles technologies. Ce site regroupe les trucs que je bricole en parallèle, bots, jeux, essais divers. Pour le reste (parcours, projets académiques), direction le portfolio.", 'twentytwentyfive-child' ); ?></p>
            <div class="liste-competences">
                <span class="badge"><?php esc_html_e( 'Développement web', 'twentytwentyfive-child' ); ?></span>
                <span class="badge"><?php esc_html_e( "Développement d'applications", 'twentytwentyfive-child' ); ?></span>
                <span class="badge"><?php esc_html_e( 'SysAdmin / DevOps', 'twentytwentyfive-child' ); ?></span>
            </div>
            <div class="liste-liens">
                <a href="https://portfolio.venatictundra22.com" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Portfolio →', 'twentytwentyfive-child' ); ?></a>
                <a href="https://github.com/VenaticTundra22" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'GitHub', 'twentytwentyfive-child' ); ?></a>
                <a href="https://twitch.tv/VenaticTundra22" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Twitch', 'twentytwentyfive-child' ); ?></a>
            </div>
        </div>
    </section>

    <!-- ── Section Contact ── -->
    <section id="contact" class="bloc apparition" aria-labelledby="titre-contact">
        <div class="conteneur bloc-a-propos">
            <div id="titre-contact" class="titre-section"><?php esc_html_e( 'Contact', 'twentytwentyfive-child' ); ?></div>
            <h2><?php esc_html_e( 'Envie de discuter ?', 'twentytwentyfive-child' ); ?></h2>
            <p><?php esc_html_e( "N'hésite pas à me contacter si tu as une question sur l'un de mes projets, ou si tu souhaites simplement échanger.", 'twentytwentyfive-child' ); ?></p>
            <div class="liste-liens" style="margin-top: 2rem;">
                <a class="bouton bouton-principal" style="color: white; padding: 0.75rem 1.5rem; text-decoration: none; cursor:not-allowed"><?php esc_html_e( 'M\'envoyer un email', 'twentytwentyfive-child' ); ?></a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
