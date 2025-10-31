<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<style>
		.custom-search-inline {
			display: flex;
			align-items: stretch;
			/* Đảm bảo các mục con kéo dài để lấp đầy chiều cao */
			margin-left: 15px;
		}

		.header-inline-search {
			display: flex;
			gap: 0;
			/* Đảm bảo không có khoảng cách giữa ô tìm kiếm và nút submit */
			border: 1px solid #ddd;
			/* Đặt border bao quanh cả search field và submit */
		}

		.header-inline-search .search-field {
			padding: 5px 10px;
			border: none;
			/* Xóa border của riêng search field */
			outline: none;
			/* Xóa outline khi focus */
		}

		.header-inline-search .search-submit {
			padding: 5px 12px;
			cursor: pointer;
			background-color: #e02863;
			/* Màu hồng đậm cho nút Submit */
			color: white;
			border: none;
			/* Xóa border */
			height: 100%;
			/* Đảm bảo nút kéo dài theo chiều cao của search field */
			display: flex;
			align-items: center;
			justify-content: center;
			/* Loại bỏ khoảng cách gap nếu có */
			margin-left: 0;
		}

		/* CSS MỚI CHO NÚT ACCOUNT */
		.account-toggle-wrapper {
			margin-left: 20px;
			display: flex;
			align-items: center;
			position: relative;
			/* Giúp căn chỉnh biểu tượng mũi tên */
		}

		.account-link {
			display: flex;
			align-items: center;
			text-decoration: none;
			color: #333;
			/* Màu chữ tối hơn, giống trong hình */
			font-size: 14px;
			line-height: 1;
		}

		/* Điều chỉnh biểu tượng để có nền tròn và màu tối */
		.account-icon {
			display: inline-flex;
			margin-right: 5px;
			/* Tạo hình tròn */
			background-color: #555;
			/* Màu nền xám đậm */
			border-radius: 50%;
			width: 26px;
			/* Kích thước hình tròn */
			height: 26px;
			align-items: center;
			justify-content: center;
		}

		/* Đảm bảo SVG (biểu tượng người) có màu trắng để nổi bật trên nền xám */
		.account-icon svg {
			fill: white;
			width: 16px;
			/* Điều chỉnh kích thước biểu tượng */
			height: 16px;
		}

		/* Thêm mũi tên thả xuống (dropdown arrow) bằng cách sử dụng pseudo-element */
		.account-link .toggle-text {
			display: inline-block;
			margin-right: 15px;
			/* Tạo không gian cho mũi tên */
			position: relative;
		}

		.account-link .toggle-text::after {
			content: "";
			position: absolute;
			top: 50%;
			right: -12px;
			width: 0;
			height: 0;
			border-left: 3px solid transparent;
			border-right: 3px solid transparent;
			border-top: 4px solid #333;
			/* Tạo mũi tên trỏ xuống */
			transform: translateY(-50%);
		}

		/* CSS MỚI CHO NÚT HOME (Đã chỉnh sửa) */
		.header-titles-wrapper {
			display: flex;
			/* Đảm bảo các phần tử con (tiêu đề, Home, tìm kiếm) nằm trên cùng một hàng */
			align-items: center;
		}

		.custom-home-button-wrapper {
			/* Đảm bảo nút Home nằm ngay cạnh tiêu đề/logo */
			display: flex;
			align-items: center;
			height: 100%;
			/* Đảm bảo chiều cao phù hợp */
			padding: 0;
		}

		.home-link {
			display: block;
			
			/* Xóa nền: Đặt thành trong suốt */
			color: #333;
			/* Màu chữ */
			text-decoration: none;
			padding: 18px 25px;
			/* Điều chỉnh padding để phù hợp với hình ảnh */
			font-weight: 600;
			line-height: 1;
			height: 100%;
			/* Loại bỏ/giảm khoảng cách lề */
			margin: 0;
			
			/* Xóa đường kẻ phân cách */
			border-left: 1px solid #e0e0e0;
			/* Thêm đường kẻ trái để giống hình mới */
		}

	

		/* Tinh chỉnh header-titles để dịch chuyển logo sát lề */
		.header-titles {
			margin-right: 0;
			/* Xóa lề mặc định nếu có */
		}
	</style>
</head>

<body <?php body_class(); ?>>

	<?php
	wp_body_open();
	?>

	<header id="site-header" class="header-footer-group">

		<div class="header-inner section-inner">

			<div class="header-titles-wrapper">

				<?php

				// Check whether the header search is activated in the customizer.
				$enable_header_search = get_theme_mod('enable_header_search', true);

				if (true === $enable_header_search) {

					?>

					<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal"
						data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field"
						aria-expanded="false">
						<span class="toggle-inner">
							<span class="toggle-icon">
								<?php twentytwenty_the_theme_svg('search'); ?>
							</span>
							<span class="toggle-text"><?php _ex('Search', 'toggle text', 'twentytwenty'); ?></span>
						</span>
					</button><!-- .search-toggle -->

				<?php } ?>

				<div class="header-titles">

					<?php
					// Site title or logo.
					twentytwenty_site_logo();

					// Site description.
					twentytwenty_site_description();
					?>


				</div><!-- .header-titles -->
				<div class="custom-home-button-wrapper">
					<a href="<?php echo esc_url(home_url('/')); ?>" class="home-link">
						<?php echo esc_html_x('Home', 'Home link text', 'twentytwenty'); ?>
					</a>
				</div>
				<!-- a -->
				<div class="custom-search-inline">
					<form role="search" method="get" class="header-inline-search"
						action="<?php echo esc_url(home_url('/')); ?>">
						<input type="search" class="search-field" placeholder="Search"
							value="<?php echo get_search_query(); ?>" name="s" />
						<button type="submit"
							class="search-submit"><?php echo esc_html_x('Submit', 'submit button', 'twentytwenty'); ?></button>
					</form>
				</div>

				<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"
					data-toggle-body-class="showing-menu-modal" aria-expanded="false"
					data-set-focus=".close-nav-toggle">
					<span class="toggle-inner">
						<span class="toggle-icon">
							<?php twentytwenty_the_theme_svg('ellipsis'); ?>
						</span>
						<span class="toggle-text"><?php _e('Menu', 'twentytwenty'); ?></span>
					</span>
				</button><!-- .nav-toggle -->

			</div><!-- .header-titles-wrapper -->

			<div class="header-navigation-wrapper">

				<?php
				if (has_nav_menu('primary') || !has_nav_menu('expanded')) {
					?>

					<nav class="primary-menu-wrapper"
						aria-label="<?php echo esc_attr_x('Horizontal', 'menu', 'twentytwenty'); ?>">

						<ul class="primary-menu reset-list-style">

							<?php
							if (has_nav_menu('primary')) {

								wp_nav_menu(
									array(
										'container' => '',
										'items_wrap' => '%3$s',
										'theme_location' => 'primary',
									)
								);

							} elseif (!has_nav_menu('expanded')) {

								wp_list_pages(
									array(
										'match_menu_classes' => true,
										'show_sub_menu_icons' => true,
										'title_li' => false,
										'walker' => new TwentyTwenty_Walker_Page(),
									)
								);

							}
							?>

						</ul>

					</nav><!-- .primary-menu-wrapper -->

					<?php
				}

				if (true === $enable_header_search || has_nav_menu('expanded')) {
					?>

					<div class="header-toggles hide-no-js">

						<?php
						if (has_nav_menu('expanded')) {
							?>

							<div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">

								<button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal"
									data-toggle-body-class="showing-menu-modal" aria-expanded="false"
									data-set-focus=".close-nav-toggle">
									<span class="toggle-inner">
										<span class="toggle-text"><?php _e('Menu', 'twentytwenty'); ?></span>
										<span class="toggle-icon">
											<?php twentytwenty_the_theme_svg('ellipsis'); ?>
										</span>
									</span>
								</button><!-- .nav-toggle -->

							</div><!-- .nav-toggle-wrapper -->

							<?php
						}

						if (true === $enable_header_search) {
							?>

							<div class="toggle-wrapper search-toggle-wrapper">

								<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal"
									data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field"
									aria-expanded="false">
									<span class="toggle-inner">
										<?php twentytwenty_the_theme_svg('search'); ?>
										<span class="toggle-text"><?php _ex('Search', 'toggle text', 'twentytwenty'); ?></span>
									</span>
								</button><!-- .search-toggle -->

							</div>
							<div class="toggle-wrapper account-toggle-wrapper">
								<a href="<?php echo esc_url(wp_login_url()); ?>" class="account-link">
									<span class="account-icon">
										<?php twentytwenty_the_theme_svg('user'); ?>
									</span>
									<span class="toggle-text"><?php _e('Account', 'twentytwenty'); ?></span>
								</a>
							</div>

							<?php
						}
						?>

					</div><!-- .header-toggles -->
					<?php
				}
				?>

			</div><!-- .header-navigation-wrapper -->

		</div><!-- .header-inner -->

		<?php
		// Output the search modal (if it is activated in the customizer).
		if (true === $enable_header_search) {
			get_template_part('template-parts/modal-search');
		}
		?>

	</header><!-- #site-header -->

	<?php

	// Output the menu modal.
	get_template_part('template-parts/modal-menu');
