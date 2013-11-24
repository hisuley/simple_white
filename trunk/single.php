<?php get_header(); ?>
<a href="/" title="返回首页" class="nav back">返回首页</a>
<div class="page">
	<div class="article">
		<h1 class="title"><?php the_title(); ?></h1>
		<div class="body"><p><b>苏理</b><br><u></u></p>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php the_content('<p>全文 &raquo;</p>'); ?>

			<?php wp_link_pages(array('before' => '<p><strong>页:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			<p>
				<small>
				</small>
			</p>
		
		<!--<blockquote><p><a href="http://creativecommons.org/licenses/by/3.0/deed.zh" target="_blank">版权声明</a>：转载时请以超链接形式标明文章原始出处和作者信息及本声明</p>
		</blockquote>-->
		</div>
		
	</div>
	<div class="tools">
		<?php printLikes(get_the_ID()); ?>
		<div class="share"><span>分享</span>
			<ul class="sns">
				<li><a id="share-sina" href="javascript:window.open('http://v.t.sina.com.cn/share/share.php?title='+encodeURIComponent(document.title.substring(0,76))+'&url='+encodeURIComponent(location.href)+'&rcontent=','_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes'); void 0" title="分享到新浪微博"><img src="http://static.suley.net/blog/images/icon-sns-sina.gif" alt="分享到新浪微博"></a></li>
				<li><a id="share-tencent" href="javascript:void(0);" onclick="window.open('http://v.t.qq.com/share/share.php?title='+encodeURIComponent(document.title.substring(0,76))+'&url='+encodeURIComponent(location.href)+'&rcontent=','_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes'); " title="分享到腾讯微博"><img src="http://static.suley.net/blog/images/icon-sns-qq.gif" alt="分享到腾讯微博"></a></li>
				<li><a id="share-douban" href="javascript:void(function(){var d=document,e=encodeURIComponent,s1=window.getSelection,s2=d.getSelection,s3=d.selection,s=s1?s1():s2?s2():s3?s3.createRange().text:'',r='http://www.douban.com/recommend/?url='+e(d.location.href)+'&title='+e(d.title)+'&sel='+e(s)+'&v=1',x=function(){if(!window.open(r,'douban','toolbar=0,resizable=1,scrollbars=yes,status=1,width=450,height=330'))location.href=r+'&r=1'};if(/Firefox/.test(navigator.userAgent)){setTimeout(x,0)}else{x()}})()" title="分享到豆瓣"><img src="http://static.suley.net/blog/images/icon-sns-douban.gif" alt="分享到豆瓣"></a></li>
				<li><a id="share-twitter" href="http://twitter.com/home?status=Currently reading <?php the_title(); ?>(<?php the_permalink(); ?>)" title="分享到推特"><img src="http://static.suley.net/blog/images/icon-sns-twitter.gif" alt="分享到推特"></a></li>
			</ul>
		</div>
	</div>
</div>
<?php 
if(get_next_post(false,'')){
	?>
	<div class="next">
	<?php next_post_link("%link", '<span class="arrow"></span><span class="text">下一篇</span>', false); ?>
</div>
<?php 
}
if(get_previous_post(false,'')){
	?>
	<div class="prev">
	<?php previous_post_link("%link", '<span class="arrow"></span><span class="text">上一篇</span>', false);?>
</div>
<?php } ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>