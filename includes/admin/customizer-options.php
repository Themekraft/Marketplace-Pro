<?php

// Adding the Marketplace Pro theme options to the theme customizer

function mpro_customizer( $wp_customize ) {
	$wp_customize->add_section(
		'mpro_section_one',
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
			'section' => 'mpro_section_one',
			'type' => 'text',
		)
	);
}
add_action( 'customize_register', 'mpro_customizer' );
