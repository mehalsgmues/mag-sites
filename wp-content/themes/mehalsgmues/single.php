<?php
/**
 * This template displays single post content.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">
		
			<!-- BEGIN .sixteen columns -->
			<div class="<? echo(is_active_sidebar( 'sidebar-blog' )? 'eleven' : 'sixteen') ?> columns">
			
				<!-- BEGIN .post-area -->
				<div class="post-area<? echo(is_active_sidebar( 'sidebar-blog' )? '' : ' no-sidebar') ?>">
				
					<div class="article-category"><?php the_category(' | '); ?></div>
					
					<!-- BEGIN .post-meta -->
					<div class="post-meta">
					
						<!-- BEGIN .post-date -->
						<div class="post-date">

							<!-- Date -->
							<p><?php portfolio_lite_posted_on(); ?></p>

						<!-- END .post-date -->
						</div>

					<!-- END .post-meta -->
					</div>
					
					<h1 class="headline"><?php the_title(); ?></h1>

					<?php get_template_part( 'content/loop', 'post' ); ?>

				<!-- END .post-area -->
				</div>
				
			<!-- END .eleven/sixteen columns -->
			</div>
			
			<?php if ( is_active_sidebar( 'sidebar-blog' ) ) { ?>
			
				<!-- BEGIN .five columns -->
				<div class="five columns">
	
					<?php get_sidebar('blog'); ?>
	
				<!-- END .five columns -->
				</div>

			<?php } ?>
		
		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
