<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

    <?php if( has_post_thumbnail() ): ?>
        <div class="pull-left"><?php the_post_thumbnail('thumbnail'); ?></div>
    <?php endif; ?>

    <?php if( has_category() ): ?>
    <small><?php the_category(' &#9675; '); ?> | <?php the_tags(); ?> | <?php edit_post_link(); ?></small>
    <?php endif; ?>

    <div class="text-justify">
    <?php the_excerpt(); ?>
    </div>

</article>