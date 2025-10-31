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
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>
<style>
	/* * CSS cho bố cục danh sách bài viết mới
 */

	/* Ẩn đường kẻ phân cách mặc định của theme */
	.post-separator {
		display: none;
	}

	/* Thẻ <article> bao bọc mỗi bài viết */
	.post-list-item {
		display: flex;
		/* Sử dụng Flexbox để tạo cột */
		align-items: flex-start;
		/* Căn các cột lên trên cùng */
		background-color: #fdfdfd;
		/* Màu nền trắng xám */
		border: 1px solid #eee;
		/* Đường viền mờ */
		padding: 25px 20px;
		margin-bottom: 25px;
		/* Khoảng cách giữa các bài viết */
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
	}

	/* Cột bên trái: Ngày tháng */
	.post-list-date {
		display: flex;
		flex-direction: column;
		/* Xếp ngày và tháng theo chiều dọc */
		align-items: center;
		justify-content: center;
		padding-right: 20px;
		margin-right: 20px;
		border-right: 1px solid #ddd;
		/* Đường kẻ dọc */
		flex-shrink: 0;
		/* Ngăn cột này bị co lại */
		width: 90px;
		/* Chiều rộng cố định cho cột ngày */
		text-align: center;
		min-height: 80px;
		/* Đảm bảo đường kẻ dọc đủ cao */
	}

	/* Số ngày */
	.post-list-day {
		font-size: 40px;
		/* Cỡ chữ lớn cho ngày */
		font-weight: 600;
		color: #444;
		line-height: 1.1;
	}

	/* Chữ tháng */
	.post-list-month {
		font-size: 13px;
		text-transform: uppercase;
		/* Viết hoa chữ THÁNG */
		color: #888;
		margin-top: 5px;
		font-weight: 500;
	}

	/* Cột bên phải: Tiêu đề và Tóm tắt */
	.post-list-content {
		padding-left: 0;
		flex-grow: 1;
		/* Cho phép cột này lấp đầy phần còn lại */
	}

	/* Tiêu đề bài viết */
	.post-list-title {
		font-size: 20px;
		font-weight: 700;
		margin-top: 0;
		/* Xóa khoảng cách trên cùng */
		margin-bottom: 8px;
		line-height: 1.3;
	}

	/* Link tiêu đề */
	.post-list-title a {
		color: #0073aa;
		/* Màu xanh (bạn có thể đổi màu này) */
		text-decoration: none;
	}

	.post-list-title a:hover {
		text-decoration: underline;
	}

	/* Tóm tắt (excerpt) */
	.post-list-excerpt {
		font-size: 15px;
		color: #555;
		margin: 0;
		line-height: 1.6;
	}
</style>
<main id="site-content">

	<?php

	$archive_title = '';
	$archive_subtitle = '';

	if (is_search()) {
		/**
		 * @global WP_Query $wp_query WordPress Query object.
		 */
		global $wp_query;

		$archive_title = sprintf(
			'%1$s %2$s',
			'<span class="color-accent">' . __('Search:', 'twentytwenty') . '</span>',
			'&ldquo;' . get_search_query() . '&rdquo;'
		);

		if ($wp_query->found_posts) {
			$archive_subtitle = sprintf(
				/* translators: %s: Number of search results. */
				_n(
					'We found %s result for your search.',
					'We found %s results for your search.',
					$wp_query->found_posts,
					'twentytwenty'
				),
				number_format_i18n($wp_query->found_posts)
			);
		} else {
			$archive_subtitle = __('We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty');
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
		</header><?php
	}

	// --- PHẦN QUAN TRỌNG: VÒNG LẶP ĐÃ ĐƯỢC THAY ĐỔI ---
	if (have_posts()) {

		// Vòng lặp bắt đầu
		while (have_posts()) {
			the_post();
			?>

			<article <?php post_class('post-list-item'); ?> id="post-<?php the_ID(); ?>">

				<div class="post-list-date">
					<span class="post-list-day"><?php echo get_the_date('d'); ?></span>
					<span class="post-list-month"><?php echo 'THÁNG ' . get_the_date('m'); ?></span>
				</div>

				<div class="post-list-content">

					<h2 class="post-list-title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>

					<div class="post-list-excerpt">
						<?php
						$content = get_the_excerpt(); // Lấy phần mô tả gốc
						$content = wp_strip_all_tags($content); // Xóa HTML để cắt chuẩn
						$limit = 100; // Giới hạn ký tự
						if (mb_strlen($content) > $limit) {
							$short = mb_substr($content, 0, $limit) . '...';
						} else {
							$short = $content;
						}
						echo esc_html($short);
						?>
					</div>


				</div>

			</article>

			<?php
		} // Kết thúc while
	
	} elseif (is_search()) {
		// Giữ nguyên phần "Không tìm thấy kết quả"
		?>

		<div class="no-search-results-form section-inner thin">

			<?php
			get_search_form(
				array(
					'aria_label' => __('search again', 'twentytwenty'),
				)
			);
			?>

		</div><?php
	}
	// --- KẾT THÚC PHẦN THAY ĐỔI ---
	?>

	<?php get_template_part('template-parts/pagination'); ?>

</main><?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php
get_footer();