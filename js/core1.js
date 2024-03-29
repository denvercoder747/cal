$(document).ready(function() { 
	/*place jQuery actions here*/ 
	var link = "/index.php/gredient";
	$("#msg").hide();
                                                //  GRADIENT ADD HERE WITH VALIDATION
	$("#addG").click(function() {
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
			ingRowInfo.text("Ingredient Name Should Not Blank!");
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
//  					$("#msg").show();
//					$("#msg").removeClass("error");
//					$("#msg").addClass("success");
//  					$("#msg").text('Ingredient Added Successfully');
  					$("#message_new").show();
					$("#message_new").removeClass("error");
					$("#message_new").addClass("success");
  					$("#message_new").text('Ingredient Added Successfully');
				});

    		}else{
  					$("#message_new").show();
					$("#message_new").removeClass("success");
					$("#message_new").addClass("error");
  					$("#message_new").text('Ingredient Already Exist');
    		}	
    		
 		 }); 

		return false;
	});

});
