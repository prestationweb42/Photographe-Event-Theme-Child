<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- Include Section Hero -->
<?php get_template_part('template-parts/front-page/section_hero'); ?>


<!-- Include Section Filters -->
<?php get_template_part('template-parts/front-page/filters'); ?>

<!-- Section Display Results Filtered  -->
<section id="section_result_filtered" class="section_post_imgs_container">
</section>


<!-- Section Display More images -->
<section id="section_display_more" class="section_post_imgs_container display_none">
    <?php
            // Post per page definition
            $post_per_page = 6;
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
            ?>
    <!-- Post Card -->
    <?php get_template_part('template-parts/post-card'); ?>

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