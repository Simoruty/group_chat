<?php
/**
 * group_chats for Elgg
 *
 * 	@package group_chat
 *	
 *	@author Simone Rutigliano
 *
 **/

elgg_register_event_handler('init', 'system', 'group_chat_init');

/**
 * Init group_chat plugin.
 */
function group_chat_init() {

	elgg_register_library('elgg:group_chat', elgg_get_plugins_path() . 'group_chat/lib/group_chat.php');
	
	// To Register JS 
	$js_url = 'mod/group_chat/js/jquery.js'; 
	elgg_register_js('group_chat_jquery_js', $js_url);
	
	// Extend the main css view 
	elgg_extend_view('css/elgg', 'group_chat/css');
	
	// Register action
	$action_base = elgg_get_plugins_path() . 'group_chat/actions/group_chat';
	elgg_register_action("group_chat/process","$action_base/process.php", 'public');
		
}

function get_chat_content(){

	$guid = elgg_get_page_owner_guid();
	$days = elgg_get_plugin_setting('group_chat_days', 'group_chat');
	global $CONFIG;
	$fileContent = '';
    $days = ($days)?$days:2;
	for($i=$days;$i>=0;$i--){
	
		$filename = date('mdY', strtotime('-'.$i.' Days')).'.txt';
		$filepath = $CONFIG->dataroot.'/group_chat/'.$guid.'/'.$filename;		
		$content = file_get_contents($filepath);
		if($content)
		$fileContent .= '<li class="dateD" >'.date('D, F d, Y', strtotime('-'.$i.' Days')).'<li>';
	
		$fileContent .= $content;
		
	}
	
	return $fileContent;
	
}
?>
