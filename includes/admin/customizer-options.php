<?php

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function mp_procustomizer( $wp_customize ) {
	$wp_customize->add_section(
		'mp_prosection_one',
		array(
			'title' => 'Konrad Settings',
			'description' => 'This is a settings section.',
			'priority' => 35,
		)
	);
	$wp_customize->add_setting(
		'konrad_textbox',
		array(
			'default' => 'Hallo Konrad',
		)
	);
	$wp_customize->add_control(
		'konrad_textbox',
		array(
			'label' => 'Hallo Konrad',
			'section' => 'mp_prosection_one',
			'type' => 'text',
		)
	);
}
add_action( 'customize_register', 'mp_procustomizer' );