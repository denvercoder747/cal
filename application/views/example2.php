<?php
ini_set("display_errors",0);
error_reporting(E_ALL);
require_once 'excel_reader3.php';

$xls = new Spreadsheet_Excel_Reader();
$xls->setOutputEncoding('CP1251');
$xls->read("test.xls");
?>
<html>
<head>

<style>
div { display:none; color:#aaa; }
</style>
<script>
function toggle(state) {
	var divs = document.getElementsByTagName('div');
	for (var i=0; i<divs.length; i++) {
		divs[i].style.display = (state)?'inline':'none';
	}
}
</script>
</head>
<body>

Display formatting information: <input type="checkbox" onClick="toggle(this.checked)">
<br><br>

<table border="1">
<? for ($row=1;$row<=$xls->rowcount();$row++) { ?>
	<tr>
	<? for ($col=1;$col<=$xls->colcount();$col++) {	?>
		<td><?= $xls->val($row,$col) ?>&nbsp;
		<div>[Format=<?=$xls->format($row,$col)?>,FormatIndex=<?=$xls->formatIndex($row,$col)?>]</div></td>
	<? } ?>
	</tr>
<? } ?>
</table>

Note: There seems to be some problem with translating times (and dates with times) correctly.
</body>
</html>
