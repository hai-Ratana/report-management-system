$(document).ready(function(){
		$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
    $('#saveUser').on('click',function(e){
         e.preventDefault();
        var index = $(this).data('count');
    	var url = $(this).data('url');
    	var data = {
		    		firstname : $('#firstname').val(),
		    		lastname : $('#lastname').val(),
		    	 	email : $('#email').val(),
		    		role : $('#role').val(),
		    		password : $('#password').val()
    			};
            

    	$.ajax({
    		url: url,
    		type:'POST',
    		data : data,
    		dataType:'JSON',
    		success:function(response){
    			
                var product = "";
                
                    product += '<tr >';
                    product += '<td>' + (index+1) + '</td>';
                    product += '<td>' + response.users.firstname + '</td>';
                    product += '<td>' + response.users.lastname + '</td>';
                    product += '<td>' + response.users.email + '</td>';
                    if(response.users.role == 1){
                         product += '<td> Adim </td>';
                    }else{
                        product += '<td> User </td>';
                    }
                    
                    product += '<td>' + '.....' + '</td>';
                    product += '<td>';
                    product += '<button class="btn btn-primary">Edit</button>';
                    product += ' <button class="btn btn-danger">Delete</button>';
                    product += '</td>';
                    product += '</tr>';
              
                $('#frmUser').trigger("reset");
                $("#user-list").append(product);
            $('#userModal').modal('hide');
    		}
    	});
    });

    $('#saveProject').on('click',function(e){
         e.preventDefault();
        var url = $(this).data('url');
        var data = {
                    project: $('#project').val(),
                    description: $('#description').val(),
                    duration:$('#duration').val(),
                    other:$('#other').val()
                };
            

        $.ajax({
            url: url,
            type:'POST',
            data : data,
            dataType:'JSON',
            success:function(response){
                
                var tb = "";
                
                    tb += '<tr >';
                   tb += '<td> OOP' + response.datas.id + '</td>';
                    tb += '<td>' + response.datas.project + '</td>';
                    tb += '<td>' + response.datas.description + '</td>';
                    tb += '<td>' + response.datas.duration + '</td>';
                    tb += '<td>' + response.datas.other + '</td>';
                    tb += '<td>';
                    tb += '<button class="btn btn-primary">Edit</button>';
                    tb += ' <button class="btn btn-danger">Delete</button>';
                    tb += '</td>';
                    tb += '</tr>';
              
                $('#frmProject').trigger("reset");
                $("#project-list").append(tb);
            $('#projecForm').modal('hide');
            }
        });
    })

});