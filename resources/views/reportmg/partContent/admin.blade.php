<div class="row">
   <ul class="nav nav-tabs ">
    <li class="active"><a data-toggle="tab" href="#createUser">user</a></li>
    <li><a data-toggle="tab" href="#createProject">project</a></li>
    

  </ul>

 </div> 
 
<div class="row">
  <div class="tab-content">
    <div id="createUser" class="tab-pane fade in active">
    <br>
    <h2>User list:</h2>
      <div class="col-md-4 pull-right">
        <button class=" pull-right btn btn-info" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> User</button>
      
      </div>
      
    <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Password</th>
            <th>other</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>John</td>
            <td>Doe</td>
            <td>john@example.com</td>
            <td>admin</td>
            <td>ooo1</td>
            <td>
              <button class="btn btn-primary">Edit</button>
              <button class="btn btn-danger">Delete</button>
            </td>
          </tr>
          
        </tbody>
      </table>

      
    </div>
    <div class="col-md-offset-5 ">
      <ul class="pagination">
        <li><a href="#">1</a></li>
        <li class="active"><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
      </ul>
    </div>
     

    </div>
    <div id="createProject" class="tab-pane fade">
       <br>
    <h2>User list:</h2>
      <div class="col-md-4 pull-right">
        <button class=" pull-right btn btn-info" data-toggle="modal" data-target="#projecForm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Project</button>
      
      </div>
      
    <div class=" col-md-12 table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Project ID</th>
            <th>Project</th>
            <th>Description</th>
            <th>Duration</th>
            <th>Other</th>
            <th>Act</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          @if(!empty($projects))
          @foreach($projects as $key => $project)
            <td>00P{!! $project->id !!}</td>
            <td>{!! $project->project !!}</td>
            <td>{!! $project->description !!}</td>
            <td>{!! $project->duration !!}</td>
            <td>{!! $project->other !!}</td>
            <td>
              <button class="btn btn-primary">Edit</button>
              <button class="btn btn-danger">Delete</button>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
      <div class="col-md-offset-5 ">
      <ul class="pagination">
        <li><a href="#">1</a></li>
        <li class="active"><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
      </ul>
    </div>
    </div>
    
    @include('reportmg.partContent.adduser')
    @include('reportmg.partContent.addproject')
  </div>
</div>