<?php
////////////////////////////////////////////////////////////////////
// Shortcode Subpage
////////////////////////////////////////////////////////////////////
function vanderweb_accordion_shortcodes_menu() {
	add_submenu_page(
		'edit.php?post_type=vanderweb_accordions',
		__( 'Accordions - Shortcodes', 'vanderweb-accordion' ),
		__( 'Shortcodes', 'vanderweb-accordion' ),
		'manage_options',
		'vanderweb-accordions-shortcodes',
		'vanderweb_accordions_shortcodes'
	);
}
add_action( 'admin_menu', 'vanderweb_accordion_shortcodes_menu' );

function vanderweb_accordions_shortcodes() {
	if ( !current_user_can( 'manage_options' ) )  {
	 wp_die('You do not have sufficient permissions to access this page.');
	}
	//get our global options
	global $developer_uri;
	$terms = get_terms( array( 
		'taxonomy' => 'vanderweb_acc_section',
	) );
	$accordions = '';
	$tabs = '';
	if( !empty( $terms ) && !is_wp_error( $terms )){
		foreach( $terms as $term ) {
			$accordions .= '[vanderweb_accordions slug="'.$term->slug.'"]<br />';
			$tabs .= '[vanderweb_tabs slug="'.$term->slug.'"]<br />';
		}
	}else{
		$accordions = '[vanderweb_accordions slug="your-section-slug"]';
		$tabs = '[vanderweb_tabs slug="your-section-slug"]';
	}
	
	// html
	echo '<h1>'.__( 'Accordions - Shortcodes', 'vanderweb-accordion' ).'</h1>';
	echo '<hr />';
	echo '<h3>'.__( 'Accordions:', 'vanderweb-accordion' ).'</h3>';
	echo '<p>';
	echo $accordions;
	echo '</p>';
	echo '<p><b>'.__( 'Shortcode attributes:', 'vanderweb-accordion' ).'</b></p>';
	echo '<p>slug="<i>your-section-slug</i>"</p>';
	echo '<p>class=""</p>';
	echo '<p>count="50"</p>';
	echo '<p>order="ASC" <br />( ASC, DESC )</p>';
	echo '<p>orderby="menu_order" <br />( none, ID, author, title, name, type, date, modified, parent, rand, menu_order )</p>';
	echo '<p>open="first" <br />( first, all, none )</p>';
	echo '<p>icons="right" <br />( right, left, none )</p>';
	echo '<hr />';
	echo '<h3>'.__( 'Tabs:', 'vanderweb-accordion' ).'</h3>';
	echo '<p>';
	echo $tabs;
	echo '</p>';
	echo '<p><b>'.__( 'Shortcode attributes:', 'vanderweb-accordion' ).'</b></p>';
	echo '<p>slug="<i>your-section-slug</i>"</p>';
	echo '<p>class=""</p>';
	echo '<p>count="50"</p>';
	echo '<p>order="ASC" <br />( ASC, DESC )</p>';
	echo '<p>orderby="menu_order" <br />( none, ID, author, title, name, type, date, modified, parent, rand, menu_order )</p>';
	echo '<br /><hr />';
	echo '<h2>'.__( 'Settings:', 'vanderweb-accordion' ).'</h2>';
	echo '<p>'.__( 'These Shortcodes require that Bootstrap 4 and Font Awesome 4.7 is loaded to work.', 'vanderweb-accordion' ).'</p>';
	echo '<p>'.__( 'If your current theme loads Bootstrap 4 and Font Awesome 4.7, then you dont need to do a thing.', 'vanderweb-accordion' ).'</p>';
	echo '<p>'.__( 'Otherwise go to Customizer and change the settings in the "Vander Web Accordion Settings", to load from this plugin.', 'vanderweb-accordion' ).'</p>';
	echo '<hr />';
	echo '<h3>'.__( 'Status:', 'vanderweb-accordion' ).'</h3>';
	if(get_option('vanderweb_loadbootstrap') == 'true'):
		echo '<p>'.__( '- Bootstrap 4 is loaded from this plugin!', 'vanderweb-accordion' ).'</p>';
	else:
		echo '<p>'.__( '- Bootstrap 4 should be loaded from the current Theme!', 'vanderweb-accordion' ).'</p>';
	endif;
	if(get_option('vanderweb_loadfontawsome') == 'true'):
		echo '<p>'.__( '- Font Awsesome 4.7 is loaded from this plugin!', 'vanderweb-accordion' ).'</p>';
	else:
		echo '<p>'.__( '- Font Awsesome 4.7 should be loaded from the current Theme!', 'vanderweb-accordion' ).'</p>';
	endif;
}

////////////////////////////////////////////////////////////////////
// Customizer
////////////////////////////////////////////////////////////////////
function vanderweb_accordions_customize_register( $wp_customize ) {
    ////////////////////////////////////////////////////////////////////
    // Sidebar Settings
    $wp_customize->add_section( 'vanderweb_accordion_settings' , array(
        'title'      => __( 'Vander Web Accordion Settings', 'vanderweb-accordion' ),
        'priority'   => 30,
    ));
    
    // Load Bootstrap 4
    $wp_customize->add_setting('vanderweb_loadbootstrap', array(
        'default'        => 'false',
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));
    $wp_customize->add_control('vanderweb_loadbootstrap', array(
        'label'    => __('Load Bootstrap 4 from the plugin', 'vanderweb-accordion'),
        'section'  => 'vanderweb_accordion_settings',
        'settings' => 'vanderweb_loadbootstrap',
        'type'     => 'checkbox',
        'type'       => 'radio',
        'choices'    => array(
            'false' => 'No, load Bootstrap 4 from your theme',
            'true' => 'Yes',
        ),
    ));
	
	// Load Font Awsesome 4.7
    $wp_customize->add_setting('vanderweb_loadfontawsome', array(
        'default'        => 'false',
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));
    $wp_customize->add_control('vanderweb_loadfontawsome', array(
        'label'    => __('Load Font Awsesome 4.7 from the plugin', 'vanderweb-accordion'),
        'section'  => 'vanderweb_accordion_settings',
        'settings' => 'vanderweb_loadfontawsome',
        'type'     => 'checkbox',
        'type'       => 'radio',
        'choices'    => array(
            'false' => 'No, load Font Awsesome 4.7 from your theme',
            'true' => 'Yes',
        ),
    ));
}
add_action( 'customize_register', 'vanderweb_accordions_customize_register' );