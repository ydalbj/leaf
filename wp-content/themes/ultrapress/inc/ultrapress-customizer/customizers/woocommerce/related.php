<?php
$wp_customize->add_setting( 'ultrapress_related_product_heading',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Simple_Notice_Custom_Control( 
		$wp_customize, 'ultrapress_related_product_heading',
		array(
			'label' => esc_html__( 'Related Products', 'ultrapress' ),
			'type' => 'heading',
			'section' => 'ultrapress_shop_related_section',
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_related_product_title',
	array(
		'capability'            => 'edit_theme_options',
		'default'               => __('Related Products','ultrapress'),
		'sanitize_callback'     => 'sanitize_text_field'
	) 
);
$wp_customize->add_control( 'ultrapress_related_product_title', 
	array(
		'label'                 =>  esc_html__( 'Related title', 'ultrapress' ),
		'section'               => 'ultrapress_shop_related_section',
		'type'                  => 'text',
	) 
);
$wp_customize->add_setting( 'ultrapress_related_products_per_page',
	array(
		'capability'            => 'edit_theme_options',
		'default'               => 3,
		'sanitize_callback'     => 'absint'
	) 
);
$wp_customize->add_control( 'ultrapress_related_products_per_page', 
	array(
		'label'                 =>  esc_html__( 'No. of product', 'ultrapress' ),
		'section'               => 'ultrapress_shop_related_section',
		'type'                  => 'number',
	) 
);
$wp_customize->add_setting( 'ultrapress_related_products_column',
	array(
		'capability'            => 'edit_theme_options',
		'default'               => 3,
		'sanitize_callback'     => 'absint'
	) 
);
$wp_customize->add_control( 'ultrapress_related_products_column', 
	array(
		'label'                 =>  esc_html__( 'Column no.', 'ultrapress' ),
		'section'               => 'ultrapress_shop_related_section',
		'type'                  => 'number',
	) 
);