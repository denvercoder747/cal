$(document).ready(function() { 
	/*place jQuery actions here*/ 
	var link = "/index.php/gredient";
	
//	$("#dv_edit").hide();
//	$(".edit_tr").click(function()
	$(".editlnk").click(function()
		{	
		var ID=$(this).attr('id');
		$("#first_"+ID).hide();
		$("#second_"+ID).hide();
		$("#third_"+ID).hide();
		$("#fourth_"+ID).hide();
		$("#fifth_"+ID).hide();
		$("#six_"+ID).hide();
		$("#seven_"+ID).hide();
		$("#eight_"+ID).hide();
		$("#nine_"+ID).hide();
//		$("#last_"+ID).hide();
		$("#first_input_"+ID).show();
		$("#second_input_"+ID).show();
		$("#third_input_"+ID).show();
		$("#fourth_input_"+ID).show();
		$("#fifth_input_"+ID).show();
		$("#six_input_"+ID).show();
		$("#seven_input_"+ID).show();
		$("#eight_input_"+ID).show();
		$("#nine_input_"+ID).show();
		$("#ten_input_"+ID).show()
		$("#tweleve_input_"+ID).show()
$(".editlnk").hide();
});
/*$(".editbox").mouseup(function() 
{
return false
});
*/
// Outside click action
//$(document).mouseup(function()
$('.editbot').click(function()
{
$(".editbox").hide();
$(".editbot").hide();
$(".text").show();
});
                                                //  GRADIENT ADD HERE WITH VALIDATION
	$("#addG").click(function() {
		// Get the product ID and the quantity 
/*		var id = $(this).find('input[name=product_id]').val();
		var qty = $(this).find('input[name=quantity]').val();
		//alert('ID:' + id + '\n\rQTY:' + qty);  
		 $.post(link + "cart/add_cart_item", { product_id: id, quantity: qty, ajax: '1' },
*/		
	var ingRow = $("#ingRow");
	var rateRow = $("#rateRow");
	var qtyRow1 = $("#qtyRow");
	var ingRowInfo = $("#ingRowInfo");
	var rateRowInfo = $("#rateRowInfo");
	var qtyRowInfo = $("#qtyRowInfo");
//		if(validateGradients() & validateName() & validateMessage() )
	function validateGre(){
		//if it's NOT valid
		if(ingRow.val().length < 1){
			ingRow.addClass("error_bord");
			ingRowInfo.text("Gredient Name Should Not Blank!");
			ingRowInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			ingRow.removeClass("error_bord");
			ingRowInfo.text("");
			ingRowInfo.removeClass("error");
			return true;
		}
	}
	function validateRate(){
		//if it's NOT valid
		if(rateRow.val() <= 0){
			rateRow.addClass("error_bord");
			rateRowInfo.text("Rate must be valid!");
			rateRowInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			rateRow.removeClass("error_bord");
			rateRowInfo.text("");
			rateRowInfo.removeClass("error");
			return true;
		}
	}
	function validateQty(){
		//if it's NOT valid
		if(qtyRow1.val() <= 0){
			qtyRow1.addClass("error_bord");
			qtyRowInfo.text("Quantity should be Valid!");
			qtyRowInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			qtyRow1.removeClass("error_bord");
			qtyRowInfo.text("");
			qtyRowInfo.removeClass("error");
			return true;
		}
	}
		
		if(validateGre() && validateQty() && validateRate()){
//			return true;
			}
		else{
			return false;
			}
			
		var ingRow = $("#ingRow").val();
		var qtyRow = $("#qtyRow").val();
		var measure = $("#measure").val();
		var measure1 = $("#measure").find("option:selected").text();
		var rateRow = $("#rateRow").val();
		var amtKg = $("#amtKg").val();
		var purFrom = $("#purFrom").val();
		var brand = $("#brand").val();
		var contact = $("#contact").val();
		 $.post(link + "/add_gredient", { ingRow: ingRow, qtyRow: qtyRow,measure: measure,measure1: measure1,rateRow: rateRow,amtKg: amtKg,purFrom: purFrom,brand: brand,contact: contact, ajax: '1' },
  			function(data){
  			if(data == 'true'){
    			
    			$.get(link + "/show_gredient", function(cart){
//  					$("#cart_content").html(cart);
  					$("#display").html(cart);
				});

    		}else{
    			alert("Gredient Already Exist");
    		}	
    		
 		 }); 

		return false;
	});
	$(".cancellnk").click(function()
	{
		 $.post(link + "/show_gredient", { ajax: '1' },
  			function(data){
  			if(data == 'true'){
//    		alert(ingRow);	
    			$.get(link + "/show_gredient", function(cart){
//  					$("#cart_content").html(cart);
  					$("#display").html(cart);
				});

    		}else{
    			$.get(link + "/show_gredient", function(cart){
  					$("#display").html(cart);
				});
    		}	
    		
 		 }); 
	});
//$("#measure").change(function() {
//    alert($("#measure").find("option:selected").text()+' clicked!');
//});	
	
});
	function saveg(ID)
	{

		var ingId = $("#ten_input_"+ID).val();
		var ingRow = $("#first_input_"+ID).val();
		var qtyRow = $("#second_input_"+ID).val();
		var measure = $("#third_input_"+ID).val();
		var measure1 = $("#third_input_"+ID).find("option:selected").text();
		var rateRow = $("#fourth_input_"+ID).val();
		var amtKg = $("#fifth_input_"+ID).val();
		var purFrom = $("#six_input_"+ID).val();
		var brand = $("#seven_input_"+ID).val();
		var contact = $("#eight_input_"+ID).val();
	var link = "/index.php/gredient";
		 $.post(link + "/edit_gredient", { ingId: ingId,ingRow: ingRow, qtyRow: qtyRow,measure: measure,measure1: measure1,rateRow: rateRow,amtKg: amtKg,purFrom: purFrom,brand: brand,contact: contact, ajax: '1' },
  			function(data){
  			if(data == 'true'){
//    		alert(ingRow);	
    			$.get(link + "/show_gredient", function(cart){
//  					$("#cart_content").html(cart);
  					$("#display").html(cart);
				});

    		}else{
    			$.get(link + "/show_gredient", function(cart){
  					$("#display").html(cart);
				});
    			alert("Gredient Already Exist");
    		}	
    		
 		 }); 
//		alert('clicked');

		return false;
	}
