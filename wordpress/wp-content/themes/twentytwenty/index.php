<?php
get_header();
?>

<style>
/* === Layout 3 cột === */
.main-layout {
	display: grid;
	grid-template-columns: 1fr 2fr 1fr; /* 3 cột: Archive - Content - Comments */
	gap: 20px;
	max-width: 1200px;
	margin: 30px auto;
	padding: 0 20px;
}

/* Các phần chính */
.layout-archive {
	background: #f9f9f9;
	border: 1px solid #ddd;
	border-radius: 6px;
	padding: 20px;
}

.layout-content {
	background: #fff;
	border: 1px solid #ddd;
	border-radius: 6px;
	padding: 20px;
}

.layout-comments {
	background: #f9f9f9;
	border: 1px solid #ddd;
	border-radius: 6px;
	padding: 20px;
}

/* === Style cho danh sách bài viết (giữ nguyên code cũ) === */
.post-separator {
	display: none;
}

.post-list-item {
	display: flex;
	align-items: flex-start;
	background-color: #fdfdfd;
	border: 1px solid #eee;
	padding: 25px 20px;
	margin-bottom: 25px;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.post-list-date {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	padding-right: 20px;
	margin-right: 20px;
	border-right: 1px solid #ddd;
	flex-shrink: 0;
	width: 90px;
	text-align: center;
	min-height: 80px;
}

.post-list-day {
	font-size: 40px;
	font-weight: 600;
	color: #444;
	line-height: 1.1;
}

.post-list-month {
	font-size: 13px;
	text-transform: uppercase;
	color: #888;
	margin-top: 5px;
	font-weight: 500;
}

.post-list-content {
	padding-left: 0;
	flex-grow: 1;
}

.post-list-title {
	font-size: 20px;
	font-weight: 700;
	margin-top: 0;
	margin-bottom: 8px;
	line-height: 1.3;
}

.post-list-title a {
	color: #0073aa;
	text-decoration: none;
}

.post-list-title a:hover {
	text-decoration: underline;
}

.post-list-excerpt {
	font-size: 15px;
	color: #555;
	margin: 0;
	line-height: 1.6;
}

.read-more-btn {
	color: #0073aa;
	text-decoration: none;
	font-weight: 600;
}
.read-more-btn:hover {
	text-decoration: underline;
}

/* Responsive */
@media (max-width: 992px) {
	.main-layout {
		grid-template-columns: 1fr;
	}
}
/* Nút "Đọc tiếp" */
.read-more-btn {
    display: inline-block;
    margin-top: 8px;
    padding: 6px 12px;
    background-color: #0073aa; /* màu nền xanh */
    color: #fff; /* chữ trắng */
    border-radius: 4px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s ease;
}

.read-more-btn:hover {
    background-color: #005c87; /* màu xanh đậm hơn khi hover */
    text-decoration: none;
    color: #fff;
}
/* ===== CỘT TRÁI: ARCHIVE ===== */
.layout-archive {
    font-size: 17px; /* tăng cỡ chữ */
    line-height: 1.6;
}

.layout-archive h2 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 10px;
}

/* ===== CỘT PHẢI: COMMENTS ===== */
.layout-comments {
    font-size: 17px; /* tăng cỡ chữ */
    line-height: 1.6;
}

.layout-comments h2 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 10px;
}

.layout-comments ul li {
    margin-bottom: 10px;
    font-size: 16px;
}

.layout-comments a {
    color: #0073aa;
    text-decoration: none;
}

.layout-comments a:hover {
    text-decoration: underline;
    color: #005c87;
}

</style>

<main id="site-content">
	<div class="main-layout">
		<!-- Cột trái: Archive -->
		<aside class="layout-archive">
			<h2>Archive</h2>
			<ul>
				<?php wp_get_archives(array('type' => 'monthly', 'limit' => 6)); ?>
			</ul>
		</aside>

		<!-- Cột giữa: Content (giữ nguyên code cũ của bạn) -->
		<section class="layout-content">
			<?php
			$archive_title = '';
			$archive_subtitle = '';

			if (is_search()) {
				global $wp_query;
				$archive_title = sprintf(
					'%1$s %2$s',
					'<span class="color-accent">' . __('Search:', 'twentytwenty') . '</span>',
					'&ldquo;' . get_search_query() . '&rdquo;'
				);

				if ($wp_query->found_posts) {
					$archive_subtitle = sprintf(
						_n(
							'We found %s result for your search.',
							'We found %s results for your search.',
							$wp_query->found_posts,
							'twentytwenty'
						),
						number_format_i18n($wp_query->found_posts)
					);
				} else {
					$archive_subtitle = __('We could not find any results for your search.', 'twentytwenty');
				}
			} elseif (is_archive() && !have_posts()) {
				$archive_title = __('Nothing Found', 'twentytwenty');
			} elseif (!is_home()) {
				$archive_title = get_the_archive_title();
				$archive_subtitle = get_the_archive_description();
			}

			if ($archive_title || $archive_subtitle) {
				?>
				<header class="archive-header has-text-align-center header-footer-group">
					<div class="archive-header-inner section-inner medium">
						<?php if ($archive_title) { ?>
							<h1 class="archive-title"><?php echo wp_kses_post($archive_title); ?></h1>
						<?php } ?>
						<?php if ($archive_subtitle) { ?>
							<div class="archive-subtitle section-inner thin max-percentage intro-text">
								<?php echo wp_kses_post(wpautop($archive_subtitle)); ?>
							</div>
						<?php } ?>
					</div>
				</header>
				<?php
			}

			if (have_posts()) {
				while (have_posts()) {
					the_post(); ?>
					<article <?php post_class('post-list-item'); ?> id="post-<?php the_ID(); ?>">
						<div class="post-list-date">
							<span class="post-list-day"><?php echo get_the_date('d'); ?></span>
							<span class="post-list-month"><?php echo 'THÁNG ' . get_the_date('m'); ?></span>
						</div>
						<div class="post-list-content">
							<h2 class="post-list-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<div class="post-list-excerpt">
								<?php
								$content = wp_strip_all_tags(get_the_excerpt());
								$limit = 100;
								$short = mb_strlen($content) > $limit ? mb_substr($content, 0, $limit) . '...' : $content;
								echo '<p>' . esc_html($short) . '</p>';
								?>
								<a href="<?php the_permalink(); ?>" class="read-more-btn">Đọc tiếp →</a>
							</div>
						</div>
					</article>
				<?php }
			} elseif (is_search()) { ?>
				<div class="no-search-results-form section-inner thin">
					<?php get_search_form(); ?>
				</div>
			<?php } ?>
			<?php get_template_part('template-parts/pagination'); ?>
		</section>

		<!-- Cột phải: Comments -->
<aside class="layout-comments">
    <h2>Comments</h2>
    <?php
    // Lấy bình luận mới nhất
    $recent_comments = get_comments(array(
        'number' => 6,
        'status' => 'approve',
    ));

    if ($recent_comments) {
        echo '<ul>';
        foreach ($recent_comments as $comment) {
            // Lấy liên kết đến bài viết có bình luận
            $comment_link = get_comment_link($comment);
            $post_title = get_the_title($comment->comment_post_ID);

            echo '<li>';
            echo '<strong>' . esc_html($comment->comment_author) . ':</strong> ';
            echo '<a href="' . esc_url($comment_link) . '" title="' . esc_attr($post_title) . '">';
            echo wp_trim_words($comment->comment_content, 10, '...');
            echo '</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No comments yet.</p>';
    }
    ?>
</aside>

	</div>
</main>

<?php get_template_part('template-parts/footer-menus-widgets'); ?>
<?php get_footer(); ?>
