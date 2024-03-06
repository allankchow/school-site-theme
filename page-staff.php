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
	while (have_posts()):
		the_post();
		get_template_part('template-parts/content', 'page');

	endwhile; // End of the loop.
		?>

		<?php
		$term = get_terms(
			array(
				'taxonomy' => 'fwd-staff',
				'hide_empty' => false,
			)
		);
		if ($terms && !is_wp_error($term)) {
			foreach ($terms as $term) {
				$args = array(
					'post_type' => 'fwd-staff',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'tax_query' => array(
						array(
							'taxonomy' => 'fwd-staff',
							'fields' => 'slug',
							'terms' => $term
						),
					),
				);
				$query = new WP_Query($args);
				echo '<section class="staff-section"<h2>' . esc_html__($term->name, 'sd') . '</h2>';
				//creating our staff
				while ($query->have_posts()) {
					$query->the_post();
					?>
					<article id="<?php echo get_the_ID() ?>">
						<h2>
							<?php the_title(); ?>
						</h2>
						<?php
						// ACF form validation
						if (function_exists('get_field')) {
							if (get_field('staff')) {
								echo the_field('staff');
							}
						}
						?>
						<?php the_excerpt(); ?>
					</article>
					<?php
				}
				wp_reset_postdata();
			}

		}
		echo "</section>";
	?>

</main>