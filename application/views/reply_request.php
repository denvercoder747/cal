<script>
function validate()
{
	if(document.getElementById('reply_content').value=='')
	{
		alert('Please Enter Value');
		return false;	
	}
	document.request.submit();
}
</script>
<div id="content-outer">
<!-- start content -->
<div id="content">

<form name="request" id="request" action="<?php echo base_url();?>index.php/admin/requestReply" method="post" onsubmit="return validate1();">
    <div style="color:#00F; text-align:center"><?php echo $this->session->flashdata('message'); ?></div>
    <div id="err" style="color:#F00; display:none; text-align:center">Please Reply Content</div>
    <?php foreach($records as $row){?>
<input type="hidden" name="id_request" id="id_request" value="<?php echo $row->id_request;?>"  />
    <table width="90%" border="0" cellspacing="0" cellpadding="3" align="left" id="id-form">
  <tr>
    <th height="30"><strong>Reply to Request</strong></th>
    <td height="30">&nbsp;</td>
    </tr>
  <tr>
    <th>From</th>
    <td> <?php echo $row->user_email;?> <input type="hidden" name="user_email" value="<?php echo $row->user_email;?>"  />    &nbsp;</td>
  </tr>
  <tr>
    <th>Title</th>
    <td><?php echo $row->title;?></td>
  </tr>
  <tr>
    <th>Message</th>
    <td><?php echo $row->message;?></td>
  </tr>
  <tr>
    <th width="90">Reply</th>
    <td><textarea name="reply_content" id="reply_content" class="form-textarea"><?php echo $row->reply_message;?></textarea></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" name="requestbtn" id="requestbtn" value="Send" class="calcipeButton" onclick="return validate();" /></td>
    </tr>
    </table>
    <?php }?>
</form>
</div></div>