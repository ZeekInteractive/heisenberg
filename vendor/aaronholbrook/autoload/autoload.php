<?php
/**
 * Automatically load all PHP files in the directory specified. Recursively.
 *
 * @author Aaron Holbrook
 * @date   3.18.2015
 */

namespace AaronHolbrook\Autoload;

if ( ! function_exists( 'AaronHolbrook\Autoload\autoload' ) ) :

	/**
	 * Recursively loads all php files in all subdirectories of the given path
	 *
	 * @param $directory
	 */
	function autoload( $directory ) {

		// Get a listing of the current directory
		$scanned_dir = scandir( $directory );

		if ( empty( $scanned_dir ) ) {
			return;
		}

		// Ignore these items from scandir
		$ignore = array( '.', '..' );

		// Remove the ignored items
		$scanned_dir = array_diff( $scanned_dir, $ignore );

		foreach ( $scanned_dir as $item ) {

			$filename = $directory . '/' . $item;

			$filetype = filetype( $filename );

			// If it's a directory then recursively load it
			if ( 'dir' === $filetype ) {

				autoload( $filename );
			}

			// If it's a file, let's try to load it
			else if ( 'file' === $filetype ) {

				$pathinfo = pathinfo( $filename );

				// An empty filename wouldn't be a good idea
				if ( empty( $pathinfo['filename'] ) ) {
					continue;
				}

				// Sorry, need an extension
				if ( empty( $pathinfo['extension'] ) ) {
					continue;
				}
				
				// Actually, we want just a PHP extension!
				if ( 'php' !== $pathinfo['extension'] ) {
					continue;
				}
				
				// Only for files that really exist
				if ( true !== file_exists( $filename ) ) {
					continue;
				}

				require_once( $filename );
			}
		}
	}

endif;