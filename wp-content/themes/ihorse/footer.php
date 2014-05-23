<?php
global $wpdb;
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Awesome_App
 * @since Awesome App 1.0
 */
$sqlConditions = $wpdb->get_results("SELECT ID, post_title, post_content, post_name FROM {$wpdb->posts} WHERE post_type='page' AND post_name='terminos-y-condiciones'");
$var_idiom = qtrans_getLanguage();
?>
</div><!-- #page -->
<footer id="colophon" class="footer" role="contentinfo">
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
				<div class="row-fluid">
					<hr class="" />
				</div>
				<div class="copyright">
					Copyrights <?php echo date("Y"); ?>, <a href="<?php echo home_url(); ?>"><?php echo get_home_url(); ?></a>
                    <a href="<?php echo qtrans_use($var_idiom, $sqlConditions[0]->post_name,false); ?>" style="float:right;"><?php echo qtrans_use($var_idiom, $sqlConditions[0]->post_title,false); ?></a>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
<?php wp_footer(); ?>
<script type="text/javascript">
	<?php echo ot_get_option('text_scripts'); ?>
</script>
</body>
</html>