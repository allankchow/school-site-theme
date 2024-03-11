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

		// Student Name
		echo '<header class="entry-header">';
		echo '<h1 class="entry-title">' . get_the_title() . '</h1>';
		echo '</header>';

		// Featured Image
		if (has_post_thumbnail()) {
			echo '<div class="post-thumbnail">';
			the_post_thumbnail('medium');
			echo '</div>';
		}

		// Content
		echo '<div class="entry-content">';
		the_content();
		echo '</div>';

		// Links to other students in their taxonomy term
		$terms = get_the_terms($post->ID, 'sd-field'); // Adjust 'sd-field' to your taxonomy name
		if (!empty($terms) && !is_wp_error($terms)) {
			$term_ids = wp_list_pluck($terms, 'term_id');
			$args = array(
				'post_type'      => 'sd-student',
				'posts_per_page' => -1,
				'post__not_in'   => array($post->ID), // Exclude current post
				'tax_query'      => array(
					array(
						'taxonomy' => 'sd-student-type',
						'field'    => 'term_id',
						'terms'    => $term_ids,
					),
				),
			);
			$related_students = new WP_Query($args);

			if ($related_students->have_posts()) {
				echo '<ul class="related-students">';
				while ($related_students->have_posts()) {
					$related_students->the_post();
					echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
				}
				echo '</ul>';
			}
			wp_reset_postdata();
		}

		echo '</article>';

	endwhile; // End of the loop.
	?>


	<!-- previous & next buttons links -->
	<section>
		<h2>Meet other Designer students:</h2>
		<?php
		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'school-site-theme') . '</span> <span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'school-site-theme') . '</span> <span class="nav-title">%title</span>',
			)
		);
		?>
	</section>


</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
