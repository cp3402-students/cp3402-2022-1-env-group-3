<?php
/**
 * Education Center Theme Info
 *
 * @package Education_Center
 */
if( ! function_exists( 'education_center_theme_info' ) ) :

function education_center_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info', 
        array(
            'title'    => esc_html__( 'Information Links' , 'education-center' ),
            'priority' => 6,
		)
    );

	/** Important Links */
	$wp_customize->add_setting( 'theme_info_theme',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $theme_info = '<ul>';
    $theme_info .= sprintf( __( '<li>View documentation: %1$sClick here.%2$s</li>', 'education-center' ),  '<a href="' . esc_url( 'https://glthemes.com/documentation/education-center/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>Theme info: %1$sClick here.%2$s</li>', 'education-center' ),  '<a href="' . esc_url( 'https://glthemes.com/wordpress-theme/education-center/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>Support ticket: %1$sClick here.%2$s</li>', 'education-center' ),  '<a href="' . esc_url( 'https://glthemes.com/support/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>More WordPress Themes: %1$sClick here.%2$s</li>', 'education-center' ),  '<a href="' . esc_url( 'https://glthemes.com/wordpress-theme/' ) . '" target="_blank">', '</a>' );
    $theme_info .= '</ul>';

	$wp_customize->add_control( new Education_Center_Note_Control( $wp_customize,
        'theme_info_theme',
            array(
                'label'       => esc_html__( 'Important Links' , 'education-center' ),
                'section'     => 'theme_info',
                'description' => $theme_info
    		)
        )
    );

}
endif;
add_action( 'customize_register', 'education_center_theme_info' );
