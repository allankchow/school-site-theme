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

<main id="primary" class="site-main page-home">

<!-- pull info from block editor -->
<?php
    while (have_posts()) :
        the_post();
        // Display the page content
        the_content();

    endwhile;
?>

<!-- display top news from news section -->
<section class="home-blog">
			<h2>
				<?php esc_html_e('Latest Blog Posts', 'fwd'); ?>
			</h2>
			<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 4
			);
			$blog_query = new WP_Query($args);
			if ($blog_query->have_posts()) {
				while ($blog_query->have_posts()) {
					$blog_query->the_post();
					?>
					<article>
						<h3>
							<a class="feature-image" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
								<?php
								the_post_thumbnail(
									'feature-image'
								);
								?>
							</a>
							<a class="" href="<?php the_permalink() ?>">
								<?php the_title(); ?>
							</a>
						</h3>
					</article>
					<?php
				}
				wp_reset_postdata();
			}
			?>
		</section>
		<a href="<?php echo esc_url( get_permalink( 38 ) ); ?>">See All News</a>
		<?php

	?>

</main>

<?php
get_footer();