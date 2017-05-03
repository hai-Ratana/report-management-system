<!-- Modal -->
  <div class="modal fade" id="projecForm" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Project</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="{{ url('project') }}" method="post">
             {{ csrf_field() }}
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-3 control-label" for="textinput">Project:</label>  
          <div class="col-md-8">
          <input id="project" name="project" type="text" placeholder="input project name" class="form-control input-md" required="">
            
          </div>
        </div>

       <!-- Textarea -->
        <div class="form-group">
          <label class="col-md-3 control-label" for="textarea">Description:</label>
          <div class="col-md-8">                     
            <textarea class="form-control" id="description" name="description"></textarea>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-3 control-label" for="textinput">Duration:</label>  
          <div class="col-md-8">
          <input id="duration" name="duration" type="text" placeholder="input Duration" class="form-control input-md" required="">
            
          </div>
        </div>
       

       <!-- Textarea -->
        <div class="form-group">
          <label class="col-md-3 control-label" for="textarea">Other Info:</label>
          <div class="col-md-8">                     
            <textarea class="form-control" id="other" name="other"></textarea>
          </div>
        </div>
        <button id="sumit" type="sumit" name="save" class="btn btn-success">save</button>
  </form>
         
</div>
        <div class="modal-footer">
          
          <button id="button2id" name="button2id" class="btn btn-danger" data-dismiss="modal">reset</button>
          
        </div>
      </div>
   

    </div>
  </div>