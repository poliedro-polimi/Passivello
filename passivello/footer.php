<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package activello
 */
?>
				</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
			</div><!-- close .row -->
		</div><!-- close .container -->
	</div><!-- close .site-content -->

	<div id="footer-area">
	    <footer>
	        <div class="container" id="colophon" class="site-footer" role="contentinfo">
	        <?php get_template_part("common", "footer"); ?>
			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
			</div>
	    </footer>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>