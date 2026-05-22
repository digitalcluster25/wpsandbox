<?php

	class OhioExtraFilter {

		/**
		* String filtering
		*/
		static public function string( $string, $filter_type = 'string', $default = false ) {
			$filter_result = $default;
			$string = wp_check_invalid_utf8( trim( $string ) );
			switch ( $filter_type ) {
				case 'attr':
					$string = esc_attr( $string );
					break;
				case 'url':
					$string = esc_url( urldecode( $string ) );
					break;
			}
			if ( !empty( $string ) || $string === '0' ) {
				$filter_result = $string;
			}
			return $filter_result;
		}

		/**
		* Boolean filtering
		*/
		static public function boolean( $value, $default = NULL ) {
			if ( $default !== NULL && $value === NULL ) {
				$value = $default;
			}
			return (bool) $value;
		}

		/**
		* Heading tag filtering
		*/
		static public function headingTag( $tag, $default = 'h3' ) {
			$allowed_tags = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );
			if ( in_array( $tag, $allowed_tags ) ) {
				return $tag;
			}
			return $default;
		}
	}
