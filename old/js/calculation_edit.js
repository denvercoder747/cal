function total_amt1()
{
	total=0;
	total_amt=0;
	for(i=1;i<=document.getElementById('tot_row').value;i++)
	{
//		alert(document.getElementById('qtyRow'+i).value);
		total=total+parseFloat(document.getElementById('qtyRow'+i).value);
		total_amt=total_amt+(parseFloat(document.getElementById('qtyRow'+i).value)*parseFloat(document.getElementById('rateRow'+i).value));
	    document.getElementById('amtRow'+i).value=parseFloat(document.getElementById('qtyRow'+i).value)*parseFloat(document.getElementById('rateRow'+i).value);
	}
//	alert(total_amt);
	document.getElementById('tot_qty').value=total;
	document.getElementById('tot_amt').value=total_amt;
}
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
var e22 = document.createElement('input');
e22.type = 'checkbox';
e22.name = 'chk';
e22.id = 'chk'+ iteration;
cellLeft.appendChild(e22);
var el = document.createElement('input');
el.type = 'text';
//el.name = 'ingRow' + iteration;
//el.id = 'ingRow' + iteration;
el.name = 'ingRow[]';
el.id = 'ingRow'+ iteration;
el.setAttribute("class","gradient");
el.setAttribute("onkeyup","lookup(this.value,"+iteration+");");
//el.setAttribute("onblur","fill1(this.value,"+iteration+")");
el.size = 20;
cellLeft.appendChild(el);
//Auto Suggest Box

var e20 = document.createElement('div');
//el.name = 'ingRow' + iteration;
e20.id = 'suggestions' + iteration;
e20.setAttribute("class","suggestionsBox");
e20.setAttribute("style","display: none;");
cellLeft.appendChild(e20);

var e21 = document.createElement('img');
//el.name = 'ingRow' + iteration;
e21.setAttribute("src","../../../images/upArrow.png");
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
el4.size = 10;
el4.value = 1.00;
el4.setAttribute("class","quantity_t");
//el4.onKeyUp = document.getElementById('').value=document.getElementById('').value+this.value;
el4.setAttribute("onKeyUp","calculate();");
middle1.appendChild(el4);
//var middle1 = row.insertCell(1);
var el5 = document.createElement('select');
el5.id = 'unitRow' + iteration;
//el5.id = 'unitRow[]';
el5.name = 'unitRow[]';
var textArr=new Array();
var valArr = new Array();
textArr=Array("KiloGram","Liter","Cup","Gram","TeaSpoon","TableSpoon","Ounce","Pound");
valArr=Array(1,1,4.35,1000,200,66.67,35.71,2.20);
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
el5.setAttribute("style","width:100px;height:25px");
	middle1.appendChild(el5);
// Middle2 cell
var middle2 = row.insertCell(2);
var el1 = document.createElement('input');
el1.type = 'text';
//el1.name = 'rateRow' + iteration;
el1.id = 'rateRow' + iteration;
el1.name = 'rateRow[]';
//el1.id = 'rateRow[]';
el1.size = 3;
el1.value = 1.00;
//el1.setAttribute("readonly","readonly");
el1.setAttribute("onKeyUp","calculate();");
middle2.appendChild(el1);
// right cell
var cellRight = row.insertCell(3);
var el2 = document.createElement('input');
el2.type = 'text';
//el2.name = 'amtRow' + iteration;
el2.id = 'amtRow' + iteration;
el2.name = 'amtRow[]';
//el2.id = 'amtRow[]';
el2.size = 3;
el2.value = 1.00;
el2.setAttribute("readonly","readonly");
cellRight.appendChild(el2);
// Last cell
//var cellLast = row.insertCell(4);
//var el3 = document.createElement('input');
//el3.type = 'button';
//el3.name = 'amtRow' + iteration;
//el3.id = 'amtRow' + iteration;
//el3.size = 10;
//el3.value = 1.00;
//cellLast.appendChild(el3);
var cellRight = row.insertCell(4);
cellRight.setAttribute("align","center");
cellRight.setAttribute("valign","middle");
cellRight.innerHTML="<a href='#' onClick=\"deleteRow('tblSample');calculate();\"><img src='/images/minus_image.png' width='14' height='14' /></a>";
var el6 = document.createElement('input');
el6.type = 'hidden';
//el2.name = 'amtRow' + iteration;
el6.id = 'measureRow' + iteration;
el6.name = 'measureRow[]';
//el2.id = 'amtRow[]';
el6.size = 3;
el6.value = "";
el6.setAttribute("readonly","readonly");
cellRight.appendChild(el6);
}
function removeRowFromTable(a)
{
var tbl = document.getElementById('tblSample');
var lastRow = tbl.rows.length;
if (lastRow > 2) {tbl.deleteRow(a);}
var lastRow1 = tbl.rows.length;
document.getElementById('tot_row').value=lastRow1-1;

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
	var per_piece_weight=0.00;
//	var cookloss=0.00;
	var cookloss=parseFloat(document.getElementById('food_loss').value);
	var cook_loss_weight=0.00;
	var inc_cook_loss_weight=0.00;
	var finished_product=0.00;
	var inc_finished_product=0.00;
	var per_kg_cost=0.00;
	var inc_per_kg_cost=0.00;
	var per_piece_weight=0.05;
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
	var count = 0;
//	alert(qtyRow.length);
	for(i=0;i<qtyRow.length;i++)
	{
	var rr=qtyRow[i].value;
//		total=total+parseFloat(document.getElementById('qtyRow'+i).value);
		total=total+parseFloat((rr)*(1/parseFloat(unitRow[i].options[unitRow[i].selectedIndex].value)));
//		total_amt=total_amt+(parseFloat(document.getElementById('qtyRow'+i).value)*parseFloat(document.getElementById('rateRow'+i).value));
		total_amt=total_amt+(parseFloat(qtyRow[i].value*(1/parseFloat(unitRow[i].options[unitRow[i].selectedIndex].value)))*parseFloat(rateRow[i].value));
		total_rate=total_rate+parseFloat(rateRow[i].value);
	    amtrw=parseFloat(qtyRow[i].value*(1/parseFloat(unitRow[i].options[unitRow[i].selectedIndex].value)))*parseFloat(rateRow[i].value);
		amtRow[i].value=parseFloat(amtrw.toFixed(3));
	}
	document.getElementById('tot_qty').value=total.toFixed(3);
	document.getElementById('tot_amt').value=total_amt.toFixed(3);
	
	quantity=parseFloat(document.getElementById('tot_qty').value);
	quantity=parseFloat(quantity.toFixed(3));
	total_amount=document.getElementById('tot_amt').value;
	
	
//	cook_loss_weight=quantity*parseFloat(document.getElementById('food_loss').value);
	cook_loss_weight=quantity*parseFloat(cookloss/100);
	cook_loss_weight=parseFloat(cook_loss_weight.toFixed(4));
	finished_product=parseFloat(quantity-cook_loss_weight);
	finished_product=parseFloat(finished_product.toFixed(3));
	per_kg_cost=total_amount/finished_product;
	no_of_pieces=parseFloat(finished_product.toFixed(3)/per_piece_weight.toFixed(3));
	per_piece_cost=total_amount/no_of_pieces;
	per_piece_cost=parseFloat(per_piece_cost.toFixed(3));
//	yield=quantity.toFixed(3)/per_piece_cost.toFixed(3);
	yield=quantity.toFixed(3)/no_of_pieces.toFixed(3);
	new_formula=indent/yield;
	finished_cost=per_piece_cost*parseFloat(document.getElementById('profit').value)/100;
	total_weight=indent.toFixed(3)/yield.toFixed(3);
	document.getElementById('rcp_weight').value=document.getElementById('tot_qty').value;
	document.getElementById('food_loss').value=parseFloat(cookloss.toFixed(3));
	document.getElementById('finished_weight').value=finished_product.toFixed(3);
//	document.getElementById('numbers').value=quantity.toFixed(3);
	document.getElementById('numbers').value=no_of_pieces.toFixed(3);
	document.getElementById('yield').value=yield.toFixed(3);
	document.getElementById('selling_price').value=finished_cost.toFixed(3);
	document.getElementById('weight').value=per_piece_weight;
	document.getElementById('per_pc_cost').value=per_piece_cost.toFixed(3);
}