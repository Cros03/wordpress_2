<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post-custom'); ?>>

    <div class="post-inner">

        <div class="post-header-custom">
            <div class="date-circle">
                <span class="day"><?php echo get_the_date('d'); ?></span>
                <span class="month"><?php echo get_the_date('m'); ?></span>
                <span class="year"><?php echo get_the_date('y'); ?></span>
            </div>

            <h1 class="post-title-custom"><?php the_title(); ?></h1>
        </div>

        <div class="post-content-custom">
            <?php the_content(); ?>
        </div>

    </div>

</article>

