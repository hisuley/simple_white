<?php get_header(); ?>
<a href="/" title="返回首页" class="nav back">返回首页</a>
<div class="page">
	<div class="article">
		<h1 class="title"><?php the_title(); ?></h1>
		<div class="body">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content('<p>全文 &raquo;</p>'); ?>
			<p>
				<small>
				</small>
			</p>
		<?php endwhile; endif; ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>