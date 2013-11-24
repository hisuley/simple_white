<?php get_header(); ?>
<a href="/" title="返回首页" class="nav back">返回首页</a>
<div class="liked page">
	<div class="article">
		<h1 class="title"><?php printf('「%s」的存档', single_cat_title( '', false ) ); ?></h1>
			<br />
		<p>
			<?php if ( category_description() ) : // Show an optional category description ?>
				<?php echo category_description(); ?>
				<?php endif; ?>
		</p>
		
		 <?php if (have_posts()) : ?>
         <ul>
            <?php while (have_posts()) : the_post(); ?>
            <li><a href="<?php the_permalink() ?>"><span><?php the_title(); ?></span></a></li>
          <?php endwhile; ?>
        </ul>
        

      <?php else : ?>

        <h2 class="center">无觅</h2>
        <p class="center">众里寻他千百度，蓦然回首，那人却在灯火阑珊处.</p>
    
      <?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>