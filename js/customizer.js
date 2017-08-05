/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			if( to == '' ) {
				$( '.site-heading hr.small' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-heading hr.small' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
			}
			$( '.site-title a, .headline' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			if( to == '' ) {
				$( '.site-heading hr.small' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-heading hr.small' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
			}
			$( '.subheading' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description, .subheading, .headline, .site-heading hr.small' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description, .subheading, .headline, .site-heading hr.small' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-heading h1, .site-heading .subheading, .intro-header .post-heading, .intro-header .post-heading .meta a' ).css( {
					'color': to
				} );
			}
		} );
	} );

	wp.customize( 'kafal_header_color', function( value ) {
		value.bind( function( to ) {
			$( '#masthead' ).css( 'background-color', to );
		} );
	} );
} )( jQuery );
