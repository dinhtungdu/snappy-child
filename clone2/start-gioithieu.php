<?php
/**
 * Template name: Clone Gioi thieu
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 */
get_header();
include "simple_html_dom.php";
?>
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">
<article class="post-2 page type-page status-publish hentry">
<div class="entry-content">
<script src="<?php echo get_stylesheet_directory_uri(); ?>/clone2/app-gioithieu.js"></script>

    <h1>Clone Area</h1>

    <form method="post" accept-charset="utf-8" id="ajaxform">
        <button type="submit">Send</button>
    </form>
    <button id="excute-list">Clone</button>
    <div id="loading"></div>
    <div class="info"></div>
    <ol id="list-url"></ol>

</div>
</article>
</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
