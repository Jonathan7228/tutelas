<div class="container-fluid contenedor_perfil">


		<input type="checkbox" id="check">
			<label for="check">
			<i class="fas fa-bars" id="btn"><img class="chulo2" src="<?php echo  get_template_directory_uri(); ?>/img/flechaderecha.png"></i>
			<i class="fas fa-times" id="cancel"><img class="chulo1" src="<?php echo  get_template_directory_uri(); ?>/img/flechaizquierda.svg"></i>
			</label>
			<div class="sidebar">
			<header>

						<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
							<?php							
							do_action( 'um_profile_before_header', $args );
							if ( um_is_on_edit_profile() ) { ?>
								<form method="post" action="">
							<?php }
							do_action( 'um_profile_header', $args );
							$classes = apply_filters( 'um_profile_navbar_classes', '' ); ?>
							<div class="um-profile-navbar <?php echo esc_attr( $classes ); ?>">							
								<div class="um-clear"></div>
							</div>
							<?php	
							if ( um_is_on_edit_profile() || UM()->user()->preview ) {
								$nav = 'main';
								$subnav = UM()->profile()->active_subnav();
								$subnav = ! empty( $subnav ) ? $subnav : 'default'; ?>
								<div class="um-profile-body <?php echo esc_attr( $nav . ' ' . $nav . '-' . $subnav ); ?>">
									<div class="clear"></div>
								</div>
								<?php if ( ! UM()->user()->preview ) { ?>
								</form>
								<?php }
							} else {
								$menu_enabled = UM()->options()->get( 'profile_menu' );
								$tabs = UM()->profile()->tabs_active();
								$nav = UM()->profile()->active_tab();
								$subnav = UM()->profile()->active_subnav();
								$subnav = ! empty( $subnav ) ? $subnav : 'default';
								if ( $menu_enabled || ! empty( $tabs[ $nav ]['hidden'] ) ) { ?>
									<div class="um-profile-body <?php echo esc_attr( $nav . ' ' . $nav . '-' . $subnav ); ?>">
										<div class="clear"></div>
									</div>
								<?php }
							}
							do_action( 'um_profile_footer', $args ); ?>		
			</header>

			<div class="items_sidebarmenu">
			
			<h6> <img class="chulo" src="<?php echo  get_template_directory_uri(); ?>/img/house.svg"> Dashboard</h6>
			</div>

		
		</div>
		<sections>
			
		</sections>
</div> 