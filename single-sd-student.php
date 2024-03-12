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

<main id="primary" class="site-main page-student-single">


	<?php
	while (have_posts()) :
		the_post();

	?>
		<!-- Student Name -->
		<header class="entry-header">
			<?php
			echo '<h1 class="entry-title">' . get_the_title() . '</h1>';
			?>
		</header>
		<div class="student-overview">
			<?php
			// Featured Image
			if (has_post_thumbnail()) {
				echo '<div class="post-thumbnail">';
				the_post_thumbnail('medium');
				echo '</div>';
			}

			?>
			<!-- Content -->
			<div class="student-content">
				<?php
				the_content();
				?>
			</div>
		</div>
		<?php
		// Links to other students in their taxonomy term
		$terms = get_the_terms($post->ID, 'sd-student-type');
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
			if (!empty($terms) && !is_wp_error($terms)) {
				// to display the name of the first term
				$term_name = $terms[0]->name;
				echo '<h2>Meet other ' . esc_html($term_name) . ' students:</h2>';

				// new wp query call
				$related_students = new WP_Query($args);

				// if other students exist, output in a list
				if ($related_students->have_posts()) {
					echo '<ul class="related-students">';
					while ($related_students->have_posts()) {
						$related_students->the_post();
						echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
					}
					echo '</ul>';
				}
				wp_reset_postdata(); //exit from wp query so things dont go crazy
			}
		}

		?>
	<?php
	endwhile; // End of the loop.
	?>



</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
