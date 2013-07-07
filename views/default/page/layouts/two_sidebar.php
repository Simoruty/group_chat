<?php
/**
 * Elgg 2 sidebar layout
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['content'] The content string for the main column
 * @uses $vars['sidebar'] Optional content that is displayed in the sidebar
 * @uses $vars['sidebar_alt'] Optional content that is displayed in the alternate sidebar
 * @uses $vars['class']   Additional class to apply to layout
 */

$class = 'elgg-layout elgg-layout-two-sidebar clearfix';
if (isset($vars['class'])) {
	$class = "$class {$vars['class']}";
}
?>

<div class="<?php echo $class; ?>">
	<div class="elgg-sidebar">
		<?php echo elgg_view('page/elements/sidebar', $vars); ?>
	</div>
	<div class="elgg-body">
		<div class="elgg-head">
			<?php echo elgg_view('page/elements/title', $vars); ?>
		</div>
		<?php 
			// allow page handlers to override the default header
		?>
		<div class="elgg-sidebar-alt">
			<?php echo elgg_view('page/elements/sidebar_alt', $vars); ?>
<script>

$(document).ready(function(){

	var wh = $(window).height();
	var dH = wh -385;
	$('#gCMd').offset({top:dH});

	$(window).resize(function(){
		var wh = $(window).height();
		
		var dH = wh - 390;

		if(dH < 0)
			$('#gCMd').offset({top:0});
		else
			$('#gCMd').offset({top:dH});
	});
});

	jQuery(function( $ ){

		
		var container = $( "#container" );

		if (container.is( ":visible" )){

			// Hide - slide up.
			container.slideUp( 2000 );

		} else {

			// Show - slide down.
			container.slideDown( 2000 );

		}		
	});
</script>
<div style="position:fixed; bottom:0%; z-index:9999" id="gCMd" >
<?php
	
	elgg_load_js('group_chat_jquery_js');
	$content = '';
	$owner=elgg_get_page_owner_entity();

	if ($owner instanceof ElggGroup) {
		$chatEnable = elgg_get_plugin_user_setting("GroupChat_enabled",$_SESSION['user']->guid,"group_chat") != "false";
		if($chatEnable){
		$content .= elgg_view('group_chat/chat_process_engine', $guid);
		$content .= elgg_view('group_chat/chat_windowPage');
		}		
	}
?>

<div id="container">
		<div id="inner">
			<?php echo $content;?>
		</div>
	</div>
</div>
	

		
		</div>
		<div class="elgg-body elgg-main">
			<?php
				// @todo deprecated so remove in Elgg 2.0
				if (isset($vars['area1'])) {
					echo $vars['area1'];
				}
				if (isset($vars['content'])) {
					echo $vars['content'];
				}
			?>
		</div>
	</div>
</div>