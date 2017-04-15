<?php if ( has_nav_menu( 'primary' ) ) : // Check if there's a menu assigned to the 'primary' location. ?>

	<nav <?php hybrid_attr( 'menu', 'primary' ); ?>>

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container'       => '',
				'menu_id'         => 'menu-primary-items',
				'menu_class'      => 'menu-items',
				'fallback_cb'     => '',
				'items_wrap'      => '<ul id="%s" class="%s">%s</ul>'
			)
		); ?>
		
		<ul class="user-area">
			<li class="menu-item"><a class="button" href="">Login</a></li>
		</ul>

	</nav><!-- #menu-primary -->

<?php endif; // End check for menu. ?>