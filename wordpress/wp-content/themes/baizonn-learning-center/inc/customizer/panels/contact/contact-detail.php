<?php
/**
 * Contact Form Settings
 * 
 * @package Education_Center
 */

function education_center_contact_page_info( $wp_customize ){
    
	$wp_customize->add_section( 'contact_info_section', 
	    array(
	        'title'         => esc_html__( 'Contact Details Section', 'baizonn-learning-center' ),
	        'priority'      => 10,
            'panel'         => 'contact_page_settings',
	    ) 
	);

	 /** Title Text */
    $wp_customize->add_setting( 
        'contact_title', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'contact_title',
        array(
            'section'         => 'contact_info_section',
            'label'           => __( 'Section Title', 'baizonn-learning-center' ),
            'type'            => 'text',
        )   
    );

	$wp_customize->selective_refresh->add_partial( 'contact_title', array(
        'selector'        => '.page-template-contact .contact-wrapper .section-header h2.section-header__title',
        'render_callback' => 'education_center_contact_title',
    ) );

	/** Subtitle Text */
    $wp_customize->add_setting( 
        'contact_subtitle', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'contact_subtitle',
        array(
            'section'         => 'contact_info_section',
            'label'           => __( 'Section Subtitle', 'baizonn-learning-center' ),
            'type'            => 'text',
        )   
    );

	$wp_customize->selective_refresh->add_partial( 'contact_subtitle', array(
        'selector'        => '.page-template-contact .contact-wrapper .section-header span.section-header__info',
        'render_callback' => 'education_center_contact_subtitle',
    ) );

	/** Content Text */
    $wp_customize->add_setting( 
        'contact_content', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'contact_content',
        array(
            'section'         => 'contact_info_section',
            'label'           => __( 'Section Content', 'baizonn-learning-center' ),
            'type'            => 'text',
        )   
    );

	$wp_customize->selective_refresh->add_partial( 'contact_content', array(
        'selector'        => '.page-template-contact .contact-wrapper .section-header p',
        'render_callback' => 'education_center_contact_content',
    ) );

	$wp_customize->add_setting(
		'location_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'location_title',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Location Title', 'baizonn-learning-center' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'location_title', array(
        'selector'        => '.page-template-contact .contact-info .contact-details span.location',
        'render_callback' => 'education_center_contact_location_title',
    ) );

	$wp_customize->add_setting(
		'location',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'location',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Location Description', 'baizonn-learning-center' ),
			'type'              => 'text',
		)
	);

	$wp_customize->add_setting(
		'mail_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'mail_title',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Mail Title', 'baizonn-learning-center' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'mail_title', array(
        'selector'        => '.page-template-contact .contact-info .contact-details span.email',
        'render_callback' => 'education_center_contact_email_title',
    ) );

	$wp_customize->add_setting(
		'mail_description',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'mail_description',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Email Address', 'baizonn-learning-center' ),
			'description'		=> __( 'You can add multiple emails by seperating it with comma. For example: xyz@gmail.com, abc@yahoo.com', 'baizonn-learning-center' ), 
			'type'              => 'text',
		)
	);
       
	$wp_customize->add_setting(
		'phone_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'phone_title',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Phone Us Title', 'baizonn-learning-center' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'phone_title', array(
        'selector'        => '.page-template-contact .contact-info .contact-details span.phone',
        'render_callback' => 'education_center_contact_phone_title',
    ) );

	$wp_customize->add_setting(
		'phone_number',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'phone_number',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Phone Number', 'baizonn-learning-center' ),
			'description'       => __( 'You can add multiple phone number seperating with comma', 'baizonn-learning-center' ),
			'type'              => 'text',
		)
	);
	
	$wp_customize->add_setting(
		'contact_hours',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'contact_hours',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Contact Timing Title', 'baizonn-learning-center' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'contact_hours', array(
        'selector'        => '.page-template-contact .contact-info .contact-details span.timing',
        'render_callback' => 'education_center_contact_contact_hours',
    ) );

	$wp_customize->add_setting(
		'contact_hrs_content',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'contact_hrs_content',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Contact Timing Content', 'baizonn-learning-center' ),
			'description'       => __( 'You can add multiple contact hours seperating with comma. For example: Monday - Friday: 09.00 - 20.00, Sunday & Saturday: 10.30 - 22.30', 'baizonn-learning-center' ),
			'type'              => 'text',
		)
	);
}

add_action( 'customize_register', 'education_center_contact_page_info' );