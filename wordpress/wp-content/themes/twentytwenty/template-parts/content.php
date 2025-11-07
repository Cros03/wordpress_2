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
                
                <div class="day-month-wrapper">
                    <span class="day"><?php echo get_the_date('d'); ?></span>
                    <span class="month"><?php echo get_the_date('m'); ?></span>
                </div>
                
                <span class="year"><?php echo get_the_date('y'); ?></span>
                
            </div>
            
            <h1 class="post-title-custom"><?php the_title(); ?></h1>
        </div>

        <div class="post-content-custom">
            <?php the_content(); ?>
        </div>

    </div>
    
</article>

<div class="section-inner">
    <?php
    wp_link_pages(
        array(
            'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
            'after'       => '</nav>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
        )
    );

    edit_post_link();

    // Single bottom post meta.
    twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

    if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

        get_template_part( 'template-parts/entry-author-bio' );

    }
    ?>

</div><?php

if ( is_single() ) {

    get_template_part( 'template-parts/navigation' );

}

/*
 * Output comments wrapper if it's a post, or if comments are open,
 * or if there's a comment number – and check for password.
 */
if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
    ?>

    <div class="comments-wrapper section-inner">

        <?php comments_template(); ?>

    </div><?php
}
?>

<style>
    /* CENTER MAIN CONTENT */
    .post-inner {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 20px;
        box-sizing: border-box;
    }

    /* header: title trái, vòng ngày nằm phải */
    .post-header-custom {
        display: flex;
        align-items: center;
        gap: 18px;
        width: 100%;
    }

    /* title chiếm không gian còn lại, giữ kích thước hợp lý */
    .post-title-custom {
        margin: 0;
        font-size: 1.8rem; /* ↑ tăng kích thước tiêu đề */
        font-weight: 700;
        flex: 1 1 auto;
        text-align: left;
    }

    /* vòng ngày (bên phải) - to và nổi bật */
    .date-circle {
        background-color: #fde24f;
        border-radius: 50%;
        width: 76px;  /* ↓ thu nhỏ */
        height: 76px; /* ↓ thu nhỏ */
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: #222;
        padding: 6px;
        box-sizing: border-box;
        overflow: hidden;
        order: 2;
        margin-left: auto;
    }

    /* KHỐI: Chứa Ngày và Tháng (theo cột) */
    .date-circle .day-month-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        line-height: 1;
        text-align: center;
    }

    .date-circle .day {
        font-size: 28px; /* ↓ nhỏ hơn để cân đối vòng tròn */
        position: relative;
        padding-bottom: 4px;
    }

    .date-circle .day::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 8%;
        width: 84%;
        height: 2px;
        background-color: #222;
    }

    .date-circle .month {
        font-size: 14px;
        margin-top: 4px;
    }

    .date-circle .year {
        font-size: 12px;
        margin-left: 4px;
        opacity: 0.9;
    }

    /* nội dung bài viết giữ kích thước chuẩn */
    .post-content-custom {
        margin-top: 18px;
        font-size: 16px;
        line-height: 1.6;
        color: #333;
    }

    /* Responsive: nếu màn nhỏ, đặt date-circle cạnh tiêu đề hoặc thu nhỏ */
    @media (max-width: 600px) {
        .post-header-custom {
            flex-wrap: wrap;
        }
        .post-title-custom {
            flex-basis: 100%;
            font-size: 1.4rem;
            margin-bottom: 8px;
        }
        .date-circle {
            width: 64px;
            height: 64px;
            padding: 5px;
            margin-left: 0;
        }
        .date-circle .day {
            font-size: 22px;
        }
        .date-circle .month,
        .date-circle .year {
            font-size: 11px;
        }
        .post-content-custom {
            font-size: 15px;
        }
    }
</style>
