			</div>
		</section>
		
		<footer class="footer">
			<div class="container">
				<div class="footer__wrap">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<p>© “Артем Бук. Фантастические миры”</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="footer--center">
							<a href="mailto:<?php echo get_theme_mod('mail_textbox'); ?>"><?php echo get_theme_mod('mail_textbox'); ?></a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="footer--soc">
							<a href="<?php echo get_theme_mod('vk_textbox'); ?>"><i class="fa fa-vk"></i></a>
							<a href="<?php echo get_theme_mod('fb_textbox'); ?>"><i class="fa fa-facebook"></i></a>
							<a href="<?php echo get_theme_mod('inst_textbox'); ?>"><i class="fa fa-instagram"></i></a>
							<a href="<?php echo get_theme_mod('tw_textbox'); ?>"><i class="fa fa-twitter"></i></a>
							<a href="<?php echo get_theme_mod('ok_textbox'); ?>"><i class="fa fa-odnoklassniki"></i></a>
						</div>					
					</div>
				</div>				
			</div>
		</footer>	
	</div>
			<script type="text/javascript">
				jQuery(".main-content__item__body h3").pxgradient({ //произвольный селектор jQuery
				step: 1, // размер шага градиента в пикселях. Меньше шаг — больше качество, но меньше производительность
				colors: ['#4e5661', '#707682', '#747a85', '#a2a5b0', '#c9cbd4', '#eeeff0', '#d4d4d5', '#6c6f74', '#41444a', '#313539'], // цвета. формат — hex (#4fc05a или #333)
				dir: "x" // направление градиента. x — горизонтальное, y — вертикальное
				});
			</script>

			<?php wp_footer(); ?>
</body>
</html>