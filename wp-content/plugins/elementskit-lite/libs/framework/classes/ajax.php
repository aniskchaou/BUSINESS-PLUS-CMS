<?php 
namespace ElementsKit_Lite\Libs\Framework\Classes;

defined( 'ABSPATH' ) || exit;

class Ajax{
    private $utils;

    public function __construct() {
        add_action( 'wp_ajax_ekit_admin_action', [$this, 'elementskit_admin_action'] );
        $this->utils = Utils::instance();
    }
    
    public function elementskit_admin_action() {
        // Check for nonce security      
        if(!wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) ) {
           return;
        }

        if(!current_user_can('manage_options')){
            return;
        }


        if(isset($_POST['widget_list'])){
            $this->utils->save_option('widget_list', empty($_POST['widget_list']) ? [] : $_POST['widget_list']);
        }

        if(isset($_POST['module_list'])){
            $this->utils->save_option('module_list', empty($_POST['module_list']) ? [] : $_POST['module_list']);
        }

        if(isset($_POST['user_data'])){
            $this->utils->save_option('user_data', empty($_POST['user_data']) ? [] : $_POST['user_data']);
        }

        if(isset($_POST['settings'])){
            $this->utils->save_option('settings', empty($_POST['settings']) ? [] : $_POST['settings']);
        }
        
        do_action('elementskit/admin/after_save');

        wp_die(); // this is required to terminate immediately and return a proper response
    }

    public function return_json($data){
        if(is_array($data) || is_object($data)){
            return  json_encode($data);
        }else{
            return $data;
        }
    }

}