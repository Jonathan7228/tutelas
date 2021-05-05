<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>



<div class="um <?php echo esc_attr( $this->get_class( $mode ) ); ?> um-<?php echo esc_attr( $form_id ); ?>">



	<div class="um-form">



		<form method="post" action="" autocomplete="off">



			<?php

			/**

			 * UM hook

			 *

			 * @type action

			 * @title um_before_form

			 * @description Some actions before login form

			 * @input_vars

			 * [{"var":"$args","type":"array","desc":"Login form shortcode arguments"}]

			 * @change_log

			 * ["Since: 2.0"]

			 * @usage add_action( 'um_before_form', 'function_name', 10, 1 );

			 * @example

			 * <?php

			 * add_action( 'um_before_form', 'my_before_form', 10, 1 );

			 * function my_before_form( $args ) {

			 *     // your code here

			 * }

			 * ?>

			 */

			do_action( 'um_before_form', $args );



			/**

			 * UM hook

			 *

			 * @type action

			 * @title um_before_{$mode}_fields

			 * @description Some actions before login form fields

			 * @input_vars

			 * [{"var":"$args","type":"array","desc":"Login form shortcode arguments"}]

			 * @change_log

			 * ["Since: 2.0"]

			 * @usage add_action( 'um_before_{$mode}_fields', 'function_name', 10, 1 );

			 * @example

			 * <?php

			 * add_action( 'um_before_{$mode}_fields', 'my_before_fields', 10, 1 );

			 * function my_before_form( $args ) {

			 *     // your code here

			 * }

			 * ?>

			 */

			do_action( "um_before_{$mode}_fields", $args );



			/**

			 * UM hook

			 *

			 * @type action

			 * @title um_main_{$mode}_fields

			 * @description Some actions before login form fields

			 * @input_vars

			 * [{"var":"$args","type":"array","desc":"Login form shortcode arguments"}]

			 * @change_log

			 * ["Since: 2.0"]

			 * @usage add_action( 'um_before_{$mode}_fields', 'function_name', 10, 1 );

			 * @example

			 * <?php

			 * add_action( 'um_before_{$mode}_fields', 'my_before_fields', 10, 1 );

			 * function my_before_form( $args ) {

			 *     // your code here

			 * }

			 * ?>

			 */

			do_action( "um_main_{$mode}_fields", $args );



			/**

			 * UM hook

			 *

			 * @type action

			 * @title um_after_form_fields

			 * @description Some actions after login form fields

			 * @input_vars

			 * [{"var":"$args","type":"array","desc":"Login form shortcode arguments"}]

			 * @change_log

			 * ["Since: 2.0"]

			 * @usage add_action( 'um_after_form_fields', 'function_name', 10, 1 );

			 * @example

			 * <?php

			 * add_action( 'um_after_form_fields', 'my_after_form_fields', 10, 1 );

			 * function my_after_form_fields( $args ) {

			 *     // your code here

			 * }

			 * ?>

			 */


		do_action( 'um_profile_header', $args );



		/**

		 * UM hook

		 *

		 * @type filter

		 * @title um_profile_navbar_classes

		 * @description Additional classes for profile navbar

		 * @input_vars

		 * [{"var":"$classes","type":"string","desc":"UM Posts Tab query"}]

		 * @change_log

		 * ["Since: 2.0"]

		 * @usage

		 * <?php add_filter( 'um_profile_navbar_classes', 'function_name', 10, 1 ); ?>

		 * @example

		 * <?php

		 * add_filter( 'um_profile_navbar_classes', 'my_profile_navbar_classes', 10, 1 );

		 * function my_profile_navbar_classes( $classes ) {

		 *     // your code here

		 *     return $classes;

		 * }

		 * ?>

		 */

		$classes = apply_filters( 'um_profile_navbar_classes', '' ); ?>



		<div class="um-profile-navbar <?php echo esc_attr( $classes ); ?>">

			<?php

			/**

			 * UM hook

			 *

			 * @type action

			 * @title um_profile_navbar

			 * @description Profile navigation bar

			 * @input_vars

			 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]

			 * @change_log

			 * ["Since: 2.0"]

			 * @usage add_action( 'um_profile_navbar', 'function_name', 10, 1 );

			 * @example

			 * <?php

			 * add_action( 'um_profile_navbar', 'my_profile_navbar', 10, 1 );

			 * function my_profile_navbar( $args ) {

			 *     // your code here

			 * }

			 * ?>

			 */

			do_action( 'um_profile_navbar', $args ); ?>

			<div class="um-clear"></div>

		</div>

			 
<?php
			 

			do_action( 'um_after_form_fields', $args );



			/**

			 * UM hook

			 *

			 * @type action

			 * @title um_after_{$mode}_fields

			 * @description Some actions after login form fields

			 * @input_vars

			 * [{"var":"$args","type":"array","desc":"Login form shortcode arguments"}]

			 * @change_log

			 * ["Since: 2.0"]

			 * @usage add_action( 'um_after_{$mode}_fields', 'function_name', 10, 1 );

			 * @example

			 * <?php

			 * add_action( 'um_after_{$mode}_fields', 'my_after_form_fields', 10, 1 );

			 * function my_after_form_fields( $args ) {

			 *     // your code here

			 * }

			 * ?>

			 */

			do_action( "um_after_{$mode}_fields", $args );



			/**

			 * UM hook

			 *

			 * @type action

			 * @title um_after_form

			 * @description Some actions after login form fields

			 * @input_vars

			 * [{"var":"$args","type":"array","desc":"Login form shortcode arguments"}]

			 * @change_log

			 * ["Since: 2.0"]

			 * @usage add_action( 'um_after_form', 'function_name', 10, 1 );

			 * @example

			 * <?php

			 * add_action( 'um_after_form', 'my_after_form', 10, 1 );

			 * function my_after_form( $args ) {

			 *     // your code here

			 * }

			 * ?>

			 */

			do_action( 'um_after_form', $args ); ?>



		</form>



	</div>



</div>