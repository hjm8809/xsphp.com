</section>
<footer class="footer">
    <div class="footer-inner">
        <div class="copyright pull-left">
         Copyright ©2014 by the <a href="<?php echo get_option('home'); ?> " title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>. All Rights Reserved.
<!--百度统计代码==开始==-->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fbc4ffb1a0aa10af47f751a8222eac9c7' type='text/javascript'%3E%3C/script%3E"));
</script>
<!--百度统计代码==结束==-->
        </div>
        <div class="trackcode pull-right">
            <?php if( dopt('d_track_b') ) echo dopt('d_track'); ?>
        </div>
    </div>
</footer>

<?php 
wp_footer(); 
global $dHasShare; 
if($dHasShare == true){ 
	echo'<script>with(document)0[(getElementsByTagName("head")[0]||body).appendChild(createElement("script")).src="http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion="+~(-new Date()/36e5)];</script>';
}  
if( dopt('d_footcode_b') ) echo dopt('d_footcode'); 
?>
</body>
</html>