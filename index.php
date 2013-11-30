<?php get_header(); ?>

<section id="content" class="container">
	
	<div id="inner-content" class=" row wrap clearfix">
		
		<div id="main" class="eightcol first clearfix" role="main">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
				<?php if ( ! is_page() || is_home() ) { ?>
				<header class="article-header">
					
					<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<p class="byline vcard"><?php
						printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
					?></p>
					
				</header>
				<?php } ?>
				
				<section class="entry-content clearfix">
					
					<?php the_content(); ?>
					
				</section>
				
				<footer class="article-footer">
					
					<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>
				</footer>
				
				<?php // comments_template(); // uncomment if you want to use them ?>
				
			</article>

			<?php endwhile; ?>
			
			<?php
			if ( function_exists( 'bones_page_navi' ) ) { 
				bones_page_navi(); 
			 } else { 
			?>
			<nav class="wp-prev-next">
				
				<ul class="clearfix">
					
					<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
					<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
					
				</ul>
				
			</nav>
			
			<?php 
			} // bones_page_navi
			?>

			<?php else : // no se encontro la entrada ?>
			
			<article id="post-not-found" class="hentry clearfix">
				<header class="article-header">
					<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
				</header>
				<section class="entry-content">
					<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
				</section>
				<footer class="article-footer">
					<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
				</footer>
			</article>
				
			<?php endif; ?>
							
		</div>
						
		<?php //get_sidebar(); ?>
						
	</div>
				
</section>

<?php get_footer(); ?>
