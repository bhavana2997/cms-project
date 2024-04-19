<?php get_header(); ?>

<div class="container">
    <!-- Home Page Image-->
    <div class="homepage-image">
        <?php
        $homepage_image = get_theme_mod('homepage_image');
        if ($homepage_image) {
            echo '<img src="' . esc_url($homepage_image) . '" class="banner-image" alt="Homepage">';
        }
        ?>
    </div>

    
    <section class="mt-4">
        <?php
        echo do_shortcode('[products limit="8"  visibility="visible"]');
        ?>
    </section>
</div>


<?php get_footer(); ?>