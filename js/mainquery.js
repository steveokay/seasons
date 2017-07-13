$(document).ready(function(){
	//get the prize

	$(".qty").bind('input',function(){ 
		//get the prize
		var price_and_currency = $(this).closest('tr').find('.product-price').text();
		var quantity = $(this).val();
		// alert(price_and_currency);
		//get the quantity value

		//split to get the prize only
		var ret = price_and_currency.split(" ");
		var price = ret[1];
		var curr = ret[0];

		//convert price to integer
		var prize = parseInt(price);
		var qty = parseInt(quantity);
		//calculate the total
		var total = prize * qty;

		if($.isNumeric(qty)){
			$(this).closest('tr').find('.total').val(total);
		}else{
			$(this).closest('tr').find('.total').val('0.00');
		}
	});

	// $(".search").keyup(function(e){
		
	// 	//once button pressed use ajax to pass the query to the server side to get the search details
	// 	$.ajax({
	// 		type: "POST",
	// 		url : "get_products.php",
	// 		data:
	// 	});

	// });

});