<?php
/**
 * @package ChirayuPlugin
 */
  namespace Inc\Base;

 class SettingLinks
  {
   
    public  function register(){
        add_filter("plugin_action_links_". PLUGIN, array($this, 'settings_link'));
    }

    public function settings_link($links) 
    {
        //  add custom setting link
        $settings_link = '<a href= "admin.php?page=chirayu_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
 }