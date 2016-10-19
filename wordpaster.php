<?php
/*
Plugin Name: Word图片上传控件
Plugin URI: http://www.ncmem.com
Description: 自动上传Word文档，QQ截图，QQ聊天窗口，剪贴板，第三方客户端应用程序中的图片。
Version: 1.0
Author: 荆门泽优软件有限公司
Author URI: http://www.ncmem.com
*/

/*
Plugin Name: Lei_Tiny Plugin
Plugin URI: http://www.favortt.com
Description: Add Simple button to TinyMCE editor.
Author: Lei zi
Version: 1.0.0
Author URI: http://www.favortt.com
*/

function WordPaster_Plugin()
{
    $plugins = array('wordpaster'); //Add any more plugins you want to load here

	$plugins_array = array();

        //Build the response - the key is the plugin name, value is the URL to the plugin JS
	foreach ($plugins as $plugin ) {
		$plugins_array[ $plugin ] = plugins_url($plugin."/") . '/editor_plugin.js';

	}
        
	return $plugins_array;
}

function WordPaster_init(){
	echo '<link type="text/css" rel="Stylesheet" href="' . WP_PLUGIN_URL . '/WordPaster/css/WordPaster.css"/>';
	echo '<link type="text/css" rel="stylesheet" href="' . WP_PLUGIN_URL . '/WordPaster/css/ui-lightness/jquery-ui-1.8.11.custom.css" />';
    echo '<script type="text/javascript" src="' . WP_PLUGIN_URL . '/WordPaster/js/jquery.min.js" charset="utf-8"></script>';
	echo '<script type="text/javascript" src="' . WP_PLUGIN_URL . '/WordPaster/js/jquery-ui-1.8.11.custom.min.js"></script>';
	echo '<script type="text/javascript" src="' . WP_PLUGIN_URL . '/WordPaster/js/WordPaster.js" charset="utf-8"></script>';
    
	echo '<script language="javascript" type="text/javascript">';
	echo '	var pasterMgr = new PasterManager();';
	echo '	pasterMgr.Load();//load WordPaster';
	echo '	pasterMgr.Init(null);';
	echo '</script>';
}

//测试发现，此钩子只能加载一次。
add_action("admin_print_scripts", "WordPaster_init" );
//测试发现，此钩子只能加载一次。
add_filter('mce_external_plugins',"WordPaster_Plugin");
?>