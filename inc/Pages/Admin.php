<?php
/**
 * @package ChirayuPlugin
 */
  namespace Inc\Pages;


  use \Inc\Api\SettingsApi;
  use \Inc\Base\BaseController;
  use \Inc\Api\Callbacks\AdminCallbacks;
  


 class Admin extends BaseController
  {

    public $settings;

    public $callbacks;

    public $pages= array();

    public $subpages= array();


    public function register() 
    {
      $this->settings = new SettingsApi();

      $this->callbacks = new AdminCallbacks();

      $this->setPages();

      $this->setSubPages();

      $this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages($this->subpages)->register();

    }

    public function setPages() 
    {
      $this->pages = array(
        array(
          'page_title' => 'Chirayu Plugin', 
          'menu_title' => 'Chirayu', 
          'capability'=> 'manage_options', 
          'menu_slug' => 'chirayu_plugin', 
          'callback' => array( $this->callbacks,'adminDashboard'), 
          'icon_url' => 'dashicons-dashboard',
          'position' =>  110
        ),
        );
    }
    public function setSubPages() 
    {
      $this->subpages = array(
        array(
          'parent_slug' => 'chirayu_plugin', 
          'page_title' => 'Custom Post Type', 
          'menu_title' => 'History', 
          'capability'=> 'manage_options', 
          'menu_slug' => 'chirayu_cpt', 
          'callback' => function() {echo '<h1>CPT Manager</h1>'; }, 
        ),
        array(
          'parent_slug' => 'chirayu_plugin', 
          'page_title' => 'Custom Taxonomies', 
          'menu_title' => 'Launches', 
          'capability'=> 'manage_options', 
          'menu_slug' => 'chirayu_taxanomies', 
          'callback' => function() {echo '<h1>Taxonomies Manager</h1>'; }, 
        ),
        array(
          'parent_slug' => 'chirayu_plugin', 
          'page_title' => 'Custom Widgets', 
          'menu_title' => 'Widgets', 
          'capability'=> 'manage_options', 
          'menu_slug' => 'chirayu_widgets', 
          'callback' => function() {echo '<h1>Widget Manager</h1>'; }, 
        ),
        );
    }
 }