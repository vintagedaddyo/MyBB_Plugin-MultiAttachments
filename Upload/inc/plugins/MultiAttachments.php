<?php
/*
 * MyBB: MultiAttachments
 *
 * File: multiattachments.php
 * 
 * Authors: Edson Ordaz, Vintagedaddyo
 *
 * MyBB Version: 1.8
 *
 * Plugin Version: 1.1
 * 
 *
 */

if(!defined("IN_MYBB"))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

$plugins->add_hook("newthread_do_multiattachments_start","MultiAttachments_upload");

function MultiAttachments_info()
{
   global $lang;

    $lang->load("multiattachments");
    
    $lang->multiattachments_Desc = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="float:right;">' .
        '<input type="hidden" name="cmd" value="_s-xclick">' . 
        '<input type="hidden" name="hosted_button_id" value="AZE6ZNZPBPVUL">' .
        '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">' .
        '<img alt="" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1">' .
        '</form>' . $lang->multiattachments_Desc;

    return Array(
        'name' => $lang->multiattachments_Name,
        'description' => $lang->multiattachments_Desc,
        'website' => $lang->multiattachments_Web,
        'author' => $lang->multiattachments_Auth,
        'authorsite' => $lang->multiattachments_AuthSite,
        'version' => $lang->multiattachments_Ver,
        'compatibility' => $lang->multiattachments_Compat
    );
}

function MultiAttachments_activate()
{
	global $db;
	$template = array(
		"template" => $db->escape_string('<tr>
<td class="trow1" width="1"><img src="{$theme[\'imgdir\']}/paperclip.png" alt="" /></td>
<td class="trow1" style="white-space: nowrap" colspan="2"><strong>{$lang->new_attachment}</strong> <input type="file" name="attachment" size="50" class="fileupload" /></td>
</tr>
<tr>
<td class="trow1" width="1"><img src="{$theme[\'imgdir\']}/paperclip.png" alt="" /></td>
<td class="trow1" style="white-space: nowrap" colspan="2"><strong>{$lang->new_attachment}</strong> <input type="file" name="multiattachment1" size="50" class="fileupload" /></td>
</tr>
<tr>
<td class="trow1" width="1"><img src="{$theme[\'imgdir\']}/paperclip.png" alt="" /></td>
<td class="trow1" style="white-space: nowrap" colspan="2"><strong>{$lang->new_attachment}</strong> <input type="file" name="multiattachment2" size="50" class="fileupload" /></td>
</tr>
<tr>
<td class="trow1" width="1"><img src="{$theme[\'imgdir\']}/paperclip.png" alt="" /></td>
<td class="trow1" style="white-space: nowrap" colspan="2"><strong>{$lang->new_attachment}</strong> <input type="file" name="multiattachment3" size="50" class="fileupload" /></td>
</tr>
<tr>
<td class="trow1" width="1"><img src="{$theme[\'imgdir\']}/paperclip.png" alt="" /></td>
<td class="trow1" style="white-space: nowrap" colspan="2"><strong>{$lang->new_attachment}</strong> <input type="file" name="multiattachment4" size="50" class="fileupload" /></td>
</tr>
<tr>
<td colspan="3" class="trow1" align="center">
<input type="submit" class="button" name="updateattachment" value="{$lang->update_attachment}" tabindex="12" /> 
</td>
</tr>')
	);
	$db->update_query("templates", $template,"title='post_attachments_new'");
}

function MultiAttachments_deactivate()
{
	global $db;
	$template = array(
		"template" => $db->escape_string('<tr>
<td class="trow1" width="1"><img src="{$theme[\'imgdir\']}/paperclip.png" alt="" /></td>
<td class="trow1" style="white-space: nowrap"><strong>{$lang->new_attachment}</strong> <input type="file" name="attachment" size="30" class="fileupload" /></td><td class="trow1" align="center"><input type="submit" class="button" name="updateattachment" value="{$lang->update_attachment}" tabindex="12" /> <input type="submit" class="button" name="newattachment" value="{$lang->add_attachment}"  tabindex="13" />
</td>
</tr>')
	);
	$db->update_query("templates", $template,"title='post_attachments_new'");
}

function MultiAttachments_upload()
{
	global $mybb,$db,$forumpermissions,$attachcount,$attachedfile;
	if($_FILES['multiattachment1']['size'] > 0 && $forumpermissions['canpostattachments'] != 0 && ($mybb->settings['maxattachments'] == 0 ||  $attachcount < $mybb->settings['maxattachments']))
	{
		require_once MYBB_ROOT."inc/functions_upload.php";
		$update_attachments = false;
		if($mybb->input['updateattachment'])
		{
			$update_attachments = true;
		}
		$attachedfile = upload_attachment($_FILES['multiattachment1'], $update_attachments);
	}
	if($_FILES['multiattachment2']['size'] > 0 && $forumpermissions['canpostattachments'] != 0 && ($mybb->settings['maxattachments'] == 0 ||  $attachcount < $mybb->settings['maxattachments']))
	{
		require_once MYBB_ROOT."inc/functions_upload.php";
		$update_attachments = false;
		if($mybb->input['updateattachment'])
		{
			$update_attachments = true;
		}
		$attachedfile = upload_attachment($_FILES['multiattachment2'], $update_attachments);
	}
	if($_FILES['multiattachment3']['size'] > 0 && $forumpermissions['canpostattachments'] != 0 && ($mybb->settings['maxattachments'] == 0 ||  $attachcount < $mybb->settings['maxattachments']))
	{
		require_once MYBB_ROOT."inc/functions_upload.php";
		$update_attachments = false;
		if($mybb->input['updateattachment'])
		{
			$update_attachments = true;
		}
		$attachedfile = upload_attachment($_FILES['multiattachment3'], $update_attachments);
	}
	if($_FILES['multiattachment4']['size'] > 0 && $forumpermissions['canpostattachments'] != 0 && ($mybb->settings['maxattachments'] == 0 ||  $attachcount < $mybb->settings['maxattachments']))
	{
		require_once MYBB_ROOT."inc/functions_upload.php";
		$update_attachments = false;
		if($mybb->input['updateattachment'])
		{
			$update_attachments = true;
		}
		$attachedfile = upload_attachment($_FILES['multiattachment4'], $update_attachments);
	}
}
?>