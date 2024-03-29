function new_formula(v)
{
	var yield=0.00;
	var inc=32;
	var per_piece_weight=document.getElementById('weight'+v).value;
	var inc_cook_loss_weight=0.00;
	var inc_finished_product=0.00;
	var inc_per_kg_cost=0.00;
	var inc_no_of_pieces=0.00;
	var inc_per_piece_cost=0.00;
	var inc_finished_cost=0.00;
	var new_formula=0.00;
	var amount=0.00;
	var total_amount=0.00;
	var total_rate=0.00;
	var indent=230;
	var new_formula=0;
	var total_weight=0;
	var profit=parseFloat(document.getElementById('profit'+v).value);
	
	
	var new_formula=parseFloat(document.getElementById('indent'+v).value)*parseFloat(document.getElementById('yield'+v).value);
	inc_cook_loss_weight=new_formula*parseFloat(document.getElementById('inc_cook_loss'+v).value)*100;
	inc_finished_product=parseFloat(new_formula-inc_cook_loss_weight);
	inc_per_kg_cost=(parseFloat(document.getElementById('total_price'+v).value)*inc)/inc_finished_product;
	inc_no_of_pieces=(inc_finished_product/parseFloat(per_piece_weight));
	inc_per_piece_cost=(parseFloat(document.getElementById('total_price'+v).value)*inc)/inc_no_of_pieces;
//	inc_finished_cost=inc_per_piece_cost+(inc_per_piece_cost*parseFloat(document.getElementById('profit'+v).value)/100);
	inc_finished_cost=inc_per_piece_cost*parseFloat(document.getElementById('profit'+v).value)/100;
	
	document.getElementById('per_kilo_cost'+v).value=parseFloat(inc_per_kg_cost).toFixed(2);
	document.getElementById('per_pc_cost'+v).value=parseFloat(inc_per_piece_cost).toFixed(2);
	document.getElementById('selling_price'+v).value=parseFloat(inc_finished_cost).toFixed(2);
	
//	document.getElementById('new_formula'+v).value=parseFloat(new_formula);
//	document.getElementById('inc_cook_loss'+v).value=parseFloat(inc_cook_loss_weight);
//	document.getElementById('inc_finished_weight'+v).value=parseFloat(inc_finished_product);
//	document.getElementById('inc_per_kg_cost'+v).value=parseFloat(inc_per_kg_cost);
//	document.getElementById('inc_no_pices'+v).value=parseFloat(inc_no_of_pieces);
//	document.getElementById('inc_per_pc_cost'+v).value=parseFloat(inc_per_piece_cost);
//	document.getElementById('inc_finished_cost'+v).value=parseFloat(inc_finished_cost);
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
		total_amt=total_amt+(parseFloat(document.getElementById('qtyRow'+i).value*(1/parseFloat(document.getElementById('unitRow'+i).value)))*parseFloat(document.getElementById('rateRow'+i).value));
		total_rate=total_rate+parseFloat(document.getElementById('rateRow'+i).value);
	    amtrw=parseFloat(document.getElementById('qtyRow'+i).value*(1/parseFloat(document.getElementById('unitRow'+i).value)))*parseFloat(document.getElementById('rateRow'+i).value);
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
}
