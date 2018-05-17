jQuery(document).ready(function($){
    $(".app_coupon_code").click(function(){
    	var coupon = $('.apply_coupon').val();
    	//$('.apply_coupon').val('');
		$.ajax({
				url : global.ajax_url,
				type : 'post',
				data : {
					action : 'post_coupon_code_to_order',
					coupon_code : coupon
				},
				success : function( response ) {
					//alert(response);
				}
			});

	});

/*	$('.next_coupon').click(function(){
		document.getElementById('tab_coupon').click();
	});*/


	$('button').click(function(){
		var current_element = $(this);
		//document.getElementById('tab_coupon').click();
		if(current_element.hasClass("next_coupon")){document.getElementById('tab_coupon').click();}
		else if(current_element.hasClass("next_billing_shipping")){document.getElementById('tab_billing_shipping').click();}
			else if(current_element.hasClass("next_order_payment")){document.getElementById('tab_order_payment').click();}
				else if(current_element.hasClass("previous_tab_billing")){document.getElementById('tab_billing_shipping').click();}
					else if(current_element.hasClass("previous_billing_shipping")){document.getElementById('tab_coupon').click();}
						else if(current_element.hasClass("previous_coupon")){document.getElementById('tab_login').click();}

	});

	$('.btn_customer_details').click(function(){
		var formdata = $('#custom_billing_form').serialize();
		var datas = {'action':'submit_billing_form_data',formdata};
		var queryString = 'action=submit_billing_form_data&' + formdata;
		//alert(queryString);
				$.ajax({
				url : global.ajax_url,
				type : 'post',
				data: queryString,
				/*data : {
						action : 'submit_billing_form_data',
						formdata
				},*/
				success : function( response ) {
					alert(response);
				}
			});


	});

// google address copy event
$('.get_google_address').change(function() {
        if($(this).is(":checked")) {
            var returnVal = confirm("Are you sure?");
            $(this).attr("checked", returnVal);
			var google_address = localStorage.getItem("google_address")
            $('#google_address').val(google_address);
            $('.alert-success').show('fast');
            $(".alert-success").fadeOut(2500);
            //alert(google_address);

        }
        //$('#textbox1').val($(this).is(':checked'));        
    });







});	// jquery end here