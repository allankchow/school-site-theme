<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

	<h1>The Class</h1>

	<?php

	// local functions
	// Custom excerpt length
	function custom_excerpt_length($length)
	{
		return 25;
	}
	add_filter('excerpt_length', 'custom_excerpt_length', 999);

	// Custom excerpt more
	function custom_excerpt_more($more)
	{
		global $post;
		return '... <a href="' . get_permalink($post->ID) . '">Read More about the Student</a>';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');


	$args = array(
		'post_type'      => 'sd-student',
		'posts_per_page' => -1, // To display all students
		'orderby'        => 'title',
		'order'          => 'ASC',
	);

	$query = new WP_Query($args);

	// The Query
	$students_query = new WP_Query($args);

	if ($students_query->have_posts()) {
		echo '<ul class="students-list">';
		while ($students_query->have_posts()) {
			$students_query->the_post();
			echo '<li>';
			// Student Name
			echo '<h2><a href="'. get_permalink() .'">' . get_the_title() . '</a></h2>';

			// Featured Image
			if (has_post_thumbnail()) {
				the_post_thumbnail('student-medium');

				// Excerpt
				the_excerpt();
			}
			// Taxonomy Term
			$terms = get_the_term_list($post->ID, 'sd-student-type', '', ', ');
			if (!is_wp_error($terms) && !empty($terms)) {
				echo '<p>Categories: ' . $terms . '</p>';
			}
			// // Link to single student page
			// echo '<a href="' . get_permalink() . '">View Student Details</a>';
			echo '</li>';
		}
		echo '</ul>';
	} else {
		// No posts found
		echo '<p>No students found.</p>';
	}

	// Restore original Post Data
	wp_reset_postdata();

	// Remove the filters to avoid affecting other parts of the site
	remove_filter('excerpt_length', 'custom_excerpt_length', 999);
	remove_filter('excerpt_more', 'custom_excerpt_more');

	?>
</main><!-- #primary -->

<?php
// get_sidebar();
get_footer();
