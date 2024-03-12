<?php

/**
 * The template for displaying archive pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package schoolsite
 */

get_header();
?>

<main id="primary" class="site-main page-student-type-list">
	<?php
	if (have_posts()) :
		echo '<h1>' . single_term_title('', false) . ' Students</h1>';

		while (have_posts()) : the_post();
	?>
			<div class="student">
				<?php
				// Title with link to single student page
				echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
				?>


				<div class='student-overview'>
					<?php
					// Featured image at custom size
					if (has_post_thumbnail()) {
						the_post_thumbnail('student-thumb');
					}
					?>
					<div class='student-content'>
						<?php
						// Full content
						the_content();
						?>
					</div>
				</div>
			</div>
	<?php
		endwhile;

	else :
		echo '<p>No students found.</p>';
	endif;
	?>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
