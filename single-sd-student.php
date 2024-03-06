<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package schoolsite
 */

get_header();
?>

<main id="primary" class="site-main">


	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', get_post_type());

	endwhile; // End of the loop.
	?>


	<h2>Meet other Designer students:</h2>

	<!-- previous & next buttons links -->
	<?php
	the_post_navigation(
		array(
			'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'school-site-theme') . '</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'school-site-theme') . '</span> <span class="nav-title">%title</span>',
		)
	);
	?>


</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
