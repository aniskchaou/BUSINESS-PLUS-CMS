<?php
/**
 * Template Kit Import:
 *
 * This starts things up. Registers the SPL and starts up some classes.
 *
 * @package Envato/Envato_Template_Kit_Import
 * @since 0.0.2
 */

namespace Envato_Template_Kit_Import;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Importer registration and management.
 *
 * @since 0.0.2
 */
class Importer extends Base {

	/**
	 * Called when the user wants to import a single template.
	 *
	 * @param $template_kit_id
	 * @param $template_index
	 *
	 * @return array|\WP_Error
	 */
	public function handle_template_import( $template_kit_id, $template_index ) {

		$template_kit = envato_template_kit_import_get_builder( $template_kit_id );

		if ( ! $template_kit ) {
			return new \WP_Error( 'import_error', 'Invalid Template Kit' );
		}

		return $template_kit->import_template( $template_index );
	}

	/**
	 * Called when we want to unpack a ZIP file and install the various parts into WordPress
	 * Returns either the imported Kit ID in the WP database, or a WP Error if something went wrong.
	 *
	 * @param $temporary_zip_file
	 *
	 * @return int|\WP_Error
	 */
	public function unpack_zip_file( $temporary_zip_file ) {
		$wp_upload_dir                  = wp_upload_dir();
		$template_kit_base_path         = $wp_upload_dir['basedir'] . '/template-kits/';
		$template_kit_random_folder     = md5( time() . NONCE_SALT );
		$template_kit_extract_directory = $template_kit_base_path . $template_kit_random_folder;
		wp_mkdir_p( $template_kit_extract_directory );
		// Prevent directory indexing so people cannot find the random template kit ID folders:
		touch( $template_kit_base_path . 'index.php' );

		global $wp_filesystem;

		require_once( ABSPATH . '/wp-admin/includes/file.php' );
		\WP_Filesystem();

		if ( ! $wp_filesystem instanceof \WP_Filesystem_Base ) {
			return new \WP_Error( 'zip_error', 'Failed to initialize WP Filesystem' );
		}

		$unzip_result = unzip_file( $temporary_zip_file, $template_kit_extract_directory );
		if ( $unzip_result !== true ) {
			if ( is_wp_error( $unzip_result ) ) {
				return $unzip_result;
			}

			return new \WP_Error( 'zip_error', 'Failed to unzip zip file' );
		}

		$extracted_zip_files = scandir( $template_kit_extract_directory );
		if ( $extracted_zip_files && is_array( $extracted_zip_files ) ) {
			$file_names = array_diff( $extracted_zip_files, array( '.', '..' ) );
		} else {
			$file_names = array();
		}
		if ( ! $file_names || ! in_array( 'manifest.json', $file_names, true ) ) {
			return new \WP_Error( 'zip_error', 'Please upload a valid Template Kit zip file' );
		}

		// Here we assume we've got a valid template kit extracted to the users hosting account.
		// Time to throw it into the Custom Post Type so that we can proceed to the import step or do other fancy things.

		$manifest_data = json_decode( file_get_contents( $template_kit_extract_directory . '/manifest.json' ), true );
		// todo: validate manifest data structure.

		$post_data = array(
			'post_title'  => $manifest_data['title'],
			'post_type'   => CPT_Kits::get_instance()->cpt_slug,
			'post_status' => 'publish',
		);
		$post_id   = wp_insert_post( $post_data, true );

		if ( $post_id && ! is_wp_error( $post_id ) ) {
			// successfully stored this post. Add some metadata
			update_post_meta( $post_id, 'envato_tk_manifest', $manifest_data );
			update_post_meta( $post_id, 'envato_tk_folder_name', $template_kit_random_folder );
			update_post_meta( $post_id, 'envato_tk_builder', $manifest_data['page_builder'] );

			return $post_id;
		}
		return new \WP_Error( 'zip_error', 'Failed to extract ZIP file' );
	}



}
