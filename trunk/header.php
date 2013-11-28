<?php
// Find out whether it's https or not
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
    || $_SERVER['SERVER_PORT'] == 443) {
    $secure_connection = true;
}else{
	$secure_connection = false;
}
?>
<!DOCTYPE html>
<html lang=en>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title(''); ?><?php if ( !is_home() ) { ?> | <?php } bloginfo('name'); ?><?php if ( !is_home() ) { ?> <?php }else{ ?> | 纪录最细微的幸福和情趣  <?php } ?></title>
	<?php 
function cutstr($string, $length,$charset,$dot) {//字符，截取长度，字符集，结尾符
	if(strlen($string) <= $length) {
		return $string;
	}
	$pre = chr(1);
	$end = chr(1);
	$string = str_replace(array('&','"','<','>'), array($pre.'&'.$end, $pre.'"'.$end, $pre.'<'.$end, $pre.'>'.$end), $string);
	$strcut = '';
	if(strtolower(($charset)) == 'utf-8') {
		$n = $tn = $noc = 0;
		while($n < strlen($string)) {
			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif(194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif(224 <= $t && $t <= 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif(240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif(248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}
			if($noc >= $length) {
				break;
			}
		}
		if($noc > $length) {
			$n -= $tn;
		}
		$strcut = substr($string, 0, $n);
	} else {
		for($i = 0; $i < $length; $i++) {
			$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		}
	}
//还原特殊字符串
	$strcut = str_replace(array($pre.'&'.$end, $pre.'"'.$end, $pre.'<'.$end, $pre.'>'.$end), array('&', '"', '<', '>'), $strcut);
//修复出现特殊字符串截段的问题
	$pos = strrpos($s, chr(1));
	if($pos !== false) {
		$strcut = substr($s,0,$pos);
	}
	return $strcut.$dot;
}
function content() {
	$content = cutstr(strip_tags(get_the_content()), 100, 'utf-8', ' - 时光纪');
	return $content;
}
if(!is_single() && !is_page()){ ?>
<meta name="keywords" content="时光纪,苏理,suley,北京科技大学,金米旅游,北科大,90后,创业,计算机与通信工程学院">
<meta name="description" content="苏理，90后创业者，出过书，登过山，恋过爱，敲过代码，目前任某网站CTO，爱好文学摄影与探险。时光纪，写给自己的情书，记录苏理时光。">
<?php }else{ 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<meta name="description" content="<?php echo content();?>" />
	<?php 
	endwhile; endif; 
} ?>
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<?php if(!$secure_connection){ ?>
<link rel="stylesheet" href="http://static.suley.net/blog/style_mnmlist.css" type="text/css" media="screen, print" />
<script src="http://static.suley.net/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="https://suley.net/static/js/likesScript.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var like_this_ajax_object = {"ajax_url":"http:\/\/suley.net\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script>
<?php }else{ ?>
<link rel="stylesheet" href="https://suley.net/static/style_mnmlist.css" type="text/css" media="screen, print" />
<script src="https://suley.net/static/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="https://suley.net/static/js/likesScript.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var like_this_ajax_object = {"ajax_url":"https:\/\/suley.net\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script>
<?php } ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://suley.net/xmlrpc.php?rsd">
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://suley.net/wp-includes/wlwmanifest.xml">
</head>
<body>