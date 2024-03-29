<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.3.2.min.js"></script>
<script>
function lookup(inputString,id) {
	var link = "/index.php/gredient";

    if(inputString.length < 1) {

        // Hide the suggestion box.
        $('#suggestions').hide();

    } else if(inputString.length >= 1) {

        $.post(link + "/searching", {

            queryString: ""+inputString+"",
			Id: id

        }, function(data){

            if(data.length > 0) {

                $('#suggestions'+id).show();
                $('#autoSuggestionsList'+id).html(data);

            }

        });

    }

} // end function lookup  
function fill(thisValue,id) {
	$('#inputString'+id).val(thisValue);
			//$("#inputString"+id).hide();

//	setTimeout("$('#suggestions').hide();", 200);
	setTimeout($('#suggestions'+id).hide(), 200);
}
</script>
<title>Untitled Document</title>
<style>
.tagadd
{
	font-size:12px;
}
.suggestionsBox {
	position: absolute;
	width: 240px;
	background-color: #212427;
	border: 2px solid #000;
	color: #fff;
	padding: 5px;
	margin:10px 0px 0px 0px;
	-moz-border-radius: 8px;
	-webkit-border-radius: 8px;
}

#inputString { width: 240px; padding: 5px; font-size: 18px;}

.suggestionList { margin: 0px; padding: 0px; }

/*  Individual Search Results  */
.suggestionList li {
	margin: 0px 0px 3px 0px;
	padding: 7px;
	cursor: pointer;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	list-style-type: none;
}

/*  Hover effect  */
.suggestionList li:hover { background-color: #009900; font-weight: bold;}

</style>
</head>

<body>
<div id="search"> 
<form action="<?php echo base_url() . 'search/'; ?>" method="post"><table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><input type="text" name="search" id="inputString1" maxlength="30" onkeyup="lookup(this.value,1);"  onblur="fill();">  
    	<div class="suggestionsBox" id="suggestions1" style="display: none;">  
        <img src="<?php echo base_url();?>images/upArrow.png" style="position: relative; top: -18px; left: 100px;" alt="upArrow" />
            <div class="suggestionList" id="autoSuggestionsList1"> 
  
            </div> 
        </div>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="text" name="search" id="inputString2" maxlength="30" onkeyup="lookup(this.value,2);"  onblur="fill();"> 
    	<div class="suggestionsBox" id="suggestions2" style="display: none;">  
        <img src="<?php echo base_url();?>images/upArrow.png" style="position: relative; top: -18px; left: 100px;" alt="upArrow" />
            <div class="suggestionList" id="autoSuggestionsList2"> 
  
            </div> 
        </div>
    </td>
    <td>&nbsp;</td>
  </tr>
</table>

                        </form> 
                         
                      </div>  <div id="tags"></div>
</body>
</html>