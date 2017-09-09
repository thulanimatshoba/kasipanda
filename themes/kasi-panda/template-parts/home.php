<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kasi_Panda
 */

get_header(); ?>

    <div class="home-slider">
        <?php if (!dynamic_sidebar('home-slider')): endif; ?>
    </div>

    <div id="primary" class="content-area">
        <main id="main" class="site-main uk-container uk-container-center">
            <?php
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', 'home');
            endwhile; // End of the loop.
            ?>
        </main><!-- #main -->

        <div id="about" class="uk-width-1-1">
            <div class="uk-height uk-background-cover uk-light uk-flex" uk-parallax="bgy: -200"
                 style="background-image: url('wp-content/themes/kasi-panda/img/wha-we-do-bg.jpg');">
                <div class="uk-container-center uk-container uk-width-1-1">
                    <?php
                    if (is_page()) {
                        $cat = get_cat_ID('About'); //use page title to get a category ID
                        $posts = get_posts("cat=$cat&showposts=1");

                        if ($posts) {
                            foreach ($posts as $post):
                                setup_postdata($post); ?>
                                <div class="article-content">
                                    <div class="the-content uk-margin-large-top">
                                        <h1 class="uk-article-title uk-text-center uk-text-uppercase uk-margin-large-bottom"><?php the_title(); ?> </h1>
                                        <?php the_content(); ?>
                                        <?php edit_post_link(); ?>
                                        <?php wp_link_pages(); ?>
                                    </div>
                                </div>
                            <?php endforeach;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <div id="services" class="uk-width-1-1 uk-margin-large-bottom">
            <div class="uk-container-center uk-container">
                <?php
                if (is_page()) {
                    $cat = get_cat_ID('Services'); //use page title to get a category ID
                    $posts = get_posts("cat=$cat&showposts=1");

                    if ($posts) {
                        foreach ($posts as $post):
                            setup_postdata($post); ?>
                            <div class="article-content">
                                <div class="the-content uk-margin-large-top">
                                    <h1 class="uk-article-title uk-text-center uk-text-uppercase"><?php the_title(); ?> </h1>
                                    <?php the_content(); ?>
                                    <?php edit_post_link(); ?>
                                    <?php wp_link_pages(); ?>
                                </div>
                            </div>
                        <?php endforeach;
                    }
                }
                ?>
            </div>
        </div>
        <div class="featured-products">
            <div class="uk-container">
                <?php echo do_shortcode("[wcps id='129' ]"); ?>
                <div class="uk-text-center uk-margin-bottom">
                <button class="uk-button"><a href="/shop/">See more</a></button>
                </div>
            </div>
        </div>

        <div id="team" class="uk-width-1-1">
            <div class="uk-background-cover uk-light" uk-parallax="bgy: -200"
                 style="background-color: #2e2f30;">
                <div class="uk-container">
                    <?php
                    if (is_page()) {
                        $cat = get_cat_ID('Team'); //use page title to get a category ID
                        $posts = get_posts("cat=$cat&showposts=1");

                        if ($posts) {
                            foreach ($posts as $post):
                                setup_postdata($post); ?>
                                <div class="article-content">
                                    <div class="the-content uk-margin-large-top">
                                        <h1 class="uk-article-title uk-text-center uk-text-uppercase"><?php the_title(); ?> </h1>
                                        <?php the_content(); ?>
                                        <?php edit_post_link(); ?>
                                        <?php wp_link_pages(); ?>
                                    </div>
                                </div>
                            <?php endforeach;
                        }
                    }
                    ?>

                </div>
            </div>
        </div>

        <div id="contacts" class="uk-width-1-1">
            <div class="uk-background-cover" uk-parallax="bgy: -200"
                 style="background-image: url('wp-content/themes/kasi-panda/img/contact-bg.jpg');">
                <div class="uk-container">
                    <?php
                    if (is_page()) {
                        $cat = get_cat_ID('Contact'); //use page title to get a category ID
                        $posts = get_posts("cat=$cat&showposts=1");

                        if ($posts) {
                            foreach ($posts as $post):
                                setup_postdata($post); ?>
                                <div class="the-content uk-margin-large-top">
                                    <h1 class="uk-article-title uk-text-center uk-text-uppercase"><?php the_title(); ?> </h1>
                                    <?php the_content(); ?>
                                    <?php edit_post_link(); ?>
                                    <?php wp_link_pages(); ?>


                                </div>
                            <?php endforeach;
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div><!-- #primary -->

<?php
get_footer();
