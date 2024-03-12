<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package schoolsite
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	while (have_posts()): the_post();
		get_template_part('template-parts/content', 'page');
	endwhile;
	?>

	<h1>Staff</h1>

	<?php
	$terms = get_terms(
		array(
			'taxonomy' => 'fwd-staff-category',
			'hide_empty' => false,
		)
	);

	if ($terms && !is_wp_error($terms)) {
		foreach ($terms as $term) {
			$args = array(
				'post_type' => 'fwd-staff',
				'posts_per_page' => -1,
				'orderby' => 'title',
				'order' => 'ASC',
				'tax_query' => array(
					array(
						'taxonomy' => 'fwd-staff-category',
						'field' => 'slug',
						'terms' => $term->slug
					),
				),
			);
			$query = new WP_Query($args);

			echo '<section class=""><h2>' . esc_html__($term->name, 'fwd') . '</h2>';

			while ($query->have_posts()) {
				$query->the_post();
				?>
				<article id="<?php echo get_the_ID(); ?>">
					<h2>
						<?php the_title(); ?>
					</h2>
					<?php
					if (function_exists('get_field')) {
						// Check if the 'staff' field exists and display its value if it does
						if (get_field('staff')) {
								the_field('staff'); // Output the value of the 'staff' field
								echo '<br>'; // Add a line break for formatting
						}
						// Check if the 'courses' field exists and display its value if it does
						if (get_field('courses')) {
								the_field('courses'); // Output the value of the 'courses' field
								echo '<br>'; // Add a line break for formatting
						}
						// Get the value of the 'url' field
						$link = get_field('url');
						// Check if the 'url' field has a value and create a link if it does
						if ($link): ?>
								<!-- Output a link with the value of the 'url' field -->
								<a class="button" href="<?php echo esc_url($link); ?>">Instructor Website</a>
						<?php endif;
				}
				
					?>
				</article>
				<?php
			}
			wp_reset_postdata();
		}
	}
	?>
</main><!-- #primary -->

<?php
get_footer();
