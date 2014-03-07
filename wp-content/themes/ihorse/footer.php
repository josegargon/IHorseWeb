<?php
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
                    <a href="<?php echo home_url() . '/terminos-y-condiciones/'; ?>" style="float:right;">Términos y condiciones</a>
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