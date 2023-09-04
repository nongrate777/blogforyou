<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tech Blogging
 */
$fields = get_field('main', 'options');
get_header();

$show_hide_banner_section = get_theme_mod('tech_blogging_section_show_hide', true);

if (true === $show_hide_banner_section) {
    get_template_part('template-parts/banner/banner', 'section');
}
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <p class="copyright"> <?php echo $fields['slogan'] . ' ' . date('Y'); ?></p>
            </div>
            <?php
            do_action('tech_blogging_before_default_page');
            if (have_posts()) :
                echo '<div class="row masonaryactive">';
                /* Start the Loop */
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content/content', get_post_type());
                endwhile;
                echo '</div>';
                tech_blogging_navigation();
            else :
                get_template_part('template-parts/content/content', 'none');
            endif;
            do_action('tech_blogging_after_default_page');
            ?>
            <div class="container">
                <?php
                $args = array(
                    'post_type' => 'reviews',
                    'posts_per_page' => 3,
                    'order' => 'DESC',
                );

                $reviews_query = new WP_Query($args);

                if ($reviews_query->have_posts()) :
                    echo '<div class="row">';
                    while ($reviews_query->have_posts()) : $reviews_query->the_post();
                        $fields = get_fields();
                        ?>
                        <div class="col-md-4">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header">
                                    <h2 class="entry-title"><?php the_title(); ?></h2>
                                </header>
                                <div class="entry-content">
                                    <?php

                                    if (!empty($fields['logo'])) {
                                        echo '<div class="logo"><img src="' . $fields['logo']['url'] . '"></div>';
                                    }
                                    if (!empty($fields['name'])) {
                                        echo '<div class="name">' . $fields['name'] . '</div>';
                                    }
                                    if (!empty($fields['bonus'])) {
                                        echo '<div class="bonus">' . $fields['bonus'] . '</div>';
                                    }
                                    if (!empty($fields['rating'])) {
                                        echo '<div class="rating">' . $fields['rating'] . '</div>';
                                    }
                                    ?>
                                    <div class="features" style="display: none;">
                                        <?php
                                        if (!empty($fields['features'])) {
                                            $features = explode(',', $fields['features']);
                                            if (!empty($features)) {
                                                echo '<ul>';
                                                foreach ($features as $feature) {
                                                    $feature = trim($feature);
                                                    echo '<li>' . esc_html($feature) . '</li>';
                                                }
                                                echo '</ul>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <button class="show-features-btn">Show More</button>
                                </div>
                                <footer class="entry-footer">
                                    <a href="<?php the_permalink(); ?>" class="read-more-link">Try it now!.</a>
                                </footer>
                            </article>
                        </div>
                    <?php
                    endwhile;
                    echo '</div>';
                    wp_reset_postdata();
                else :
                    echo 'No reviews found.';
                endif;
                ?>
            </div>
        </main><!-- #main -->
    </div>
<?php
get_footer();
