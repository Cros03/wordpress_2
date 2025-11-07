<?php
/**
 * Displays the next and previous post navigation in single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$next_post = get_next_post();
$prev_post = get_previous_post();

if ($next_post || $prev_post) {

	$pagination_classes = '';

	if (!$next_post) {
		$pagination_classes = ' only-one only-prev';
	} elseif (!$prev_post) {
		$pagination_classes = ' only-one only-next';
	}
	?>

	<nav class="pagination-single-custom section-inner<?php echo esc_attr($pagination_classes); ?>"
		aria-label="<?php esc_attr_e('Post', 'twentytwenty'); ?>">

		<hr class="styled-separator is-style-wide" aria-hidden="true" />

		<div class="pagination-inner-custom">

			<?php if ($prev_post): ?>
				<a class="previous-post-custom post-link" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">

					<span class="post-date" aria-hidden="true">
						<span class="day"><span
								class="day-inner"><?php echo esc_html(get_the_date('d', $prev_post->ID)); ?></span></span>
						<span class="month"><?php echo esc_html(get_the_date('m', $prev_post->ID)); ?></span>
					</span>

					<span class="post-year" aria-hidden="true">
						<?php echo esc_html(get_the_date('y', $prev_post->ID)); ?>
					</span>

					<span class="divider" aria-hidden="true"></span>

					<span class="meta-right">
						<span class="title"><span
								class="title-inner"><?php echo wp_kses_post(get_the_title($prev_post->ID)); ?></span></span>
					</span>

				</a>
			<?php endif; ?>

			<?php if ($next_post): ?>
				<a class="next-post-custom post-link" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">

					<span class="post-date" aria-hidden="true">
						<span class="day"><span
								class="day-inner"><?php echo esc_html(get_the_date('d', $next_post->ID)); ?></span></span>
						<span class="month"><?php echo esc_html(get_the_date('m', $next_post->ID)); ?></span>
					</span>

					<span class="post-year" aria-hidden="true">
						<?php echo esc_html(get_the_date('y', $next_post->ID)); ?>
					</span>

					<span class="divider" aria-hidden="true"></span>

					<span class="meta-right">
						<span class="title"><span
								class="title-inner"><?php echo wp_kses_post(get_the_title($next_post->ID)); ?></span></span>
					</span>

				</a>
			<?php endif; ?>

		</div>
		<hr class="styled-separator is-style-wide" aria-hidden="true" />

	</nav>
	<?php
}
?>
<style>
	.pagination-single-custom {
		text-align: left;
		margin: 50px auto;
		max-width: 900px;
	}

	.pagination-inner-custom {
		display: flex;
		flex-direction: column;
		/* mỗi liên kết 1 hàng */
		gap: 18px;
	}

	.post-link {
		display: flex;
		align-items: center;
		/* gap: 18px; -- Đã XÓA gap chung */
		font-weight: 500;
		color: #333;
		text-decoration: none;
		transition: color 0.18s ease;
		padding: 8px 0;
		border-bottom: 1px solid transparent;
	}

	/* .post-link:hover {
		color: #0073aa;
	} */

	.post-link:hover {
		color: #0073aa;
		text-decoration: none !important;
		/* Thêm dòng này để BẮT BUỘC không gạch chân */
	}
	/* date block on the left */
	.post-date {
		width: 56px;
		min-width: 56px;
		text-align: center;
		display: flex;
		flex-direction: column;
		justify-content: center;
		color: #2f4f6f;
		line-height: 1;
		gap: 2px;
	}

	.post-date .day {
		font-size: 18px;
		font-weight: 700;
		color: #2f4f6f;
		/* ĐÃ XÓA border-bottom và padding-bottom từ đây */
	}

	/* ĐÃ THÊM: Class này để gạch ngang co lại */
	.post-date .day-inner {
		display: inline-block;
		/* Giúp border co lại theo chữ */
		border-bottom: 1px solid #2f4f6f;
		padding-bottom: 2px;
		/* Nếu muốn gạch dài hơn số 1 chút, bỏ comment 2 dòng dưới
		padding-left: 2px;
		padding-right: 2px;
		*/
	}

	.post-date .month {
		font-size: 18px;
		font-weight: 700;
		color: #2f4f6f;
		margin-top: 0;
	}

	/* Kiểu cho năm (nằm riêng) */
	.post-year {
		font-size: 12px;
		color: #6b7c89;
		font-weight: 600;
	}


	/* vertical divider */
	.divider {
		width: 1px;
		height: 32px;
		/* Gạch dọc ngắn */
		background: #e5e5e5;
		flex-shrink: 0;
		margin-left: 18px;
	}

	/* right area: only the title */
	.meta-right {
		display: flex;
		flex: 1;
		justify-content: center;
		flex-direction: column;
		margin-left: 18px;
	}

	.title {
		font-size: 16px;
		color: #333;
	}

	.pagination-single-custom hr.styled-separator {
		border: none;
		border-top: 1px solid #ddd;
		margin: 18px 0;
	}
</style>