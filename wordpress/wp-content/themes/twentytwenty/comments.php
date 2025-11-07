<?php

/**
 * The template file for displaying the comments and comment form for the
 * Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if (post_password_required()) {
	return;
}

if ($comments) {
?>

	<div class="comments" id="comments">

		<?php
		$comments_number = get_comments_number();
		?>

		<div class="comments-header section-inner small max-percentage">

			<h2 class="comment-reply-title">
				<?php
				if (! have_comments()) {
					_e('Leave a comment', 'twentytwenty');
				} elseif ('1' === $comments_number) {
					/* translators: %s: Post title. */
					printf(_x('One reply on &ldquo;%s&rdquo;', 'comments title', 'twentytwenty'), get_the_title());
				} else {
					printf(
						/* translators: 1: Number of comments, 2: Post title. */
						_nx(
							'%1$s reply on &ldquo;%2$s&rdquo;',
							'%1$s replies on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'twentytwenty'
						),
						number_format_i18n($comments_number),
						get_the_title()
					);
				}

				?>
			</h2><!-- .comments-title -->

		</div><!-- .comments-header -->

		<div class="comments-inner section-inner thin max-percentage">

			<?php
			wp_list_comments(
				array(
					'walker'      => new TwentyTwenty_Walker_Comment(),
					'avatar_size' => 120,
					'style'       => 'div',
				)
			);

			$comment_pagination = paginate_comments_links(
				array(
					'echo'      => false,
					'end_size'  => 0,
					'mid_size'  => 0,
					'next_text' => __('Newer Comments', 'twentytwenty') . ' <span aria-hidden="true">&rarr;</span>',
					'prev_text' => '<span aria-hidden="true">&larr;</span> ' . __('Older Comments', 'twentytwenty'),
				)
			);

			if ($comment_pagination) {
				$pagination_classes = '';

				// If we're only showing the "Next" link, add a class indicating so.
				if (false === strpos($comment_pagination, 'prev page-numbers')) {
					$pagination_classes = ' only-next';
				}
			?>

				<nav class="comments-pagination pagination<?php echo $pagination_classes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output 
															?>" aria-label="<?php esc_attr_e('Comments', 'twentytwenty'); ?>">
					<?php echo wp_kses_post($comment_pagination); ?>
				</nav>

			<?php
			}
			?>

		</div><!-- .comments-inner -->

	</div><!-- comments -->

<?php
}

if (comments_open() || pings_open()) {

	if ($comments) {
		echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
	}

	comment_form(
		array(
			'class_form'         => 'section-inner thin max-percentage post-form-style', // Thêm class để dễ dàng styling
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
			// Định nghĩa lại các trường để chỉ giữ lại comment
			'fields' => array(
				'author' => '', // Ẩn trường Tên
				'email'  => '', // Ẩn trường Email
				'url'    => '', // Ẩn trường URL
				'cookies' => '', // Ẩn tùy chọn lưu cookie
			),
			// Định nghĩa lại trường comment với placeholder
			'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="5" maxlength="65525" required="required" placeholder="What are you thinking..."></textarea></p>',
			// Thay đổi label của nút submit và tiêu đề form
			'label_submit'  => __('share', 'twentytwenty'), // Đổi thành 'share'
			'title_reply'   => __('Make a Post', 'twentytwenty'), // Đổi tiêu đề form
		)
	);
} elseif (is_single()) {

	if ($comments) {
		echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
	}

?>

	<div class="comment-respond" id="respond">

		<p class="comments-closed"><?php _e('Comments are closed.', 'twentytwenty'); ?></p>

	</div><!-- #respond -->

<?php
}
?>
<style>
	/* =================================
   Tùy chỉnh Form (Bản Mockup Word)
   ================================= */

/* ẨN CÁC THÔNG BÁO THỪA */
body #respond .logged-in-as,
body #respond .comment-notes {
    display: none;
}

/* CONTAINER CHÍNH CỦA FORM
 * Đây là NỀN XÁM (Lớp 2)
 */
/* CONTAINER CHÍNH CỦA FORM
 * Đây là NỀN XÁM (Sửa lỗi căn giữa và xóa viền)
 */
/* CONTAINER CHÍNH CỦA FORM
 * Đây là NỀN XÁM (Sửa lỗi xóa viền)
 */
body #respond {
    background-color: #ededed !important;

    /* ĐIỀU CHỈNH: Ép buộc không có viền */
    border: 0 !important;
    /* Đặt về 0px */
    outline: none !important;
    /* Đảm bảo không có outline */
    box-shadow: none !important;
    /* Đảm bảo không có box-shadow */

    border-radius: 6px;
    max-width: 550px;
    width: 100%;
    box-sizing: border-box;
    position: relative;
    padding: 15px 15px 65px 15px !important;

    margin-left: auto !important;
    margin-right: auto !important;
    margin-top: 20px !important;
    margin-bottom: 20px !important;
}

/* TIÊU ĐỀ FORM: 'Make a Post'
 * Đây là TAB MÀU TRẮNG (Lớp 1)
 */
/* TIÊU ĐỀ FORM: 'Make a Post'
 * Đây là TAB MÀU TRẮNG (Lớp 1)
 */
body #respond #reply-title {
    text-align: left;
    font-size: 14px;
    font-weight: bold;
    color: #333;

    background-color: #ffffff !important;

    border: 1px solid #e0e0e0 !important;
    border-bottom: 1px solid #ffffff !important;
    /* "Hàn" màu trắng */

    border-radius: 6px 6px 0 0;
    text-transform: none;

    display: inline-block !important;

    position: relative;
    top: auto;
    padding: 8px 15px;
    z-index: 10;
    /* Nằm trên */

    /* ĐIỀU CHỈNH: Đẩy tab qua phải 15px */
    left: 15px !important;

    margin-left: 0;
    margin-bottom: 0 !important;
}

/* WRAPPER CỦA TEXTAREA */
body #respond .comment-form-comment {
    margin: 0;
    padding: 0 !important;
    /* Bỏ padding */
}

/* KHUNG NHẬP LIỆU CHÍNH
 * Đây là KHUNG CHAT MÀU TRẮNG (Lớp 1)
 */
body #respond textarea#comment {
    width: 100%;
    border: 1px solid #e0e0e0;

    background-color: #ffffff !important;

    border-radius: 4px !important;

    /* Kéo lên 1px để "hàn" vào tab title */
    margin-top: -1px;
    position: relative;
    z-index: 5;
    /* Nằm dưới title */

    /* "Hàn" góc trái-trên */
    /* Reset góc phải-trên */
    border-top-right-radius: 4px !important;

    padding: 10px;
    min-height: 120px;
    box-sizing: border-box;
    font-size: 14px;
    resize: vertical;
    margin-bottom: 0;
}

/* CONTAINER CỦA NÚT SUBMIT
 * Nút "share" nằm trên nền xám
 */
body #respond .form-submit {
    display: block;
    height: auto;
    overflow: visible;
    margin: 0;

    /* Định vị tuyệt đối ở góc phải dưới */
    position: absolute !important;
    bottom: 15px !important;
    right: 15px !important;

    padding: 0 !important;
    text-align: right;
}

/* NÚT SUBMIT: 'share' */
body #respond #submit {
    background-color: #0088ff;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    padding: 8px 25px;
    font-weight: bold;
    font-size: 14px;
    cursor: pointer;
    text-transform: lowercase;

    position: static;
    display: inline-block;
}

body #respond #submit:hover {
    background-color: #0066cc;
}

/* Ẩn khung chat (form) nếu CHƯA đăng nhập */
body:not(.logged-in) #respond {
    display: none;
}
</style>