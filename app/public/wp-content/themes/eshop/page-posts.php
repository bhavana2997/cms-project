<?php
/* Template Name: Custom Posts Page */

get_header();

$args = array(
    'post_type' => 'post', 
    'posts_per_page' => 10 
);
$query = new WP_Query($args);

if ($query->have_posts()) : 
    while ($query->have_posts()) : $query->the_post();
        ?>
        <div class="post container p-3 mt-3">
            <h2><?php the_title(); ?></h2>
            <div class="post-details">
                <span class="post-category">
                    <b>Category:</b> <?php the_category(', '); ?>
                </span>
                <span class="post-date ps-2">
                    <b>Published on:</b> <?php echo get_the_date(); ?>
                </span>
                <span class="post-tags ps-2">
                   <b> Tags:</b> <?php the_tags('', ', '); ?>
                </span>
            </div>
            <div class="post-excerpt">
                <?php the_excerpt(); ?>
            </div>
        </div>
        <?php
    endwhile;
else :
    echo '<p>No posts found.</p>';
endif;

// Reset post data to avoid conflicts
wp_reset_postdata();

get_footer();
?>
