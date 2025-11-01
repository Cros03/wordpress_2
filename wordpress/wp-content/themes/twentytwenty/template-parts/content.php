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
	/* ---- BẮT ĐẦU CSS SỬA LỖI ---- */

.date-circle {
    /* Tạo vòng tròn vàng */
    background-color: #fde24f;
    border-radius: 50%;
    width: 75px;  /* Kích thước vòng tròn */
    height: 75px; /* Kích thước vòng tròn */
    
    /* !! SỬA LỖI QUAN TRỌNG: */
    display: flex;             /* Bắt buộc: Xếp các khối con (wrapper và year) nằm ngang */
    flex-direction: row;       /* Bắt buộc: Hướng là hàng ngang */
    flex-wrap: nowrap;         /* Bắt buộc: Không cho phép "Năm" nhảy xuống dòng */
    
    /* Căn chỉnh */
    justify-content: center;   /* Căn giữa theo chiều ngang */
    align-items: center;       /* Căn giữa theo chiều dọc */
    
    /* Định dạng chung */
    font-weight: bold;
    color: #333;
    padding: 5px;
    box-sizing: border-box;
    overflow: hidden;          /* Ẩn nếu nội dung bị tràn */
}

/* KHỐI 1: Chứa Ngày và Tháng */
.date-circle .day-month-wrapper {
    display: flex;
    flex-direction: column;    /* Xếp Ngày (trên) và Tháng (dưới) theo chiều dọc */
    align-items: center;       /* Căn giữa Ngày và Tháng */
    line-height: 1.1;
    text-align: center;
}

/* Định dạng NGÀY (ở trên) */
.date-circle .day {
    font-size: 1.6em;          /* Điều chỉnh cỡ chữ nhỏ lại một chút */
    position: relative;
    padding-bottom: 2px;       /* Tạo khoảng cách cho gạch ngang */
}

/* Gạch ngang (chỉ dài bằng số ngày) */
.date-circle .day::after {
    content: '';
    position: absolute;
    bottom: 0;                 /* Nằm ngay dưới cùng của Ngày */
    left: 10%;                 /* Bắt đầu từ 10% */
    width: 80%;                /* Gạch ngang dài 80% chữ */
    height: 1px;
    background-color: #333;
}

/* Định dạng THÁNG (ở dưới) */
.date-circle .month {
    font-size: 1.6em;          /* Cùng cỡ chữ với Ngày */
    margin-top: 2px;
}

/* KHỐI 2: Định dạng NĂM (bên phải) */
.date-circle .year {
    font-size: 1.6em;          /* Cùng cỡ chữ với Ngày/Tháng */
    margin-left: 5px;          /* Khoảng cách nhỏ bên trái */
}
/* ---- KẾT THÚC CSS SỬA LỖI ---- */
</style>