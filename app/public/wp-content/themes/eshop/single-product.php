<?php
get_header();
?>
<section class="content p-5">
    <?php

    $uri = $_SERVER['REQUEST_URI'];

    $segments = explode('/', trim($uri, '/'));

    $slug = end($segments);

    $product_obj = get_page_by_path($slug, OBJECT, 'product');
    if ($product_obj) {
        $product_id = $product_obj->ID;
        echo do_shortcode('[product_page ID="' . $product_id . '"]');
    } else {
        echo 'No product found with the given slug.';
    }


    ?>
</section>
<?php
get_footer();
?>