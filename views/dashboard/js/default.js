/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
	
	$.get('dashboard/xhrGetListings', function(o) {
		
		for (var i = 0; i < o.length; i++)
		{
			$('#listInserts').append('<div>' + o[i].text + '<a class="del" rel="'+o[i].id+'" href="#">X</a></div>');
		}
                
                alert(2);
		
		/*$('.del').live('click', function() {
			delItem = $(this);
			var id = $(this).attr('rel');
			
			$.post('dashboard/xhrDeleteListing', {'id': id}, function(o) {
				delItem.parent().remove();
			}, 'json');
			
			return false;
		});*/
		
	}, 'json');
	
	
	
	$('#randomInsert').submit(function() {
            alert(1);
		var url =  $(this).attr('action');
                
		var data = $(this).serialize();
		alert(data);
		$.post(url, data, function(o) {
			$('#listInserts').append('<div>' + o.text + '<a class="del" rel="'+ o.id +'" href="#">X</a></div>');		
		}, 'json');
		
		
		return false;
	});

});


