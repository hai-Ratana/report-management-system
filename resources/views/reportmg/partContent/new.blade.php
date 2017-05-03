<form class="form-horizontal">
<div class="row">
  

<div class="col-lg-8">
    <!-- project ID -->
    @if(!empty($projects))
    <div class="form-group ">
      <label class="col-md-1 control-label" for="selectbasic">project ID</label>
        <div class="col-md-3">
        <select  id="projectID" name="projectID" class=" form-control">
          @foreach($projects as $key => $projectID)
          <option value="{{!! $projectID->id !!}}">00P{!! $projectID->id !!}</option>
          @endforeach
        </select>
        </div>
        <label class="col-md-1 control-label" for="selectbasic">project</label>
       <div class="col-md-3">
        <select id="project" name="project" class="  form-control">
          @foreach($projects as $key => $project)
          <option value="{{!! $project->project !!}}">{!! $project->project !!}</option>
          @endforeach
          
        </select>
      </div>
      <label class="col-md-1 control-label" for="textinput">Total Time</label>  
      <div class="col-md-3">
      <input id="totalTime" name="totalTime" placeholder="Total Time" class=" form-control input-md" required="" type="text">
       </div> 
      
    </div>

    @endif

 
    <!-- Start Time-->
    <div class="form-group">
      <label class=" col-md-1 control-label" for="textinput">Start Time</label>
      <div class="col-md-3">
        <input id="startTime" name="startTime" placeholder="hh:mm:ss" class="form-control input-md" required="" type="text">
      </div>  
       <label class="col-md-1 control-label" for="textinput">Stop Time</label> 
      <div class="col-md-3">
        <input id="stopTime" name="stopTime" placeholder="hh:mm:ss" class="form-control input-md" required="" type="text">
      </div>  
      <label class="col-md-1 control-label" for="textinput">Break Time</label>  
      <div class="col-md-3">
         <input id="breakTime" name="breakTime" placeholder="mm:ss" class="form-control input-md" required="" type="text">
      </div>
    </div>

    


  <!-- Task & Action -->
    <div class="form-group">
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-4">
          <label class="control-label " for="textarea">Task:</label>
        </div>
      
      <div class="col-md-9"></div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-2">
        <textarea class="form-control" id="tak" name="tak"></textarea>
        </div>
      </div>
      
    </div>

    <div class="col-md-6">
      <div class="row">
        <div class="col-md-4">
          <label class="control-label " for="textarea">Action:</label>
        </div>
        <div class="col-md-9"></div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-2">
        <textarea class="form-control" id="action" name="action"></textarea>
        </div>
      </div>
    </div>

  </div>
    
    

  <!-- knowledge & Impression -->
    <div class="form-group">
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-4">
          <label class="control-label " for="textarea">Knowledge:</label>
        </div>
      
      <div class="col-md-9"></div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-2">
        <textarea class="form-control" id="knowledge" name="knowledge"></textarea>
        </div>
      </div>
      
    </div>

    <div class="col-md-6">
      <div class="row">
        <div class="col-md-4">
          <label class="control-label " for="textarea">Impression:</label>
        </div>
        <div class="col-md-9"></div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-2">
        <textarea class="form-control" id="impression" name="impression"></textarea>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- </col-lg-8> -->
<div class="col-lg-4">
    
        <div class="panel panel-teal">
          <div class="panel-heading dark-overlay"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Calendar</div>
          <div class="panel-body">
            <div id="calendar"  data-link-field="input2" data-link-format="dd-mm-yyyy"></div>
          </div>
        </div>
        <input  id="input2" value="" class="form-control input-md" name="">
   
</div>
<!-- </col-lg-4> -->

</div>
   <!--</row>  -->
    
<hr>
   

   <!-- Save &send Email -->
  <div class="form-group ">
    
    <div class="col-md-4 col-md-offset-9 ">
      <button id="save" name="save" type="submit" class="btn btn-success">Save</button>
      <button id="saveEmail" name="saveEmail" type="submit" class="btn btn-info">Save &amp; Send Email</button>
   
    </div>
      
  </div>

 




</form>