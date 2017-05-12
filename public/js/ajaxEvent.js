$(document).ready(function(){
		 $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                cache:false
            }
        })
        

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

   $('#storeProject').on('click',function(){
    
        var url = $(this).data('url');

        var Data ={
                 nameProject : $('#nameProject').val(),
                 description : $('#description').val(),
                 duration : $('#duration').val(),
                 other : $('#other').val()
                };
       
        $.ajax({
            url:url,
            type:'POST',
            data:Data,
            dataType:'JSON',
            success:function(response){
                var project = "";
                    project += '<tr>';
                    project +=  '<td>OOP'+ response.datas.id +'</td>';
                    project +=  '<td>'+ response.datas.nameProject +'</td>';
                    project +=  '<td>'+ response.datas.description +'</td>';
                    project +=  '<td>'+ response.datas.duration +'</td>';
                    project +=  '<td>'+ response.datas.other +'</td>';
                    project +=  '<td>';
                    project +=  '<button class="btn btn-primary">Edit</button>';
                    project +=  ' <button class="btn btn-danger">Delete</button>';
                    project +=  '</td>';
                    project += '</tr>';
                $('#frmProject').trigger("reset");
                $("#project-list").append(project);
                $('#projecForm').modal('hide');
            }
        });

   });

});