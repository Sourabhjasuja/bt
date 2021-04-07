function delConfirm(id){
	if(confirm('Are you you want to delete the Entry!')){
		window.location.href='?del='+id;
	}
}
function delConfirmCom(table, id, type){
	if(confirm('Are you you want to delete the Entry!')){
		$.ajax({ type:'POST', url: base_url+"/deleteEntry", data: {table:table, id:id, type:type, _token:form_token},
            success: function(result){
            	window.location.reload();
            }
        });
	}
}
$(document).ready(function(){
	$('.simpleDataTable').DataTable();

	$('.timepicker').timepicker({
	    timeFormat: 'h:mm p',
	    interval: 60,
	    minTime: '12:00am',
	    maxTime: '11:59pm',
	    //defaultTime: '11',
	    startTime: '10:00',
	    dynamic: true,
	    dropdown: true,
	    scrollbar: false
	});
	$('.datepicker').datepicker();
	$( ".search_inventory" ).autocomplete({
      source: base_url+"/inventory/search",
      minLength: 2,
      select: function( event, ui ) {
        $.ajax({ url: base_url+"/inventory/getInventory/"+ui.item.id,
            success: function(result){
                if(result.info=="success"){
                	$("input[name=s_item_name]").val(result.data.name);
                	$("input[name=s_item_id]").val(result.data.id);
                	$(".searchInventory").show();
                	$(".searchForm").hide();
                }else{
                	alert("some error occured");
                }
            }
        });
      }
    });

    if(window.location.hash) {
		var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
      	$('[data-toggle="tab"][href="#'+hash+'"]').trigger('click');
	}
	$('[data-toggle="tab"]').click(function(){
		window.location.hash = $(this).attr('href');
	});
	$('.editPricing').click(function(){
		var id = $(this).attr('data-id');
		$.ajax({
			url: base_url+"/inventory/getPricing/"+id,
			success: function(result){
				if(result.info=="success"){
					$.each(result.data, function( index, value ) {
					  	$('input[name='+index+']').val(value);
					  	$('select[name='+index+']').val(value);
					});
					$('.pricingForm').show();$('.pricingTable').hide();
				}else{
					alert("some error occured");
				}
			}
		});
	});
	$( ".search_inventory_trans" ).autocomplete({
      source: base_url+"/inventory/search",
      minLength: 2,
      select: function( event, ui ) {
        $.ajax({ url: base_url+"/inventory/getInventory/"+ui.item.id,
            success: function(result){
                if(result.info=="success"){
                	window.location.href='?item_no='+result.data.id;
                }else{
                	alert("some error occured");
                }
            }
        });
      }
    });
    $('.addSerialNumber').click(function(){
    	$('.serialNumberTable tbody').append('<tr><td><input type="number" min="1" name="serial_qty[]" value="1" readonly></td><td><input type="text" name="serial_number[]" required></td> <td><input type="text" name="asset_number[]"></td><td><a href="javascript:void(0)" class="btn btn-sm rmSerialNumber"><i class="fas fa-trash text-danger"></i></a></td> </tr>');
    	var qty = $('input[name=qty]').val();
    	$('input[name=qty]').val(parseInt(qty)+1);
    	$('input[name=bill_qty]').val(parseInt(qty)+1);
    });
    $('.serialNumberTable').on('click', '.rmSerialNumber', function(){ 
    	$(this).closest('tr').remove();
    	var qty = $('input[name=qty]').val();
    	$('input[name=qty]').val(parseInt(qty)-1);
    	$('input[name=bill_qty]').val(parseInt(qty)-1);
    });
});

