<!-- Modal -->
  <div class="modal fade" id="userModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create User</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="frmUser"  >
           
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">First Name:</label>  
          <div class="col-md-4">
          <input id="firstname" name="firstname" type="text" placeholder="First Name" class="form-control input-md" required="">
            
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Last Name:</label>  
          <div class="col-md-4">
          <input id="lastname" name="lastname" type="text" placeholder="last name" class="form-control input-md" required="">
            
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Email:</label>  
          <div class="col-md-4">
          <input id="email" name="email" type="email" placeholder="email" class="form-control input-md" required="">
            
          </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="selectbasic">Role:</label>
          <div class="col-md-4">
            <select id="role" name="role" class="form-control">
              <option value="1">admin</option>
              <option value="2">user</option>
            </select>
          </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="passwordinput">Password: </label>
          <div class="col-md-4">
            <input id="password" name="password" type="password" placeholder="password" class="form-control input-md" required="">
            
          </div>
        </div>
        
        </form>
         
        </div>
        <div class="modal-footer">
          <button id="saveUser" data-count="{!! $users->count() !!}"  class="btn btn-success" data-url="{{ url('create/user/ajax') }}">save</button>
          <button id="" name="button2id" class="btn btn-danger" data-dismiss="modal">reset</button>
          
        </div>
      </div>
   

    </div>
  </div>