<?php
/**
 * Bookmarks sidebar
 */

echo elgg_view('page/elements/comments_block', array(
	'subtypes' => 'bookmarks',
	'owner_guid' => elgg_get_page_owner_guid(),
));

echo elgg_view('page/elements/tagcloud_block', array(
	'subtypes' => 'bookmarks',
	'owner_guid' => elgg_get_page_owner_guid(),
));
?>

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
	$content .= elgg_view('group_chat/chat_process_engine', $guid);
	$content .= elgg_view('group_chat/chat_windowPage');	
?>

<div id="container">
		<div id="inner">
			<?php echo $content;?>
		</div>
	</div>
</div>
