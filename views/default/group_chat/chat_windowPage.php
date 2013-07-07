<?php 
global $CONFIG;
$owner=elgg_get_page_owner_entity();
$guid =  elgg_get_logged_in_user_guid();
if($guid > 0){
	$user = elgg_get_logged_in_user_entity();
	$profilePic = $user->getIconURL('tiny');
	if(!strstr($profilePic, 'defaulttiny.gif'))
		$profilePic .= '.jpg';
}
?>
<script type="text/javascript">
		
		<?php
		
		if($guid > 0){ ?>

		var name = "<?php echo ($user->username); ?>";
        var profilePic = '';    
    	
    	// strip tags
    	name = name.replace(/(<([^>]+)>)/ig,"");
    	profilePic = '<?php echo $profilePic; ?>';
    	
    	$("#name-area").html("You are: <span>" + name + "</span>");
    	<?php } ?>
    	
    	$(document).ready(function() {
    		 getStateOfChat(); 			
    		 <?php if ($owner->isMember($user)) { ?>
    		
          $("#sendie").keydown(function(a){var b=a.which;if(b>=33){var c=$(this).attr("maxlength");var d=this.value.length;if(d>=c){a.preventDefault()}}});$("#chat-area li").hover(function(){$(".chatTime").hide();$(this).children(".chatTime").show()});$("#chat-area li").mouseover(function(){$(".chatTime").hide();$(this).children(".chatTime").show()});$("#chat-area li").click(function(){$(".chatTime").hide();$(this).children(".chatTime").show()});$("#sendie").keyup(function(a){if(a.keyCode==13){var b=$(this).val();var c=$(this).attr("maxlength");var d=b.length;if(d<=c+1){sendChat(b,name,profilePic);$(this).val("")}else{$(this).val(b.substring(0,c))}}})
             <?php } ?>
			 updateChat();
             setInterval('updateChat()', 100);
			
		<?php if($guid <=0 ){ ?>
		$('#sendie').attr('disabled','disabled');
		<?php } ?>
		
			$(".miniMize").click(function(){$(".chatWrapper").hide();$(this).hide();$(".maxMize").show();var a=$(window).height();var b=a-30;$("#gCMd").offset({top:b})});$(".maxMize").click(function(){$(".chatWrapper").show();$(this).hide();$(".miniMize").show();var a=$(window).height();var b=a-385;$("#gCMd").offset({top:b})});$(".smileyCon").click(function(){$("#mainCon").show();var a=$(this).attr("data-value");var b=$("#sendie").val();$("#sendie").val(b+" "+a);$("#smileyGroup").hide();$("#sendie").focus()});$("#mainCon").click(function(){$("#mainCon").hide();$("#smileyGroup").show()});$(".closeIcon").click(function(){$("#mainCon").show();$("#smileyGroup").hide()});
    	});  
    	
		function chatCall(a){$(".chatTime").hide();$(a).children(".chatTime").show()}
    </script>
    
<style>
#elggchat_friends{
    margin-right: 328px;
}

.chatbox {
    margin-right: 328px;
}
</style>
<div id="page-wrap">
  <div id="chat-wrap">
    <div class="clear" id="groupTitleChat">
      <div class="floatLeft"><?php echo ucfirst($owner->get('name')); ?> Chat </div>
      <div class="floatRight">
        <div class="floatLeft padRht10 cursor miniMize">[-]</div>
        <div class="floatLeft padRht10 cursor maxMize">[+]</div>
      </div>
    </div>
    <div class="chatWrapper">
      <div class='outSide'>
        <ol id="chat-area">
          <?php echo get_chat_content();?>
        </ol>
      </div>
      <div class="clear sendieDiv">
        <?php 
		if ($owner->isMember($user)) {
		?>
        <div class="floatLeft">
          <form id="send-message-area">
            <textarea id="sendie" maxlength = '100'   ></textarea>
          </form>
        </div>
        <div class="floatRight">
          <div id="smileyGroup">
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/smile.gif" data-value=':)' class="smileyCon" title="Smile"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/frown.gif" data-value=':(' class="smileyCon" title="Frown"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/gasp.gif" data-value=':0' class="smileyCon" title="Gasp"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/angel.gif" data-value='O:-)' class="smileyCon" title="Angel"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/colonthree.gif" data-value=':3' class="smileyCon" title="Colon Three"/></div>
            <div class="clear"></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/confused.gif" data-value='o.O' class="smileyCon" title="Confused"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/cry.gif" data-value=":'(" class="smileyCon" title="Cry"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/devil.gif" data-value='3:-)' class="smileyCon" title="Devil"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/gasp.gif" data-value=':o' class="smileyCon" title="Gasp"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/glasses.gif" data-value='B-)' class="smileyCon" title="Glasses"/></div>
            <div class="clear"></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/grin.gif" data-value=':D' class="smileyCon" title="Grin"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/grumpy.gif" data-value='-.-' class="smileyCon" title="Grumpy"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/kiki.gif" data-value='^_^' class="smileyCon" title="Kiki"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/kiss.gif" data-value=':-*'class="smileyCon" title="Kiss" /></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/pacman.gif" data-value=':v' class="smileyCon" title="Pacman"/></div>
            <div class="clear"></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/squint.gif" data-value='-_-' class="smileyCon" title="Squint"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/sunglasses.gif" data-value='8|' class="smileyCon" title="Sunglasses"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/tongue.gif" data-value=':p' class="smileyCon" title="Tongue"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/unsure.gif" data-value=':-/' class="smileyCon" title="Unsure"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/upset.gif" data-value='-_-' class="smileyCon" title="Upset"/></div>
            <div class="clear"></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/heart.gif" data-value='heart' class="smileyCon" title="Eeart"/></div>
            <div class="floatLeft pad5"><img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/devil.gif" data-value='X)' class="smileyCon" title="Devil"/></div>
            <div class="floatRight pad5"><a class="closeIcon">x</a></div>
            <div class="clear"></div>
          </div>
          <div id="mainCon"> <img src="<?php echo $CONFIG->url; ?>mod/group_chat/graphics/smiley/smile.gif" class="smileyMain" title="Smiley"></div>
        </div>
        <?php }else{
		?>
        <div class="floatLeft joinGroup"><?php echo elgg_echo('group_chat:disabled')?></div>
        <?php 
}?>
        <div class="clear"></div>
      </div>
    </div>
  </div>
  <div id="clear_both"></div>
</div>
