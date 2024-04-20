<?php
get_header();
?>
<section class="content p-5">
    <?php

    $url = $_SERVER['REQUEST_URI'];

    $path = parse_url($url, PHP_URL_PATH); 
    $segments = explode('/', trim($path, '/')); 
    $post_id = end($segments); 
    
    $post = get_post($post_id);
    if ($post) {
        setup_postdata($post);
        ?>
        <h1><?php the_title(); ?></h1>
        <div>
            <?php the_content(); ?>
        </div>
        <?php
        wp_reset_postdata();
    } else {
        echo 'Post not found';
    }

    ?>
</section>
<?php
get_footer();
?>