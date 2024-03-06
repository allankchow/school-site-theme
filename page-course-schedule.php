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
 *
 * @package schoolsite
 */

get_header();
?>

<main id="primary" class="site-main">
	<!-- Title -->
	<?php
	if (!empty(get_field('section_title'))) {
		echo '<h1 class="section-title">' . esc_html(get_field('section_title')) . '</h1>';
	}
	?>

	<!-- intro paragraph -->
	<?php
	if (!empty(get_field('section_intro'))) {
		echo '<p class="section-intro">' . esc_html(get_field('section_intro')) . '</p>';
	}
	?>

	<!-- COURSE SCHEDULE TABLE TITLE -->
	<?php
	if (!empty(get_field('table_title'))) {
		echo '<p class="table-title">' . esc_html(get_field('table_title')) . '</p>';
	}
	?>

	<!-- COURSE SCHEDULE TABLE -->
	<?php if (have_rows('schedule_table')) : ?>
		<table>
			<thead>
				<tr>
					<th>Date</th>
					<th>Course</th>
					<th>Instructor</th>
				</tr>
			</thead>
			<tbody>
				<?php while (have_rows('schedule_table')) : the_row(); ?>
					<tr>
						<td><?php the_sub_field('date'); ?></td>
						<td><?php the_sub_field('course'); ?></td>
						<td><?php the_sub_field('instructor'); ?></td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	<?php else : ?>
		<p>No classes scheduled.</p>
	<?php endif; ?>
</main><!-- #main -->

<?php
get_footer();
