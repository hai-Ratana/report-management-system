$(document).ready(function(){
    $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                  cache:false
              }
          });

// Tab user
      $(document).on('click','#users',function(){
          $('#frmUser').trigger("reset");
          $('#title-user').text('Create User');
          $('#frmUser').show();
          $('.warningmsg-user').hide();
          $('.action-user').addClass('storeUser');
          $('.action-user').removeClass('changeUser');
          $('.action-user').removeClass('deleteUser');
          $('#footer-btnsubmit-user').text("Insert");
      });

      $('.footer-users').on('click','.storeUser',function(){


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
                console.log(response);
              $('#frmUser').trigger("reset");
               $("#user-list").append(getRowUser(response.users));
              $('#userModal').modal('hide');

          }

        });

      });
  $(document).on('click','.edit-user',function(){
      $('#title-user').text('Edit User');
      $('#firstname').val($(this).data('fn') );
      $('#lastname').val($(this).data('ln'));
      $('#email').val($(this).data('email'));
      $('#role').val($(this).data('role'));
      $('#userId').val($(this).data('userid'));
      $('#frmUser').show();
      $('.warningmsg-user').hide();
      $('.action-user').addClass('changeUser');
      $('.action-user').removeClass('storeUser');
      $('.action-user').removeClass('deleteUser');
      $('#footer-btnsubmit-user').text("Edit");
      $('#userModal').modal('show');
});
  $('.footer-users').on('click','.changeUser',function(){
      var url = $(this).data('edit');
      var data = {
              id : $('#userId').val(),
              firstname : $('#firstname').val(),
              lastname : $('#lastname').val(),
              email : $('#email').val(),
              role : $('#role').val(),
              password : $('#password').val()};
      $.ajax({
          url:url,
          type:"POST",
          data:data,
          dataType:'JSON',
          success:function(response){
              var row = getRowUser(response.users);
              $('.user'+response.users.id).replaceWith(row);
               $('#userModal').modal('hide');
          }
      });
  });
  $(document).on('click','.remove-user',function(){
      $('#title-user').text('Delete User');
      $('#userId').val($(this).data('userid'));
      $('#frmUser').hide();
      $('#msgid-user').text($(this).data('fn')+' '+$(this).data('ln'));
      $('.warningmsg-user').show();

      $('.action-user').addClass('deleteUser');
      $('.action-user').removeClass('changeUser');
      $('.action-user').removeClass('storeUser');
      $('#footer-btnsubmit-user').text("Delete");
      $('#userModal').modal('show');
  });
  $('.footer-users').on('click','.deleteUser',function(){
      var url= $(this).data('delete');
      var id = $('#userId').val();


      $.ajax({
          url:url,
          type:'GET',
          data: id,
          dataType:'JSON',
          success:function(response){
            $('.user'+id).remove();
            $('#userModal').modal('hide');
          }
      });
  });
      function getRowUser(data){

      var userRow = "";
          userRow += '<tr class="user'+ data.id +'">';
          userRow += '<td>' + data.firstname + '</td>';
          userRow += '<td>' + data.lastname + '</td>';
          userRow += '<td>' + data.email + '</td>';
          if(data.role == 1){
               userRow += '<td> Adim </td>';
          }else{
              userRow += '<td> User </td>';
          }
          userRow += '<td>' + '.....' + '</td>';
          userRow += '<td>';
          userRow += '<button class="btn btn-primary edit-user" data-userid="'+ data.id +'"';
          userRow += ' data-fn="'+ data.firstname +'" data-ln="'+ data.lastname +'"';
          userRow += ' data-email="'+ data.email +'" data-role="'+ data.row +'">Edit</button>';
          userRow += ' <button class="btn btn-danger removeUser" ';
          userRow += 'data-userid="'+data.id+'" data-fn="'+data.firstname+'" data-ln="'+data.lastname+'">Delete</button>';
          userRow += '</td>';
          userRow += '</tr>';
        return userRow;
      }

// Tab Project

      $(document).on('click','#projectModal',function(){
          $('#frmProject').trigger("reset");
          $('.warningmsg').hide();
          $('#frmProject').show();
          $('#title-project').text('Create project');
          $('.action').addClass('storeProject');
          $('.action').removeClass('changeProject');
          $('.action').removeClass('deleteProject');
          $('#footer-btnsubmit').text("Insert");
      });

     $('.footer-project').on('click','.storeProject',function(){

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
                  $('#frmProject').show();
                  $('#title-project').text('Edit project');
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
          $('#frmProject').hide();
           $('#title-project').text('Delete project');

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
     $('.footer-project').on('click','.changeProject',function(){
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
     $('.footer-project').on('click','.deleteProject',function(){

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

  // event on calendar
  $('.timedatepicker').on('click','.active',function(){

        var day = $('#toDay').val();
        var url = $('#toDay').data('url');
        // alert(url);
        $.ajax({
          url:url,
          type:'GET',
          data:{day},
          dataType:'JSON',
          success:function(response){
            console.log(response);
            $('#projectID').val(response.datas.projectId);
            $('#project').val(response.datas.project);
            $('#breakTime').val(response.datas.breakTime);
            $('#startTime').val(response.datas.startTime);
            $('#endTime').val(response.datas.stopTime);
            $('#totalTime').val(response.datas.totalTime);
            $('#task').val(response.datas.task);
            $('#action').val(response.datas.action);
            $('#knowledge').val(response.datas.knowledge);
            $('#impression').val(response.datas.impression);
            $('#userID').val(response.datas.idUser);
            $('#reportId').val(response.datas.id);
          }
        });


  });
  //report-list
  $(document).on('click','.removeReport', function(){
      var url = $(this).data('url');
      var id = $(this).data('id');
      $.ajax({
          url:url,
          type:'GET',
          data:{id},
          success:function(response){
            $('.report'+id).remove();

          }
      });
  });
  $(document).on('click','.editReport',function(){
    var url = $(this).data('url');
    var id = $(this).data('id');
    $.ajax({
      url:url,
      type:'GET',
      data:{id},
      dataType:'JSON',
      success:function(response){
        $('#projectID').val(response.edit.projectId);
        $('#project').val(response.edit.project);
        $('#breakTime').val(response.edit.breakTime);
        $('#startTime').val(response.edit.startTime);
        $('#endTime').val(response.edit.stopTime);
        $('#totalTime').val(response.edit.totalTime);
        $('#task').val(response.edit.task);
        $('#action').val(response.edit.action);
        $('#knowledge').val(response.edit.knowledge);
        $('#impression').val(response.edit.impression);
        $('#userID').val(response.edit.idUser);
        $('#reportId').val(response.edit.id);
        $('.nav-tabs a[href="#new"]').tab('show');


      }
    });
  });

  //pagination
  // $(document).on('click','.pagination a',function(e)){
  //   e.preventDefault();
  //   console.log($(this).attr('href').split('page=')[0]);
  // });

});
