<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="hero_section">

    <?php
            // récupération de la catégorie
            $category = array('mariage', 'concert', 'television', 'reception');

            // définition des arguments
            $args = array(
                'orderby' => 'rand',
                'post_type' => 'photo',
                'posts_per_page' => 1,
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'format',
                        'field' => 'slug',
                        'terms' => 'paysage',
                    ),
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'slug',
                        'terms' => $category,
                    ),
                ),
            );
            // Définition / execution de wp query
            $query = new WP_Query($args);
            // Boucle d'execution de wp query
            while ($query->have_posts()) : $query->the_post();
            ?>
    <div class="hero_img">
        <?php get_template_part('template-parts/post-img'); ?>
    </div>
    <?php endwhile;
            wp_reset_postdata() ?>

    <h1 class="hero_section_title">
        <svg viewbox="0 0 10 2">
            <text x="5" y="1" text-anchor="middle" font-size="0.7" fill="none" stroke-width=".02" stroke="#fff"
                font-family="space mono" font-style="italic" font-weight=900 text-transform="uppercase">PHOTOGRAPHE
                EVENT
            </text>
        </svg>
    </h1>
</section><!-- .hero_section-->

<!-- Include Section Filters -->
<?php get_template_part('template-parts/front-page/filters'); ?>

<!-- Section Display Results Filtered  -->
<section id="section_result_filtered" class="section_post_imgs_container">
</section>


<!-- Section Display More images -->
<section id="section_display_more" class="section_post_imgs_container display_none">
    <?php
            // Post per page definition
            $post_per_page = 2;
            // Argument definition
            $args = array(
                'orderby' => 'rand',
                'post_type' => 'photo',
                'posts_per_page' => $post_per_page,
                // 'paged' => 10,
            );
            // Definition / Execution of wp-query
            $query = new WP_Query($args);
            // Execution loop of wp-query
            while ($query->have_posts()) : $query->the_post();
                $post_url = get_permalink();
                // $references = get_field('reference');
            ?>
    <div class="post_img">
        <!-- Overlay Img -->
        <div class="post_img_overlay">
            <div class="text_category">tata</div>
            <div class="text_reference">toto
            </div>
            <div class="icon_eye">
                <a href="<?php echo $post_url; ?>" class="lightbox_trigger">
                    <img
                        src="http://localhost:8888/PhotographeEvent/wp-content/themes/photographe-event/assets/img/icon-eye.svg">
                </a>
            </div>
            <div class="icon_fullscreen">
                <img
                    src="
                    http://localhost:8888/PhotographeEvent/wp-content/themes/photographe-event/assets/img/Icon_fullscreen.png">
            </div>
        </div>
        <!-- Overlay Img -->
        <?php get_template_part('template-parts/post-img'); ?>
    </div>
    <?php get_template_part('template-parts/lightbox'); ?>
    <?php endwhile;
            wp_reset_postdata() ?>
</section><!-- section_post_imgs_container -->
<div class="div_btn_load_more">
    <div class="btn_load_more">
        <span id="loadMoreBtn">Charger Plus</span>
    </div>
</div><!-- .div_btn_load_more -->

<?php endwhile;
endif; ?>
<?php get_footer(); ?>