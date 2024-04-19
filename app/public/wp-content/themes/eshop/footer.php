<footer class=" mt-4">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">About <?php bloginfo('name'); ?></h5>
                <p><?php echo get_theme_mod('shopelite_about_content', 'Default about content if none is set.'); ?></p>
            </div>


            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">Useful Links</h5>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu',
                        'container' => 'ul',
                        'container_class' => 'footer-menu',
                        'menu_class' => 'list-unstyled',
                        'fallback_cb' => false,
                        'depth' => 1,
                    )
                );
                ?>
            </div>
        </div>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
    </div>
</footer>

<?php
wp_footer();
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
</body>

</html>