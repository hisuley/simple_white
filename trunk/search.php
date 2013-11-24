<?php get_header(); ?>
<a href="/" title="返回首页" class="nav back">返回首页</a>
<div class="liked page">
	<div class="article">
		<h1 class="title"><?php printf('搜索「%s」的结果', get_search_query() ); ?></h1>
			<br />
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