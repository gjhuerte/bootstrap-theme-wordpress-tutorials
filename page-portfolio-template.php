<?php
/**
 * Template Name: Portfolio Template
 */
get_header(); ?>

    <?php 
        $args = [
            'post_type'
        ];

        $loop = new WP_Query( $args );

        if( $loop->have_posts() ):

            while( $loop->have_posts() ): the_post(); ?>
                <?php get_template_part('content', 'archive'); ?>
            <?php endwhile;

        endif;

    ?>

<?php get_footer(); ?>