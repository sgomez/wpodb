<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Page thumbnail and title.
		twentyfourteen_post_thumbnail();
		the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
	?>

	<div class="entry-content">
		<h3>Páginas</h3>  
		    <ul><?php wp_list_pages("title_li=" ); ?></ul>  
		<h3>Feeds</h3>  
		    <ul>  
		        <li><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>">Main RSS</a></li>  
		        <li><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comment Feed</a></li>  
		    </ul>  
		<h3>Categorías</h3>  
		    <ul><?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?></ul>  
		<h3>Todas las entradas:</h3>  
		    <ul><?php $archive_query = new WP_Query('showposts=1000&cat=-8');  
		            while ($archive_query->have_posts()) : $archive_query->the_post(); ?>  
		                <li>  
		                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>  
		                 (<?php comments_number('0', '1', '%'); ?>)  
		                </li>  
		            <?php endwhile; ?>  
		    </ul>  
		   
		<h3>Archivos</h3>  
		    <ul>  
		        <?php wp_get_archives('type=monthly&show_post_count=true'); ?>  
		    </ul>  

		<?php
			
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );

			edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
