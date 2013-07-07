<table>
	<tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td><?php echo elgg_echo('group_chat:enabled'); ?></td>
        <td>
            &nbsp; &nbsp; &nbsp;
        </td>
        <?php $GroupChat_enabledCtl=elgg_get_plugin_user_setting("GroupChat_enabled",$_SESSION['user']->guid,"group_chat") != "false"; ?>
        <td>
            <?php echo elgg_echo('option:yes'); ?><input type="radio" name="params[GroupChat_enabled]" value="true" <?php if ($GroupChat_enabledCtl) echo "checked=\"checked\""; ?>/>
            <?php echo elgg_echo('option:no'); ?><input type="radio" name="params[GroupChat_enabled]" value="false"<?php if (!$GroupChat_enabledCtl) echo "checked=\"checked\""; ?>/>
        </td>
    </tr>
</table>