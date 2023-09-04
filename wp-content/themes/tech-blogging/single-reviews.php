<?php
/**
 * Template Name: Reviews Template
 *
 * This is the template for displaying reviews.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tech Blogging
 */
$fields = get_fields();
get_header();

while (have_posts()) : the_post();
    $post_id = get_the_ID();
    $content = get_the_content();
    ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 post-details-page">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </header>

                            <div class="entry-content">
                                <?php

                                $pattern = '/<h2>(.*?)<\/h2>/';
                                preg_match_all($pattern, $content, $matches);

                                if (!empty($matches[1])) {
                                    echo '<h2>Table of Contents</h2>';
                                    echo '<ol>';
                                    foreach ($matches[1] as $index => $match) {
                                        echo '<li><a href="#section-' . ($index + 1) . '">' . $match . '</a></li>';
                                    }
                                    echo '</ol>';
                                }


                                $content_with_anchors = preg_replace_callback($pattern, function ($match) {
                                    $section_id = sanitize_title($match[1]);
                                    return '<h2 id="' . $section_id . '">' . $match[1] . '</h2>';
                                }, $content);

                                echo $content_with_anchors;

                                if (!empty($fields['logo'])) { ?>
                                    <div class="logo"><img src="<?php echo $fields['logo']['url']; ?>"></div>
                                <?php }
                                if (!empty($fields['name'])) { ?>
                                    <div class="name"><?php echo $fields['name']; ?></div>
                                <?php }
                                if (!empty($fields['bonus'])) { ?>
                                    <div class="bonus"><?php echo $fields['bonus']; ?></div>
                                <?php }
                                if (!empty($fields['rating'])) { ?>
                                    <div class="rating"><?php echo $fields['rating']; ?></div>
                                <?php }
                                if (!empty($fields['features'])) {
                                    $features = explode(',', $fields['features']);

                                    if (!empty($features)) {
                                        echo '<ul>';
                                        foreach ($features as $feature) {
                                            $feature = trim($feature);
                                            echo '<li>' . esc_html($feature) . '</li>';
                                        };
                                        echo '</ul>';
                                    }
                                }
                                ?>
                            </div>

                            <?php

                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                            ?>
                        </article>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php endwhile;
get_footer();
