$(document).ready(function(){
    $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                  cache:false
              }
          });
          

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

      $(document).on('click','#projectModal',function(){
          $('#frmProject').trigger("reset");
          $('.warningmsg').hide();
          $('.form-horizontal').show();
          $('.modal-title').text('Create project');
          $('.action').addClass('storeProject');
          $('.action').removeClass('changeProject');
          $('.action').removeClass('deleteProject');
          $('#footer-btnsubmit').text("Insert");
      });

     $('.modal-footer').on('click','.storeProject',function(){
      
          var url = $(this).data('add');

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
                  
                  
                  $('#frmProject').trigger("reset");
                  $("#project-list").append(getRow(response.datas));
                  $('#projecForm').modal('hide');
              }
          });

     });
     $(document).on('click','.edit',function(){
                  $('.warningmsg').hide();
                  $('.form-horizontal').show();
                  $('.modal-title').text('Edit project');
                  $('.action').addClass('changeProject');
                  $('.action').removeClass('deleteProject');
                  $('.action').removeClass('storeProject');
                  $('#footer-btnsubmit').text("Edit");
                  $('#nameProject').val($(this).data('name'));
                  $('#description').val($(this).data('desc'));
                  $('#duration').val($(this).data('duration'));
                  $('#other').val($(this).data('other'));
                  $('#idProject').val($(this).data('id'));
                  $('#projecForm').modal('show');
     });
     $(document).on('click','.removeProject',function(){
          $('.warningmsg').show();
          $('#msgid').text($(this).data('name'));
          $('.form-horizontal').hide();
           $('.modal-title').text('Delete project');

           $('#idProject').val($(this).data('id'));
            $('.action').addClass('deleteProject');
             $('.action').removeClass('changeProject');
             $('.action').removeClass('storeProject');
            $('#footer-btnsubmit').text("Delete");
          $('#projecForm').modal('show');
     });
     // $('#projectModal').on('click',function(){
     //       $('#frmProject').trigger("reset");
          
     //      $('#storeProject').removeClass('hidden');
     // });
     $('.modal-footer').on('click','.changeProject',function(){
          var url = $(this).data('edit-url');
          var id = $('#idProject').val();
          var data = {
                  nameProject : $('#nameProject').val(),
                   description : $('#description').val(),
                   duration : $('#duration').val(),
                   other : $('#other').val()
                  };
          $.ajax({
              url:url+'/'+id,
              type:'POST',
              data:data,
              dataType:'JSON',
              success:function(response){
                  
                  
                  $('.project'+ response.data.id).replaceWith(getRow(response.data));
                  $('#projecForm').modal('hide');
              }
          });
     });
     $('.modal-footer').on('click','.deleteProject',function(){

            var id = $('#idProject').val();
            var url = $(this).data('url');
            
            $.ajax({
                url: url+'/'+id,
                type:'GET',
                success:function(response){
                 $('.project'+id).remove();
                 $('#projecForm').modal('hide');
                }
            });
     });

  function getRow(data){
        var row ="";
        row += "<tr class='project"+ data.id +"'>";
        row += "<td>OOP"+ data.id +"</td>";
        row += "<td>"+ data.nameProject + "</td>";
        row += "<td>"+ data.description + "</td>";
        row += "<td>"+ data.duration + "</td>";
        row += "<td>"+ data.other + "</td>";
        row += "<td>";
        row += "<button class='btn btn-primary edit '";
        row += " data-id='"+ data.id +"' ";
        row += "data-name='"+ data.nameProject +"' data-desc='"+ data.description +"'";
        row += "data-duration='"+ data.duration +"' data-other='"+ data.other +"'";
        row += " >Edit</button>";
        row += ' <button class="btn btn-danger removeProject"';
        row += ' data-name="'+data.nameProject+'" data-id="'+data.id+'"';
        row += '>Delete</button>';
        row +=  '</td>';
        row += '</tr>';
       return row;
  };

  $('.filterReport').on('click',function(){
      var url = $(this).data('url');
      var input = $('#month').val();
      var strCut = input.split('/');
     
      var data = { month:strCut[0],year:strCut[1]};
      $.ajax({
        url:url,
        type:'GET',
        data:data,
        dataType:'JSON',
        success:function(response){
          console.log(response.report);
          var row = '';
          $.each(response.report,function(index,value){
             
              row +='<tr>';
              row +='<td>'+(index+1)+'</td>';
              row +='<td>'+ value.created_at+'</td>';
              row +='<td>OOP'+value.id+'</td>';
              row +='<td>'+value.project+'</td>';
              row +='<td>'+value.startTime+'</td>';
              row +='<td>'+value.stopTime+'</td>';
              row +='<td>'+value.breakTime+'</td>';
              row +='<td>'+value.task+'</td>';
              row +='<td>'+value.action+'</td>';
              row +='<td>'+value.totalTime+'</td>';
              row +='</tr>';
            });
          $('#report-list').html(row);
          
        }
      });
  });

  $('#clickDay').click(function(){
    alert('hello');
  });

});
		 