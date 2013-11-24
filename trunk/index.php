<?php get_header(); ?>
<div id="liked" class="liked page">
  <div class="article">
    <a href="/about/" class="source">关于</a>
    <h1 style="margin-top: -30px;"><a href="http://suley.net" class="blog-logo">时光纪</a></h1>
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
       <div class="tools">
           <div id="certificate" class="certificate">京ICP备12035213号</div> 
       </div>
    
  </div>

<?php get_footer(); ?>
