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
        <td>
            <?php echo elgg_echo('option:yes'); ?><input type="radio" name="params[GroupChat_enabled]" value="true" <?php if ($vars['entity']->GroupChat_enabled) echo "checked=\"checked\""; ?>/>
            <?php echo elgg_echo('option:no'); ?><input type="radio" name="params[GroupChat_enabled]" value="false"<?php if (!$vars['entity']->GroupChat_enabled) echo "checked=\"checked\""; ?>/>
        </td>
    </tr>
</table>