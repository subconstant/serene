<?php

// Carbon fields timber integration
// Based on https://github.com/nlemoine/timber/blob/ba5c261f56762fda20b23302c4c0ac206c60f11e/lib/Integrations/CarbonFields.php

namespace Timber\Integrations;

use Carbon_Fields\Helper\Helper;
use DateTimeImmutable;
use Timber;
use Carbon_Fields\Field\Field;
use Carbon_Fields\Field\Group_Field;

class CarbonFields {

	public function __construct() {
		add_filter('timber/post/pre_meta', array( __CLASS__, 'post_get_meta_field' ), 10, 5);
		add_filter('timber/post/meta_object_field', array( __CLASS__, 'post_meta_object' ), 10, 3);
		add_filter('timber/term/pre_meta', array( __CLASS__, 'term_get_meta_field' ), 10, 5);
		add_filter('timber/user/pre_meta', array( __CLASS__, 'user_get_meta_field' ), 10, 5);
		add_filter('timber/context', array( __CLASS__, 'add_theme_options_to_context' ));
	}

	/**
	 * Gets meta value for a post through Carbon Fields's API.
	 */
	public static function post_get_meta_field( $value, $post_id, $field_name, $post, $args ) {
		$args = wp_parse_args( $args, array(
			'convert_value' => true,
		) );

		$value = carbon_get_post_meta( $post_id, $field_name );

		if ( ! $args['convert_value'] ) {
			return $value;
		}

		$field = Helper::get_field('post_meta', null, $field_name);
		return self::get_converted_meta( $value, $field );
	}

	public static function post_meta_object( $value, $post_id, $field_name ) {
		return Helper::get_field('post_meta', null, $field_name);
	}

	/**
	 * Gets meta value for a term through Carbon Fields's API.
	 */
	public static function term_get_meta_field( $value, $term_id, $field_name, $term, $args ) {
		$args = wp_parse_args( $args, array(
			'convert_value' => true,
		) );

		$value = carbon_get_term_meta( $term_id, $field_name );

		if ( ! $args['convert_value'] ) {
			return $value;
		}

		$field = Helper::get_field('term_meta', null, $field_name);
		return self::get_converted_meta( $value, $field );
	}

	/**
	 * Gets meta value for a user through Carbon Fields's API.
	 */
	public static function user_get_meta_field( $value, $user_id, $field_name, $user, $args ) {
		$args = wp_parse_args( $args, array(
			'convert_value' => true,
		) );

		$value = carbon_get_user_meta( $user_id, $field_name );

		if ( ! $args['convert_value'] ) {
			return $value;
		}

		$field = Helper::get_field('user_meta', null, $field_name);
		return self::get_converted_meta( $value, $field );
	}

	/**
	 * Add Carbon Fields theme options to the Timber context.
	 *
	 * @param array $context The existing context.
	 * @return array Modified context with theme options.
	 */
	public static function add_theme_options_to_context( $context ) {
		// Add theme options to the context
		$context['theme_options'] = array(
			'home_text'  => carbon_get_theme_option('home_text'),
			'site_tagline' => carbon_get_theme_option('site_tagline'),
			// Add more options as needed
		);

		return $context;
	}

	/**
	 * Converts Carbon Fields values to Timber-friendly formats.
	 */
	private static function get_converted_meta( $value, $field ) {
    // Return the value as-is if the field is not defined
    if ( ! $field instanceof Field ) {
        return $value;
    }

    $type = $field->get_type();

    // Return the value if it's not a special type that requires conversion
    if ( ! in_array( $type, [ 'image', 'file', 'date', 'date_time', 'time', 'media_gallery', 'complex' ] ) ) {
        return $value;
    }

    switch ( $type ) {
        case 'image':
        case 'file':
            return Timber::get_post( $value );
            break;
        case 'media_gallery':
            return array_map( function( $attachment_id ) {
                return Timber::get_post( $attachment_id );
            }, $value );
            break;
        case 'date':
        case 'date_time':
        case 'time':
            return DateTimeImmutable::createFromFormat( $field->get_storage_format(), $value );
            break;
        case 'complex':
            $fields = $field->get_fields();
            foreach ( $value as $group_index => $field_group ) {
                foreach ( $field_group as $field_name => $field_value ) {
                    if ( $field_name === '_type' ) {
                        continue;
                    }
                    foreach ( $fields as $field ) {
                        if ( ! $field instanceof Field ) {
                            continue;
                        }
                        if ( $field->get_base_name() !== $field_name ) {
                            continue;
                        }
                        $value[ $group_index ][ $field_name ] = self::get_converted_meta( $field_value, $field );
                    }
                }
            }
            return $value;
            break;
    }

    return $value;
}

}
