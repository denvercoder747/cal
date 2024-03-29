function ref()
{
document.getElementById('tot_row1').value=3;
document.getElementById('tot_row').value=3;
document.getElementById('tot_qty').value=0;
document.getElementById('tot_amt').value=0;
document.getElementById('rcp_weight').value=0;
//document.getElementById('food_loss').value=0;
document.getElementById('finished_weight').value=0;
document.getElementById('weight').value=0.01;
document.getElementById('temp_weight').value=0.01;
document.getElementById('per_pc_cost').value=0;
document.getElementById('numbers').value=0;
document.getElementById('yield').value=0;
//document.getElementById('profit').value=300;
document.getElementById('selling_price').value=0;
document.getElementById('per_kilo_cost').value=0;
}
function total_amt1()
{
	total=0;
	total_amt=0;
	for(i=1;i<=document.getElementById('tot_row').value;i++)
	{
//		alert(document.getElementById('qtyRow'+i).value);
		total=total+parseFloat(document.getElementById('qtyRow'+i).value*document.getElementById('unitRow'+i).value);
		total_amt=total_amt+(parseFloat(document.getElementById('qtyRow'+i).value)*parseFloat(document.getElementById('rateRow'+i).value));
	    document.getElementById('amtRow'+i).value=parseFloat(document.getElementById('qtyRow'+i).value)*parseFloat(document.getElementById('rateRow'+i).value);
	}
//	alert(total_amt);
	document.getElementById('tot_qty').value=total;
	document.getElementById('tot_amt').value=total_amt;
}
$(".delete").click(function(){
	alert('');
//    $(this).parent().parent().remove();
});	
function addIng(){
var tbl = document.getElementById('tblSample');
var lastRow = tbl.rows.length;
document.getElementById('tot_row').value=lastRow;
// if there's no header row in the table, then iteration = lastRow + 1
//var iteration = lastRow;
document.getElementById('tot_row1').value=parseInt(document.getElementById('tot_row1').value)+1;
var iteration = parseInt(document.getElementById('tot_row1').value);
var row = tbl.insertRow(lastRow);

// left cell
var cellLeft = row.insertCell(0);
//  if(typeof(window.opera) != 'undefined'){isOpera = true;}
 // if(!isOpera && navigator.userAgent.indexOf('Internet Explorer')){isIE = true};
//  var myNewField = null;
//  alert(isIE);

 var isOpera, isIE = false;
 brwsername=navigator.appName;
 if(brwsername=='Microsoft Internet Explorer'){isIE = true};
  if(!isIE){
//    myNewField = document.createElement('input');
//    myNewField.setAttribute('name', 'tags');
		var e22 = document.createElement('input');
		e22.type = 'checkbox';
		e22.name = 'chk';
		e22.setAttribute("style","display:none");
		e22.id = 'chk'+ iteration;
		cellLeft.setAttribute("bgcolor","#FFFFFF");
		cellLeft.appendChild(e22);
		
		var el = document.createElement('input');
		el.type = 'text';
		el.name = 'ingRow[]';
		el.id = 'ingRow'+ iteration;
		el.setAttribute("class","calcipeMediumBox");
		el.setAttribute("onkeyup","lookup(this.value,"+iteration+");");
		el.setAttribute("onfocus","hideMsg("+iteration+");");
		el.setAttribute("autocomplete","OFF");
		el.size = 15;
		cellLeft.appendChild(el);
		
		var e20 = document.createElement('div');
		e20.id = 'suggestions' + iteration;
		e20.setAttribute("class","suggestionsBox");
		e20.setAttribute("style","display: none;z-index:1000;");
		cellLeft.appendChild(e20);
		
		var e21 = document.createElement('img');
		//el.name = 'ingRow' + iteration;
		e21.setAttribute("src","../../images/upArrow.png");
		e21.setAttribute("style","position: relative; top: -18px; left: 100px;");
		e21.setAttribute("alt","upArrow");
		document.getElementById('suggestions' + iteration).appendChild(e21);
		
		var e22 = document.createElement('div');
		//el.name = 'ingRow' + iteration;
		e22.id = 'autoSuggestionsList' + iteration;
		e22.setAttribute("class","suggestionList");
		document.getElementById('suggestions' + iteration).appendChild(e22);
		
		// middle1 cell
		var middle1 = row.insertCell(1);
		var el4 = document.createElement('input');
		el4.type = 'text';
		el4.id = 'qtyRow' + iteration;
		el4.name = 'qtyRow[]';
		el4.size = 3;
		el4.value = 1.00;
		el4.setAttribute("class","calcipeAmtBox");
		el4.setAttribute("style","text-align:right");
		el4.setAttribute("onKeyUp","calculate();");
		middle1.setAttribute("bgcolor","#FFFFFF");
		middle1.setAttribute("align","right");
		middle1.appendChild(el4);
		
		var middleb = row.insertCell(2);
		var el5 = document.createElement('select');
		el5.id = 'unitRow' + iteration;
		el5.setAttribute("class","calSelectBox");
		el5.name = 'unitRow[]';
		var textArr=new Array();
		var valArr = new Array();
		textArr=Array("KiloGram","Liter","Mililiter","Cup","Gram","TeaSpoon","TableSpoon","Ounce","Pound");
		valArr=Array(1,1,1000,4.35,1000,200,66.67,35.71,2.20);
		a=textArr.length;
		for(ui=0;ui<a;ui++)
		{
			var option = document.createElement("option");
			option.text = textArr[ui];
			option.value = valArr[ui];
			try {
					el5.add(option, null); //Standard 
				}
			catch(error) 
				{
					el5.add(option); // IE only
				}	
		}
		el5.setAttribute("onChange","calculate();");
		middleb.setAttribute("bgcolor","#FFFFFF");
		middleb.appendChild(el5);
		
		var middle2 = row.insertCell(3);
		var el1 = document.createElement('input');
		el1.type = 'text';
		//el1.name = 'rateRow' + iteration;
		el1.id = 'rateRow' + iteration;
		el1.name = 'rateRow[]';
		//el1.id = 'rateRow[]';
		el1.size = 3;
		el1.value = 1.00;
		el1.setAttribute("class","calcipeAmtBox");
		el1.setAttribute("style","text-align:right");
		el1.setAttribute("readonly","readonly");
		el1.setAttribute("onKeyUp","calculate();");
		middle2.setAttribute("bgcolor","#FFFFFF");
		middle2.setAttribute("align","right");
		middle2.appendChild(el1);
		
		var cellRight = row.insertCell(4);
		var el2 = document.createElement('input');
		el2.type = 'text';
		//el2.name = 'amtRow' + iteration;
		el2.id = 'amtRow' + iteration;
		el2.name = 'amtRow[]';
		//el2.id = 'amtRow[]';
		el2.size = 3;
		el2.value = 1.00;
		el2.setAttribute("class","calcipeAmtBox");
		el2.setAttribute("style","text-align:right");
		el2.setAttribute("readonly","readonly");
		cellRight.setAttribute("bgcolor","#FFFFFF");
		cellRight.setAttribute("align","right");
		cellRight.appendChild(el2);
		
var cellRight = row.insertCell(5);
		cellRight.innerHTML="<img src='/images/minus_image.png' width='14' height='14' class='delete' onClick=\"if (confirm('Are you sure you want to Remove'))check_box("+iteration+");deleteRow('tblSample');hideMsg2();calculate();\" />";
		
		var el6 = document.createElement('input');
		el6.type = 'hidden';
		el6.id = 'measureRow' + iteration;
		el6.name = 'measureRow[]';
		//el2.id = 'amtRow[]';
		el6.size = 3;
		el6.value = "";
		el6.setAttribute("readonly","readonly");
		cellRight.setAttribute("align","center");
		cellRight.setAttribute("valign","middle");
		cellRight.appendChild(el6);
		
		var el8 = document.createElement('input');
		el8.type = 'hidden';
		//el2.name = 'amtRow' + iteration;
		el8.id = 'gId' + iteration;
		el8.name = 'gId[]';
		//el2.id = 'amtRow[]';
		el8.size = 3;
		cellRight.setAttribute("bgcolor","#FFFFFF");
		cellRight.appendChild(el8);
		var el9 = document.createElement('input');
		el9.type = 'hidden';
		//el2.name = 'amtRow' + iteration;
		el9.id = 'rId' + iteration;
		el9.name = 'rId[]';
		//el2.id = 'amtRow[]';
		el9.size = 3;
		cellRight.setAttribute("bgcolor","#FFFFFF");
		cellRight.appendChild(el9);
  } 
  else 
  {
//    myNewField = document.createElement('<input name="tags"/>');
		idchk = 'chk'+ iteration;
    e22 = document.createElement('<input type="checkbox" name="chk" style="display:none" bgcolor="#FFFFFF" id="chk'+iteration+'"/>');
		cellLeft.appendChild(e22);
    e1 = document.createElement('<input type="text" name="ingRow[]" class="calcipeMediumBox" onkeyup="lookup(this.value,'+iteration+');" onfocus="hideMsg('+iteration+');" autocomplete="OFF" id="ingRow'+iteration+'"/>');
		cellLeft.appendChild(e1);
    e20 = document.createElement('<div id="suggestions'+iteration+'" class="suggestionsBox" style="position:absolute; left:40px;padding-top:10px; display: none;z-index:1000;"></div>');
		cellLeft.appendChild(e20);
    e21 = document.createElement('<img src="/images/upArrow.png" alt="upArrow" id="suggestions'+iteration+'" class="suggestionsBox" style="width: 10px; height:10px; position:absolute; left:95px; top:-25px;  border:none" />');
		document.getElementById('suggestions' + iteration).appendChild(e21);
    e22 = document.createElement('<div id="autoSuggestionsList'+iteration+'" class="suggestionList"></div>');
		document.getElementById('suggestions' + iteration).appendChild(e22);
var middle1 = row.insertCell(1);
	e14 = document.createElement('<input type="text" name="qtyRow[]" value=1  class="calcipeAmtBox" bgcolor="#FFFFFF" align="right" onkeyup="calculate();" style="text-align:right" id="qtyRow'+iteration+'"/>');
		middle1.appendChild(e14);
var middleb = row.insertCell(2);
		var el5 = document.createElement('select');
		el5.id = 'unitRow' + iteration;
		el5.setAttribute("class","calSelectBox");
		el5.name = 'unitRow[]';
		var textArr=new Array();
		var valArr = new Array();
		textArr=Array("KiloGram","Liter","Mililiter","Cup","Gram","TeaSpoon","TableSpoon","Ounce","Pound");
		valArr=Array(1,1,1000,4.35,1000,200,66.67,35.71,2.20);
		a=textArr.length;
		for(ui=0;ui<a;ui++)
		{
			var option = document.createElement("option");
			option.text = textArr[ui];
			option.value = valArr[ui];
			try {
					el5.add(option, null); //Standard 
				}
			catch(error) 
				{
					el5.add(option); // IE only
				}	
		}
		el5.setAttribute("onChange","calculate();");
		middleb.setAttribute("bgcolor","#FFFFFF");
		middleb.appendChild(el5);
var middle2 = row.insertCell(3);
	e11 = document.createElement('<input type="text" size=3 value="1" name="rateRow[]" class="calcipeAmtBox" bgcolor="#FFFFFF" align="right" onkeyup="calculate();" style="text-align:right" readonly="readonly" id="rateRow'+iteration+'"/>');
		middle2.appendChild(e11);
var cellRight = row.insertCell(4);
cellRight.innerHTML='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	e12 = document.createElement('<input type="text" size=3 value="1" name="amtRow[]" class="calcipeAmtBox" bgcolor="#FFFFFF" align="right" onkeyup="calculate();" style="text-align:right" readonly="readonly" id="amtRow'+iteration+'"/>');
		cellRight.appendChild(e12);
var cellRight2 = row.insertCell(5);
		cellRight2.innerHTML="&nbsp;&nbsp;<img src='/images/minus_image.png' width='14' height='14' align='center' class='delete' onClick=\"if (confirm('Are you sure you want to Remove'))check_box("+iteration+");deleteRow('tblSample');hideMsg2();calculate();\" />";
	el6 = document.createElement('<input type="hidden" name="measureRow[]" bgcolor="#FFFFFF" align="right" onkeyup="calculate();" style="text-align:right" readonly="readonly" id="measureRow'+iteration+'"/>');
		cellRight2.appendChild(el6);
	el8 = document.createElement('<input type="hidden" name="gId[]" bgcolor="#FFFFFF" align="right" onkeyup="calculate();" style="text-align:right" readonly="readonly" id="gId'+iteration+'"/>');
		cellRight2.appendChild(el8);
	el9 = document.createElement('<input type="hidden" name="rId[]" bgcolor="#FFFFFF" align="right" onkeyup="calculate();" style="text-align:right" readonly="readonly" id="rId'+iteration+'"/>');
		cellRight2.appendChild(el9);
  }

}
function addIng_multi(){
var tbl = document.getElementById('tblSample');
var lastRow = tbl.rows.length;
document.getElementById('tot_row').value=lastRow;
// if there's no header row in the table, then iteration = lastRow + 1
//var iteration = lastRow;
document.getElementById('tot_row1').value=parseInt(document.getElementById('tot_row1').value)+1;
var iteration = parseInt(document.getElementById('tot_row1').value);
var row = tbl.insertRow(lastRow);

// left cell
var cellLeft = row.insertCell(0);
//  if(typeof(window.opera) != 'undefined'){isOpera = true;}
 // if(!isOpera && navigator.userAgent.indexOf('Internet Explorer')){isIE = true};
//  var myNewField = null;
//  alert(isIE);

 var isOpera, isIE = false;
 brwsername=navigator.appName;
 if(brwsername=='Microsoft Internet Explorer'){isIE = true};
  if(!isIE){
var cellLeft = row.insertCell(0);
var e22 = document.createElement('input');
e22.type = 'checkbox';
e22.name = 'chk';
e22.setAttribute("style","display:none");
e22.id = 'chk'+ iteration;
cellLeft.setAttribute("bgcolor","#FFFFFF");
cellLeft.appendChild(e22);
var el = document.createElement('input');
el.type = 'text';
//el.name = 'ingRow' + iteration;
//el.id = 'ingRow' + iteration;
el.name = 'ingRow[]';
el.id = 'ingRow'+ iteration;
el.setAttribute("class","calcipeMediumBox");
el.setAttribute("onkeyup","lookup_multi(this.value,"+iteration+");");
el.setAttribute("onfocus","hideMsg("+iteration+");");
el.setAttribute("autocomplete","OFF");
//el.setAttribute("onblur","fill1(this.value,"+iteration+")");
//el.setAttribute("onblur","fill2(this.value,"+iteration+");");
el.size = 15;
cellLeft.appendChild(el);
//Auto Suggest Box

var e20 = document.createElement('div');
//el.name = 'ingRow' + iteration;
e20.id = 'suggestions' + iteration;
e20.setAttribute("class","suggestionsBox");
e20.setAttribute("style","display: none;z-index:1000;");
cellLeft.appendChild(e20);

var e21 = document.createElement('img');
//el.name = 'ingRow' + iteration;
e21.setAttribute("src","/images/upArrow.png");
e21.setAttribute("style","position: relative; top: -18px; left: 100px;");
e21.setAttribute("alt","upArrow");
document.getElementById('suggestions' + iteration).appendChild(e21);

var e22 = document.createElement('div');
//el.name = 'ingRow' + iteration;
e22.id = 'autoSuggestionsList' + iteration;
e22.setAttribute("class","suggestionList");
document.getElementById('suggestions' + iteration).appendChild(e22);



// middle1 cell
var middle1 = row.insertCell(1);
var el4 = document.createElement('input');
el4.type = 'text';
//el4.name = 'qtyRow' + iteration;
el4.id = 'qtyRow' + iteration;
el4.name = 'qtyRow[]';
//el4.id = 'qtyRow[]';
el4.size = 3;
el4.value = 1.00;
el4.setAttribute("class","calcipeAmtBox");
el4.setAttribute("style","text-align:right");
//el4.onKeyUp = document.getElementById('').value=document.getElementById('').value+this.value;
el4.setAttribute("onKeyUp","calculate();");
middle1.setAttribute("bgcolor","#FFFFFF");
middle1.setAttribute("align","right");
middle1.appendChild(el4);
var middleb = row.insertCell(2);
var el5 = document.createElement('select');
el5.id = 'unitRow' + iteration;
el5.setAttribute("class","calSelectBox");
//el5.id = 'unitRow[]';
el5.name = 'unitRow[]';
var textArr=new Array();
var valArr = new Array();
textArr=Array("KiloGram","Liter","Mililiter","Cup","Gram","TeaSpoon","TableSpoon","Ounce","Pound");
valArr=Array(1,1,1000,4.35,1000,200,66.67,35.71,2.20);
a=textArr.length;
for(ui=0;ui<a;ui++)
{
	var option = document.createElement("option");
	option.text = textArr[ui];
	option.value = valArr[ui];
	try {
			el5.add(option, null); //Standard 
		}
	catch(error) 
		{
			el5.add(option); // IE only
		}	
}
//el5.setAttribute("style","width:50px;height:25px");
el5.setAttribute("onChange","calculate();");
middleb.setAttribute("bgcolor","#FFFFFF");
	middleb.appendChild(el5);
// Middle2 cell
var middle2 = row.insertCell(3);
var el1 = document.createElement('input');
el1.type = 'text';
el1.id = 'rateRow' + iteration;
el1.name = 'rateRow[]';
el1.size = 3;
el1.value = 1.00;
el1.setAttribute("class","calcipeAmtBox");
el1.setAttribute("style","text-align:right");
el1.setAttribute("readonly","readonly");
el1.setAttribute("onKeyUp","calculate();");
middle2.setAttribute("bgcolor","#FFFFFF");
middle2.setAttribute("align","right");
middle2.appendChild(el1);
var cellRight = row.insertCell(4);
var el2 = document.createElement('input');
el2.type = 'text';
el2.id = 'amtRow' + iteration;
el2.name = 'amtRow[]';
el2.size = 3;
el2.value = 1.00;
el2.setAttribute("class","calcipeAmtBox");
el2.setAttribute("style","text-align:right");
el2.setAttribute("readonly","readonly");
cellRight.setAttribute("bgcolor","#FFFFFF");
cellRight.setAttribute("align","right");
cellRight.appendChild(el2);
var cellRight = row.insertCell(5);
cellRight.innerHTML="<img src='/images/minus_image.png' width='14' height='14' class='delete' onClick=\"if (confirm('Are you sure you want to Remove'))check_box("+iteration+");deleteRow('tblSample');hideMsg2();calculate();\" />";
var el6 = document.createElement('input');
el6.type = 'hidden';
//el2.name = 'amtRow' + iteration;
el6.id = 'measureRow' + iteration;
el6.name = 'measureRow[]';
el6.size = 3;
el6.value = "";
el6.setAttribute("readonly","readonly");
cellRight.setAttribute("align","center");
cellRight.setAttribute("valign","middle");
cellRight.appendChild(el6);
var el8 = document.createElement('input');
el8.type = 'hidden';
el8.id = 'gId' + iteration;
el8.name = 'gId[]';
el8.size = 3;
cellRight.setAttribute("bgcolor","#FFFFFF");
cellRight.appendChild(el8);
var el9 = document.createElement('input');
el9.type = 'hidden';
el9.id = 'rId' + iteration;
el9.name = 'rId[]';
el9.size = 3;
cellRight.setAttribute("bgcolor","#FFFFFF");
cellRight.appendChild(el9);
  } 
  else 
  {
//    myNewField = document.createElement('<input name="tags"/>');
		idchk = 'chk'+ iteration;
    e22 = document.createElement('<input type="checkbox" name="chk" style="display:none" bgcolor="#FFFFFF" id="chk'+iteration+'"/>');
		cellLeft.appendChild(e22);
    e1 = document.createElement('<input type="text" name="ingRow[]" class="calcipeMediumBox" onkeyup="lookup_multi(this.value,'+iteration+');" onfocus="hideMsg('+iteration+');" autocomplete="OFF" id="ingRow'+iteration+'"/>');
		cellLeft.appendChild(e1);
    e20 = document.createElement('<div id="suggestions'+iteration+'" class="suggestionsBox" style="position:absolute; left:40px;padding-top:10px; display: none;z-index:1000;"></div>');
		cellLeft.appendChild(e20);
    e21 = document.createElement('<img src="/images/upArrow.png" alt="upArrow" id="suggestions'+iteration+'" class="suggestionsBox" style="width: 10px; height:10px; position:absolute; left:95px; top:-25px;  border:none" />');
		document.getElementById('suggestions' + iteration).appendChild(e21);
    e22 = document.createElement('<div id="autoSuggestionsList'+iteration+'" class="suggestionList"></div>');
		document.getElementById('suggestions' + iteration).appendChild(e22);
var middle1 = row.insertCell(1);
	e14 = document.createElement('<input type="text" name="qtyRow[]" value=1  class="calcipeAmtBox" bgcolor="#FFFFFF" align="right" onkeyup="calculate();" style="text-align:right" id="qtyRow'+iteration+'"/>');
		middle1.appendChild(e14);
var middleb = row.insertCell(2);
		var el5 = document.createElement('select');
		el5.id = 'unitRow' + iteration;
		el5.setAttribute("class","calSelectBox");
		el5.name = 'unitRow[]';
		var textArr=new Array();
		var valArr = new Array();
		textArr=Array("KiloGram","Liter","Mililiter","Cup","Gram","TeaSpoon","TableSpoon","Ounce","Pound");
		valArr=Array(1,1,1000,4.35,1000,200,66.67,35.71,2.20);
		a=textArr.length;
		for(ui=0;ui<a;ui++)
		{
			var option = document.createElement("option");
			option.text = textArr[ui];
			option.value = valArr[ui];
			try {
					el5.add(option, null); //Standard 
				}
			catch(error) 
				{
					el5.add(option); // IE only
				}	
		}
		el5.setAttribute("onChange","calculate();");
		middleb.setAttribute("bgcolor","#FFFFFF");
		middleb.appendChild(el5);
var middle2 = row.insertCell(3);
	e11 = document.createElement('<input type="text" size=3 value="1" name="rateRow[]" class="calcipeAmtBox" bgcolor="#FFFFFF" align="right" onkeyup="calculate();" style="text-align:right" readonly="readonly" id="rateRow'+iteration+'"/>');
		middle2.appendChild(e11);
var cellRight = row.insertCell(4);
cellRight.innerHTML='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	e12 = document.createElement('<input type="text" size=3 value="1" name="amtRow[]" class="calcipeAmtBox" bgcolor="#FFFFFF" align="right" onkeyup="calculate();" style="text-align:right" readonly="readonly" id="amtRow'+iteration+'"/>');
		cellRight.appendChild(e12);
var cellRight2 = row.insertCell(5);
		cellRight2.innerHTML="&nbsp;&nbsp;<img src='/images/minus_image.png' width='14' height='14' align='center' class='delete' onClick=\"if (confirm('Are you sure you want to Remove'))check_box("+iteration+");deleteRow('tblSample');hideMsg2();calculate();\" />";
	el6 = document.createElement('<input type="hidden" name="measureRow[]" bgcolor="#FFFFFF" align="right" onkeyup="calculate();" style="text-align:right" readonly="readonly" id="measureRow'+iteration+'"/>');
		cellRight2.appendChild(el6);
	el8 = document.createElement('<input type="hidden" name="gId[]" bgcolor="#FFFFFF" align="right" onkeyup="calculate();" style="text-align:right" readonly="readonly" id="gId'+iteration+'"/>');
		cellRight2.appendChild(el8);
	el9 = document.createElement('<input type="hidden" name="rId[]" bgcolor="#FFFFFF" align="right" onkeyup="calculate();" style="text-align:right" readonly="readonly" id="rId'+iteration+'"/>');
		cellRight2.appendChild(el9);
  }



}
function check_box(a)
{
	document.getElementById('chk'+a).checked=true;
}
//function removeRowFromTable()
//{
//var tbl = document.getElementById('tblSample');
//var lastRow = tbl.rows.length;
//if (lastRow > 2) {tbl.deleteRow(lastRow - 1);}
//var lastRow1 = tbl.rows.length;
//document.getElementById('tot_row').value=lastRow1-1;
//
//}
/*function removeRowFromTable(a)
{
var tbl = document.getElementById('tblSample');
var lastRow = tbl.rows.length;
if (lastRow > 2) {tbl.deleteRow(a);}else{alert("Cannot delete all the rows.");}
var lastRow1 = tbl.rows.length;
document.getElementById('tot_row').value=lastRow1-1;

}
*/function addRow(addSectionSuject) 
{
			var table = document.getElementById(addSectionSuject);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var colCount = table.rows[0].cells.length;

			for(var i=0; i<colCount; i++) {

				var newcell	= row.insertCell(i);

				newcell.innerHTML = table.rows[0].cells[i].innerHTML;
				//alert(newcell.childNodes);
				switch(newcell.childNodes[0].type) {
					case "text":
							newcell.childNodes[0].value = "";
							break;
					case "checkbox":
							newcell.childNodes[0].checked = false;
							break;
					case "select-one":
							newcell.childNodes[0].selectedIndex = 0;
							break;
				}
			}
}
function deleteRow(addSectionSuject) 
{
			try {
			var table = document.getElementById(addSectionSuject);
			
			var rowCount = table.rows.length;
			for(var i=0; i<rowCount; i++) {
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					if(rowCount <= 2) {
						alert("Cannot delete all the rows.");
						break;
					}
					table.deleteRow(i);
					rowCount--;
					document.getElementById('tot_row').value=rowCount-1;
					i--;
				}

			}
			}catch(e) {
				alert(e);
			}
}
function calculate()
{
	var yield=0.00;
	var inc=0.00;
	var quantity=0.00;
	var per_piece_weight=parseFloat(document.getElementById('weight').value);
//	var cookloss=0.00;
	var cookloss=parseFloat(document.getElementById('food_loss').value);
	var cook_loss_weight=0.00;
	var inc_cook_loss_weight=0.00;
	var finished_product=0.00;
	var inc_finished_product=0.00;
	var per_kg_cost=0.00;
	var per_kg_cost1=0.00;
	var inc_per_kg_cost=0.00;
//	var per_piece_weight=0.05;
	var no_of_pieces=0.00;
	var inc_no_of_pieces=0.00;
	var per_piece_cost=0.00;
	var finished_cost=0.00;
	var inc_finished_cost=0.00;
	var new_formula=0.00;
	var amount=0.00;
	var total_amount=0.00;
	var total_rate=0.00;
	var indent=230;
	var new_formula=0;
	var total_weight=0;
	var profit=parseFloat(document.getElementById('profit').value);


	total=0;
	total_amt=0;
 	var qtyRow = document.getElementsByName('qtyRow[]');
  	var rateRow = document.getElementsByName('rateRow[]');
  	var amtRow = document.getElementsByName('amtRow[]');
   	var unitRow = document.getElementsByName('unitRow[]');
   	var measureRow = document.getElementsByName('measureRow[]');
	var count = 0;
	for(i=1;i<=qtyRow.length;i++)
	{
	var rr=document.getElementById('qtyRow'+i).value;
//		total=total+parseFloat(document.getElementById('qtyRow'+i).value);
		total=total+parseFloat((rr)*(1/parseFloat(document.getElementById('unitRow'+i).options[document.getElementById('unitRow'+i).selectedIndex].value)));
//		total_amt=total_amt+(parseFloat(document.getElementById('qtyRow'+i).value)*parseFloat(document.getElementById('rateRow'+i).value));
		total_amt=total_amt+(parseFloat(document.getElementById('qtyRow'+i).value*(1/parseFloat(document.getElementById('unitRow'+i).options[document.getElementById('unitRow'+i).selectedIndex].value)))*parseFloat(document.getElementById('rateRow'+i).value));
		total_rate=total_rate+parseFloat(document.getElementById('rateRow'+i).value);
	    amtrw=parseFloat(document.getElementById('qtyRow'+i).value*(1/parseFloat(document.getElementById('unitRow'+i).options[document.getElementById('unitRow'+i).selectedIndex].value)))*parseFloat(document.getElementById('rateRow'+i).value);
		document.getElementById('amtRow'+i).value=parseFloat(amtrw.toFixed(4));
		document.getElementById('measureRow'+i).value=document.getElementById('unitRow'+i).options[document.getElementById('unitRow'+i).selectedIndex].text;
	}
	if(total<=0)return false;
	document.getElementById('tot_qty').value=total.toFixed(4);
	document.getElementById('tot_amt').value=total_amt.toFixed(4);
	
	quantity=parseFloat(document.getElementById('tot_qty').value);
	quantity=parseFloat(quantity.toFixed(4));
	total_amount=document.getElementById('tot_amt').value;
	
	
//	cook_loss_weight=quantity*parseFloat(document.getElementById('food_loss').value);
	cook_loss_weight=quantity*parseFloat(cookloss/100);
	cook_loss_weight=parseFloat(cook_loss_weight.toFixed(4));
	finished_product=parseFloat(quantity-cook_loss_weight);
	finished_product=parseFloat(finished_product.toFixed(4));
	per_kg_cost1=total_amount/finished_product;
	per_kg_cost=per_kg_cost1+(per_kg_cost1*parseFloat(document.getElementById('infrastructure_cost').value)/100);

	no_of_pieces=parseFloat(finished_product.toFixed(4)/per_piece_weight.toFixed(4));
	per_piece_cost=total_amount/no_of_pieces;
	per_piece_cost=parseFloat(per_piece_cost.toFixed(4));
//	yield=quantity.toFixed(4)/per_piece_cost.toFixed(4);
	yield=quantity.toFixed(4)/no_of_pieces.toFixed(4);
	new_formula=indent/yield;
	finished_cost=per_piece_cost*parseFloat(document.getElementById('profit').value)/100;
	sell_per_kg_cost=per_kg_cost*parseFloat(document.getElementById('profit').value)/100;
	total_weight=indent.toFixed(4)/yield.toFixed(4);
	document.getElementById('rcp_weight').value=document.getElementById('tot_qty').value;
	document.getElementById('food_loss').value=parseFloat(cookloss.toFixed(4));
	document.getElementById('finished_weight').value=finished_product.toFixed(4);
//	document.getElementById('numbers').value=quantity.toFixed(4);
	document.getElementById('numbers').value=no_of_pieces.toFixed(4);
	document.getElementById('yield').value=yield.toFixed(4);
	document.getElementById('selling_price').value=finished_cost.toFixed(4);
	document.getElementById('weight').value=per_piece_weight;
	document.getElementById('per_pc_cost').value=per_piece_cost.toFixed(4);
//	document.getElementById('per_kilo_cost').value=per_kg_cost.toFixed(4);
	document.getElementById('per_kilo_cost').value=sell_per_kg_cost.toFixed(4);
	document.getElementById('per_kg_cost').value=per_kg_cost.toFixed(4);
}
