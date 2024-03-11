<?php

/**
 * The template for displaying archive pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package schoolsite
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	if (have_posts()) :
		echo '<h1>' . single_term_title('', false) . ' Students</h1>';

		while (have_posts()) : the_post();
			echo '<div class="student">';
			// Title with link to single student page
			echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';

			// Featured image at custom size
			if (has_post_thumbnail()) {
				the_post_thumbnail('student-thumb');
			}

			// Full content
			the_content();

			echo '</div>';
		endwhile;

	else :
		echo '<p>No students found.</p>';
	endif;
	?>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
