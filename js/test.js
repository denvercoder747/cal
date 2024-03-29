function ref()
{
document.getElementById('tot_row').value=0;
document.getElementById('tot_qty').value=0;
document.getElementById('tot_amt').value=0;
document.getElementById('rcp_weight').value=0;
document.getElementById('food_loss').value=0;
document.getElementById('finished_weight').value=0;
document.getElementById('weight').value=0;
document.getElementById('per_pc_cost').value=0;
document.getElementById('numbers').value=0;
document.getElementById('yield').value=0;
document.getElementById('profit').value=0;
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
function addIng(){
var tbl = document.getElementById('tblSample');
var lastRow = tbl.rows.length;
document.getElementById('tot_row').value=lastRow;
// if there's no header row in the table, then iteration = lastRow + 1
var iteration = lastRow;
var row = tbl.insertRow(lastRow);

// left cell
var cellLeft = row.insertCell(0);
var el = document.createElement('input');
el.type = 'text';
el.name = 'ingRow' + iteration;
el.id = 'ingRow' + iteration;
el.setAttribute("class","gradient");
el.size = 40;
cellLeft.appendChild(el);

// middle1 cell
var middle1 = row.insertCell(1);
var el4 = document.createElement('input');
el4.type = 'text';
el4.name = 'qtyRow' + iteration;
el4.id = 'qtyRow' + iteration;
el4.size = 10;
el4.value = 1.00;
el4.setAttribute("class","quantity_t");
//el4.onKeyUp = document.getElementById('').value=document.getElementById('').value+this.value;
el4.setAttribute("onKeyUp","calculate();");
middle1.appendChild(el4);
//var middle1 = row.insertCell(1);
var el5 = document.createElement('select');
el5.id = 'unitRow' + iteration;
	var textArr=new Array();
	var valArr = new Array();
textArr=("kilo","kilo","kilo");
valArr=(10,10,10);
a=textArr.length;
alert(a);
/*	var option = document.createElement("option");
	option.text = Array("kilo","kilo","kilo");
	option.value = 1;
*/	
	
try {
		el5.add(option, null); //Standard 
	}catch(error) {
		el5.add(option); // IE only
	}	middle1.appendChild(el5);
	var option = document.createElement("option");
	option.text = "litre";
	option.value = 1;
try {
		el5.add(option, null); //Standard 
	}catch(error) {
		el5.add(option); // IE only
	}	middle1.appendChild(el5);
	var option = document.createElement("option");
	option.text = "cup";
	option.value = 4.35;
try {
		el5.add(option, null); //Standard 
	}catch(error) {
		el5.add(option); // IE only
	}	
	var option = document.createElement("option");
	option.text = "gram";
	option.value = 1000;
try {
		el5.add(option, null); //Standard 
	}catch(error) {
		el5.add(option); // IE only
	}	
	var option = document.createElement("option");
	option.text = "tsp";
	option.value = 200;
try {
		el5.add(option, null); //Standard 
	}catch(error) {
		el5.add(option); // IE only
	}	
	var option = document.createElement("option");
	option.text = "tbsp";
	option.value = 66.67;
try {
		el5.add(option, null); //Standard 
	}catch(error) {
		el5.add(option); // IE only
	}	
	var option = document.createElement("option");
	option.text = "ounce";
	option.value = 35.71;
try {
		el5.add(option, null); //Standard 
	}catch(error) {
		el5.add(option); // IE only
	}	
	var option = document.createElement("option");
	option.text = "pound";
	option.value = 2.20;
try {
		el5.add(option, null); //Standard 
	}catch(error) {
		el5.add(option); // IE only
	}	
el5.setAttribute("onChange","calculate();");
	middle1.appendChild(el5);
// Middle2 cell
var middle2 = row.insertCell(2);
var el1 = document.createElement('input');
el1.type = 'text';
el1.name = 'rateRow' + iteration;
el1.id = 'rateRow' + iteration;
el1.size = 10;
el1.value = 1.00;
//el1.setAttribute("readonly","readonly");
el1.setAttribute("onKeyUp","calculate();");
middle2.appendChild(el1);
// right cell
var cellRight = row.insertCell(3);
var el2 = document.createElement('input');
el2.type = 'text';
el2.name = 'amtRow' + iteration;
el2.id = 'amtRow' + iteration;
el2.size = 10;
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
}
function removeRowFromTable()
{
var tbl = document.getElementById('tblSample');
var lastRow = tbl.rows.length;
if (lastRow > 2) {tbl.deleteRow(lastRow - 1);}
var lastRow1 = tbl.rows.length;
document.getElementById('tot_row').value=lastRow1-1;

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
	for(i=1;i<=document.getElementById('tot_row').value;i++)
	{
//		total=total+parseFloat(document.getElementById('qtyRow'+i).value);
		total=total+parseFloat(document.getElementById('qtyRow'+i).value*(1/parseFloat(document.getElementById('unitRow'+i).value)));
//		total_amt=total_amt+(parseFloat(document.getElementById('qtyRow'+i).value)*parseFloat(document.getElementById('rateRow'+i).value));
		total_amt=total_amt+(parseFloat(total)*parseFloat(document.getElementById('rateRow'+i).value));
		total_rate=total_rate+parseFloat(document.getElementById('rateRow'+i).value);
	    amtrw=parseFloat(total)*parseFloat(document.getElementById('rateRow'+i).value);
		document.getElementById('amtRow'+i).value=parseFloat(amtrw.toFixed(3));
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
	finished_cost=per_piece_cost*3;
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
//	per_piece_weight=parseFloat(document.getElementById('weight').value);
//	document.getElementById('finished_weight').value=per_piece_cost;
//	alert(total_amount);
//	alert(per_piece_cost);
	document.getElementById('per_kilo_cost').value=per_kg_cost.toFixed(3);
	var v="<table width='50%' border='0' cellspacing='2' cellpadding='2'>"
	v+="<tr><td>yield</td><td>"+yield+"</td></tr>";
	v+="<tr><td>inc</td><td>"+inc+"</td></tr>";
	v+="<td>quantity</td><td>"+quantity+"</td></tr>";
	v+="<td>per_piece_weight</td><td>"+per_piece_weight+"</td></tr>";
	v+="<td>cookloss</td><td>"+cookloss+"</td></tr>";
	v+="<td>cook_loss_weight</td><td>"+cook_loss_weight+"</td></tr>";
	v+="<td>inc_cook_loss_weight</td><td>"+inc_cook_loss_weight+"</td></tr>";
	v+="<td>finished_product</td><td>"+finished_product+"</td></tr>";
	v+="<td>inc_finished_product</td><td>"+inc_finished_product+"</td></tr>";
	v+="<td>per_kg_cost</td><td>"+per_kg_cost+"</td></tr>";
	v+="<td>inc_per_kg_cost</td><td>"+inc_per_kg_cost+"</td></tr>";
	v+="<td>per_piece_weight</td><td>"+per_piece_weight+"</td></tr>";
	v+="<td>no_of_pieces</td><td>"+no_of_pieces+"</td></tr>";
	v+="<td>per_piece_cost</td><td>"+per_piece_cost+"</td></tr>";
	v+="<td>finished_cost</td><td>"+finished_cost+"</td></tr>";
	v+="<td>inc_finished_cost</td><td>"+inc_finished_cost+"</td></tr>";
	v+="<td>new_formula</td><td>"+new_formula+"</td></tr>";
	v+="<td>amount</td><td>"+amount+"</td></tr>";
	v+="<td>total_amount</td><td>"+total_amount+"</td></tr>";
	v+="<td>total_rate</td><td>"+total_rate+"</td></tr>";
v+="</table>";
//	document.getElementById('test').innerHTML=v;
//	document.getElementById('test').innerHTML="";
}// JavaScript Document