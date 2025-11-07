<?php
get_header();
?>

<style>
	/* === Layout 3 cột === */
	.main-layout {
		display: grid;
		grid-template-columns: 1fr 2fr 1fr;
		/* 3 cột: Archive - Content - Comments */
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
		background-color: #0073aa;
		/* màu nền xanh */
		color: #fff;
		/* chữ trắng */
		border-radius: 4px;
		text-decoration: none;
		font-weight: 500;
		transition: all 0.2s ease;
	}

	.read-more-btn:hover {
		background-color: #005c87;
		/* màu xanh đậm hơn khi hover */
		text-decoration: none;
		color: #fff;
	}

	/* ===== CỘT TRÁI: ARCHIVE ===== */
	.layout-archive {
		font-size: 17px;
		/* tăng cỡ chữ */
		line-height: 1.6;
	}

	.layout-archive h2 {
		font-size: 20px;
		font-weight: 700;
		margin-bottom: 10px;
	}

	/* ===== CỘT PHẢI: COMMENTS ===== */
	.layout-comments {
		font-size: 17px;
		/* tăng cỡ chữ */
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

	/* --- PHẦN XEM NHIỀU --- */
	.popular-list {
		display: flex;
		flex-direction: column;
		gap: 15px;
		margin-top: 10px;
	}

	.popular-item {
		display: flex;
		align-items: center;
		gap: 10px;
		border-bottom: 1px solid #e5e5e5;
		padding-bottom: 10px;
	}

	.popular-thumb img {
		width: 80px;
		height: 80px;
		object-fit: cover;
		border-radius: 6px;
		transition: transform 0.3s ease;
	}

	.popular-thumb:hover img {
		transform: scale(1.05);
	}

	.popular-content {
		flex: 1;
	}

	.popular-title {
		font-size: 15px;
		line-height: 1.4;
		color: #111;
		text-decoration: none;
		font-weight: 500;
	}

	.popular-title:hover {
		color: #0073aa;
		text-decoration: underline;
	}

	/* 1. KHUNG CHÍNH */
	.recent-comments {
		font-family: "Segoe UI", Arial, sans-serif;
		--avatar-size: 48px;
		--reply-avatar-size: 36px;
		--gap: 12px;
		/* Khoảng cách avatar và nội dung */
		--content-width: calc(100% - var(--avatar-size) - var(--gap));
	}

	/* 2. TIÊU ĐỀ */
	.recent-comments .sidebar-title {
		font-size: 18px;
		font-weight: 600;
		margin-bottom: 12px;
		border-bottom: 2px solid #f2f2f2;
		padding-bottom: 8px;
	}

	/* 3. DANH SÁCH */
	.recent-comments .comment-list {
		list-style: none;
		margin: 0;
		padding: 0;
	}

	/* 4. BÌNH LUẬN GỐC (CHA) */
	.recent-comments li.comment {
		display: flex;
		align-items: flex-start;
		gap: var(--gap);
		padding: 10px 0;
		/* Khoảng cách giữa các bình luận */
		width: 100%;
		box-sizing: border-box;
		position: relative;

		/* Đảm bảo nền trong suốt (không phải hộp xám) */
		background-color: transparent;
		border-top: none;
		border-radius: 0;
		margin: 0;
	}

	.recent-comments li.comment:first-child {
		padding-top: 0;
	}

	/* 5. AVATAR GỐC */
	.recent-comments .comment-avatar {
		flex: 0 0 var(--avatar-size);
		width: var(--avatar-size);
	}

	.recent-comments .comment-avatar img {
		width: var(--avatar-size);
		height: var(--avatar-size);
		object-fit: cover;
		border-radius: 4px;
		/* Bo góc 4px */
	}

	/* 6. BODY (BÊN PHẢI) */
	.recent-comments .comment-body {
		flex: 1;
		max-width: var(--content-width);
		box-sizing: border-box;
	}

	/* 7. HEADER (KHUNG XÁM CHỨA TÊN) */
	.recent-comments .comment-header {
		position: relative;
		background: #efefef;
		/* <-- NỀN XÁM */
		border: 1px solid #d0d0d0;
		/* <-- VIỀN XÁM */
		border-radius: 4px 4px 0 0;
		padding: 8px 12px;
		margin: 0;
		display: flex;
		align-items: center;
		justify-content: space-between;
		gap: 8px;
	}

	/* 8. MŨI NHỌN (TAM GIÁC) */
	.recent-comments .comment-header::before {
		display: block;
		/* Đảm bảo nó hiển thị */
		content: "";
		position: absolute;
		left: -9px;
		top: 10px;
		/* Căn lề 1 chút */
		width: 0;
		height: 0;
		border-top: 8px solid transparent;
		border-bottom: 8px solid transparent;
		border-right: 8px solid #d0d0d0;
		/* Màu viền */
	}

	.recent-comments .comment-header::after {
		display: block;
		/* Đảm bảo nó hiển thị */
		content: "";
		position: absolute;
		left: -8px;
		top: 11px;
		width: 0;
		height: 0;
		border-top: 7px solid transparent;
		border-bottom: 7px solid transparent;
		border-right: 7px solid #efefef;
		/* Màu nền xám */
	}

	/* 9. TÊN TÁC GIẢ */
	.recent-comments .comment-author {
		font-weight: 700;
		font-size: 14px;
		color: #222;
		display: block;
		flex: 1;
		min-width: 0;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}

	/* 10. NỘI DUNG (KHUNG TRẮNG) */
	.recent-comments .comment-content {
		background: #fff;
		/* <-- NỀN TRẮNG */
		border: 1px solid #dcdcdc;
		/* <-- VIỀN */
		border-radius: 0 0 4px 4px;
		padding: 10px 12px;
		color: #6f6f6f;
		font-size: 14px;
		line-height: 1.6;
		margin: 0;
		border-top: none;
	}

	.recent-comments .comment-content a {
		color: inherit;
		text-decoration: none;
	}

	.recent-comments .comment-content a:hover {
		text-decoration: underline;
	}

	/* ==================================== */
	/* --- PHẦN PHẢN HỒI (CON) --- */
	/* ==================================== */

	/* 11. DANH SÁCH PHẢN HỒI (CON) */
	.recent-comments .children {
		list-style: none;
		margin: 10px 0 0 0;
		/* Khoảng cách với bình luận cha */
		padding: 10px 0 0 0;
		border-top: 1px dashed #eee;
		/* Gạch đứt ngăn cách */
	}

	/* 12. MỖI PHẢN HỒI (CON) */
	.recent-comments .children li.comment {
		/* Ghi đè gap cho avatar nhỏ hơn */
		--gap: 10px;
		padding-bottom: 10px;
		padding-top: 0;
	}

	/* 13. AVATAR CON (NHỎ HƠN) */
	.recent-comments .children .comment-avatar {
		--avatar-size: 36px;
	}

	.recent-comments .children .comment-avatar img {
		width: 36px;
		height: 36px;
	}

	/* 14. BODY CON */
	.recent-comments .children .comment-body {
		max-width: calc(100% - var(--reply-avatar-size) - var(--gap));
	}

	/* 15. HEADER/MŨI NHỌN CHO CON */
	.recent-comments .children .comment-header {
		padding: 6px 8px;
		background: #f0f0f0;
		border: 1px solid #d6d6d6;
	}

	.recent-comments .children .comment-header::before {
		left: -8px;
		top: 7px;
		border-top: 7px solid transparent;
		border-bottom: 7px solid transparent;
		border-right: 7px solid #d6d6d6;
	}

	.recent-comments .children .comment-header::after {
		left: -7px;
		top: 8px;
		border-top: 6px solid transparent;
		border-bottom: 6px solid transparent;
		border-right: 6px solid #f0f0f0;
	}

	/* 16. TÊN/NỘI DUNG CON (NHỎ HƠN) */
	.recent-comments .children .comment-author {
		font-size: 14px;
		font-weight: 600;
	}

	.recent-comments .children .comment-content {
		font-size: 14px;
		color: #666;
	}

	/* === BÀI VIẾT MỚI DƯỚI FOOTER === */
	/* 1. KHUNG BỌC NGOÀI */
	.bai-viet-moi-duoi {
		margin-top: 30px;
		padding-top: 20px;
		border-top: 2px solid #eee;
		display: grid;
		grid-template-columns: 1fr 2fr 1fr;
		gap: 20px;
	}

	/* 2. KHỐI CHÍNH GIỮA */
	.bai-viet-moi-duoi .bai-viet-moi-content-wrapper {
		grid-column: 2 / 3;
		display: grid;
		grid-template-columns: 1fr 2fr;
		gap: 25px;
		align-items: baseline;
	}

	/* 3. TIÊU ĐỀ "Bài viết mới nhất" */
	.bai-viet-moi-duoi .sidebar-title {
		font-size: 1.6em;
		/* tăng từ 1.4em lên */
		font-weight: bold;
		color: #222;
		margin-top: 0;
		margin-bottom: 22px;
		width: 100%;
		border-bottom: none;
	}

	/* 4. DANH SÁCH UL */
	.bai-viet-moi-duoi .recent-posts-list {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	/* 5. MỖI MỤC BÀI VIẾT */
	.bai-viet-moi-duoi .news-item {
		position: relative;
		padding-left: 25px;
		margin-bottom: 28px;
	}

	/* 6. CHẤM TRÒN */
	.bai-viet-moi-duoi .news-item::before {
		content: '';
		position: absolute;
		left: 0;
		top: -3px;
		width: 14px;
		height: 14px;
		background-color: #fff;
		border: 3px solid #3498db;
		border-radius: 50%;
		box-sizing: border-box;
		z-index: 1;
	}

	/* ĐƯỜNG NỐI DỌC */
	.news-item::after {
		content: '';
		position: absolute;
		left: 6px;
		top: -15px;
		bottom: -22px;
		width: 2px;
		background-color: #ddd;
		z-index: 0;
	}

	/* 7. HEADER CỦA BÀI VIẾT */
	.bai-viet-moi-duoi .news-header {
		overflow: hidden;
		margin-bottom: 6px;
		line-height: 1.4;
	}

	/* 8. TIÊU ĐỀ BÀI VIẾT */
	.bai-viet-moi-duoi .news-header a {
		text-decoration: none;
		color: #0073aa;
		font-weight: bold;
		font-size: 1.15em;
		/* tăng nhẹ tiêu đề bài viết */
		float: left;
	}

	.bai-viet-moi-duoi .news-header a:hover {
		text-decoration: underline;
	}

	/* 9. NGÀY ĐĂNG */
	.bai-viet-moi-duoi .news-date {
		float: right;
		color: #999;
		font-size: 0.95em;
		padding-top: 3px;
	}

	/* 10. NỘI DUNG RÚT GỌN */
	.bai-viet-moi-duoi .news-excerpt {
		color: #444;
		font-size: 1em;
		/* tăng từ 0.95em lên 1em */
		line-height: 1.7;
		clear: both;
	}

	/* --- PHẦN XEM NHIỀU (kiểu báo điện tử hoàn chỉnh) --- */
	/* --- PHẦN XEM NHIỀU (kiểu báo điện tử hoàn chỉnh) --- */

	/* Tiêu đề "Xem nhiều" */
	.layout-archive h2 {
		font-size: 18px;
		font-weight: bold;
		border-bottom: 3px solid #000;
		/* Dùng 3px để đường kẻ dày hơn */
		display: inline-block;
		padding-bottom: 4px;
		margin-bottom: 0;
		/* Đặt lại margin để liền với lưới */
		margin-top: 0;
		/* Đảm bảo căn chỉnh top */
	}

	/* Khung lưới 2 cột */
	.popular-grid {
		display: grid;
		grid-template-columns: repeat(2, 1fr);
		/* Bắt đầu đường viền ngoài */
		border-left: 1px solid #ddd;
		border-bottom: 1px solid #ddd;
		/* Dùng `margin-top` để tạo khoảng cách giữa tiêu đề và lưới */
		margin-top: 10px;
	}

	/* Mỗi ô tin tức */
	.popular-item {
		display: flex;
		align-items: flex-start;
		gap: 8px;
		padding: 10px 10px;
		/* Tăng padding để giãn nội dung */
		/* Viền phải và viền trên cho mỗi ô */
		border-right: 1px solid #ddd;
		border-top: 1px solid #ddd;
		/* Loại bỏ style cũ (nếu có) */
		border-bottom: none;
	}

	/* Số thứ tự */
	.popular-number {
		font-size: 26px;
		/* Tăng cỡ chữ số cho nổi bật */
		font-weight: bold;
		color: #000;
		width: 28px;
		/* Giữ độ rộng cố định */
		flex-shrink: 0;
		text-align: left;
		/* Căn lề trái theo hình */
		line-height: 1.1;
	}

	/* Tiêu đề */
	.popular-title {
		color: #222;
		font-size: 15px;
		/* Điều chỉnh cỡ chữ cho tiêu đề */
		line-height: 1.4;
		text-decoration: none;
		font-weight: 500;
	}

	.popular-title:hover {
		color: #0073aa;
		text-decoration: underline;
	}

	/* Responsive: gộp 1 cột khi màn hình nhỏ */
	@media (max-width: 768px) {
		.popular-grid {
			grid-template-columns: 1fr;
			border-right: none;
			/* Bỏ viền phải ngoài */
		}

		.popular-item {
			border-left: 1px solid #ddd;
			border-right: 1px solid #ddd;
			/* Thêm lại viền phải cho từng item */
		}
	}

	/* Responsive: gộp 1 cột khi màn hình nhỏ */
	@media (max-width: 768px) {
		.popular-grid {
			grid-template-columns: 1fr;
		}

		.popular-item {
			border-left: none;
		}
	}
</style>

<main id="site-content">
	<div class="main-layout">
		<!-- Cột trái: Xem nhiều -->
		<!-- Cột trái: chỉ hiển thị ở Home và Search -->
		<aside class="layout-archive">

			<?php if (is_search()): ?>
				<!-- 🔹 Khi đang ở trang tìm kiếm -->
				<h2>Trang mới nhất</h2>
				<?php
				$latest_args = array(
					'posts_per_page' => 4,
					'orderby' => 'date',
					'order' => 'DESC',
					'post_status' => 'publish',
					'ignore_sticky_posts' => true,
				);
				$latest_posts = new WP_Query($latest_args);
				?>

				<?php if ($latest_posts->have_posts()): ?>
					<div class="popular-list">
						<?php while ($latest_posts->have_posts()):
							$latest_posts->the_post(); ?>
							<div class="popular-item">
								<a href="<?php the_permalink(); ?>" class="popular-thumb">
									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail('thumbnail'); ?>
									<?php else: ?>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-thumb.jpg"
											alt="<?php the_title_attribute(); ?>">
									<?php endif; ?>
								</a>
								<div class="popular-content">
									<a href="<?php the_permalink(); ?>" class="popular-title"><?php the_title(); ?></a>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata(); ?>
					</div>
				<?php else: ?>
					<p>Không có bài viết mới.</p>
				<?php endif; ?>

			<?php elseif (is_home()): ?>
				<!-- 🔹 Khi ở trang chủ -->
				<h2>Xem nhiều</h2>
				<div class="popular-grid">
					<?php
					$popular_args = array(
						'posts_per_page' => 8,
						'orderby' => 'comment_count',
						'order' => 'DESC',
						'post_status' => 'publish',
						'ignore_sticky_posts' => true,
					);

					$popular_posts = new WP_Query($popular_args);

					if ($popular_posts->have_posts()):
						$i = 1;
						while ($popular_posts->have_posts()):
							$popular_posts->the_post(); ?>
							<div class="popular-item">
								<span class="popular-number"><?php echo $i++; ?></span>
								<a href="<?php the_permalink(); ?>" class="popular-title"><?php the_title(); ?></a>
							</div>
						<?php endwhile;
						wp_reset_postdata();
					else:
						echo '<p>Không có bài viết phổ biến.</p>';
					endif;
					?>
				</div>

			<?php endif; ?>

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
						<!-- 🖼️ Ảnh đại diện bài viết -->
						<div class="post-list-thumb" style="margin-right:20px;">
							<a href="<?php the_permalink(); ?>">
								<?php if (has_post_thumbnail()): ?>
									<?php the_post_thumbnail('medium', ['style' => 'width:180px;height:auto;border-radius:6px;']); ?>
								<?php else: ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-thumb.jpg"
										alt="<?php the_title_attribute(); ?>" style="width:180px;height:auto;border-radius:6px;">
								<?php endif; ?>
							</a>
						</div>
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

		<aside class="cot-phai recent-comments">
			<h3 class="sidebar-title">Bình luận gần đây</h3>
			<?php
			// BƯỚC 1: LẤY 5 BÌNH LUẬN GỐC MỚI NHẤT
			$binh_luan_moi = get_comments(array(
				'number' => 5,
				'status' => 'approve',
				'parent' => 0, // Chỉ lấy bình luận gốc
			));

			if ($binh_luan_moi) {

				echo '<ul class="comment-list">';

				// BƯỚC 2: LẶP QUA TỪNG BÌNH LUẬN GỐC
				foreach ($binh_luan_moi as $bl) {

					$link_binh_luan = get_comment_link($bl->comment_ID);
					$comment_snippet = wp_trim_words($bl->comment_content, 15, '...');

					// 1. Mở thẻ <li> cho bình luận GỐC
					echo '<li class="comment">';

					// 2. Hiển thị Avatar GỐC
					echo '<div class="comment-avatar">';
					echo get_avatar($bl, 48); // 48px
					echo '</div>';

					// 3. Hiển thị Body GỐC
					echo '<div class="comment-body">';

					echo '<div class="comment-header">';
					echo '<span class="comment-author">' . esc_html($bl->comment_author) . '</span>';
					echo '</div>';

					echo '<div class="comment-content">';
					echo '<a href="' . esc_url($link_binh_luan) . '">' . esc_html($comment_snippet) . '</a>';
					echo '</div>';

					// BƯỚC 3: TRUY VẤN VÀ HIỂN THỊ CÁC PHẢN HỒI (CON)
					$args_con = array(
						'parent' => $bl->comment_ID, // Lấy con của bình luận này
						'status' => 'approve',
						'orderby' => 'comment_date',
						'order' => 'ASC' // Hiển thị con từ cũ -> mới
					);
					$binh_luan_con = get_comments($args_con);

					if ($binh_luan_con) {
						// Mở danh sách con
						echo '<ul class="children">';

						foreach ($binh_luan_con as $bl_con) {
							$link_con = get_comment_link($bl_con->comment_ID);
							$snippet_con = wp_trim_words($bl_con->comment_content, 10, '...'); // Trích dẫn con ngắn hơn
			
							// Mở thẻ <li> cho bình luận CON
							echo '<li class="comment">';

							// Avatar CON (nhỏ hơn)
							echo '<div class="comment-avatar">';
							echo get_avatar($bl_con, 36); // 36px
							echo '</div>';

							// Body CON
							echo '<div class="comment-body">';
							echo '<div class="comment-header">';
							echo '<span class="comment-author">' . esc_html($bl_con->comment_author) . '</span>';
							echo '</div>';
							echo '<div class="comment-content">';
							echo '<a href="' . esc_url($link_con) . '">' . esc_html($snippet_con) . '</a>';
							echo '</div>';
							echo '</div>'; // Đóng body con
			
							echo '</li>'; // Đóng <li> con
						}

						echo '</ul>'; // Đóng danh sách con
					}

					// --- KẾT THÚC PHẦN HIỂN THỊ CON ---
			
					echo '</div>'; // Đóng body gốc
					echo '</li>'; // Đóng <li> gốc
				} // Hết vòng lặp foreach gốc
			
				echo '</ul>';
			} else {

				echo '<p>Chưa có bình luận nào.</p>';
			}
			?>
		</aside>

	</div>

</main>
<?php if (is_search()): ?>
	<div class="bai-viet-moi-duoi">
		<div class="bai-viet-moi-content-wrapper">
			<h3 class="sidebar-title">Bài viết mới nhất</h3>
			<ul class="recent-posts-list">
				<?php
				$args_moi_duoi = array(
					'posts_per_page' => 3,
					'ignore_sticky_posts' => 1
				);
				$query_moi_duoi = new WP_Query($args_moi_duoi);

				if ($query_moi_duoi->have_posts()):
					while ($query_moi_duoi->have_posts()):
						$query_moi_duoi->the_post(); ?>
						<li class="news-item">
							<div class="news-header">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<span class="news-date"><?php echo get_the_date('j F, Y'); ?></span>
							</div>
							<div class="news-excerpt">
								<?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?>
							</div>
						</li>
					<?php endwhile;
					wp_reset_postdata();
				else:
					echo '<li>Không có bài viết mới.</li>';
				endif;
				?>
			</ul>
		</div>
	</div>
<?php endif; ?>

<?php get_template_part('template-parts/footer-menus-widgets'); ?>
<?php get_footer(); ?>