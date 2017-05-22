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
      
    @include('reportmg.partContent.adduser')
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
        @if(!empty($users))
        <tbody id="user-list" >
         
          
            @foreach($users as $key => $user)
             <tr>
           
            <td>{!! $user->firstname !!}</td>
            <td>{!! $user->lastname !!}</td>
            <td>{!! $user->email !!}</td>
            <td>
            @if($user->role ==1)
                admin
              @else
                User
            @endif
            </td>
             <td>......</td>
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
   
     <div class="text-center">
    {!! $users->links() !!}
      </div>

    </div>
    <div id="createProject" class="tab-pane fade">
       <br>
    <h2>User list:</h2>
      <div class="col-md-4 pull-right">
        <button id="projectModal" class=" pull-right btn btn-info" data-toggle="modal" data-target="#projecForm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Project</button>
      
      </div>
      @include('reportmg.partContent.addproject')
    <div class=" col-md-12 table-responsive">
      <table id="table-project" class="table table-bordered table-striped">
        <thead>
          <tr >
            <th>Project ID</th>
            <th>Project</th>
            <th>Description</th>
            <th>Duration</th>
            <th>Other</th>
            <th>Act</th>
          </tr>
        </thead>
        <tbody id="project-list" class="tbody-project">
          
          @if(!empty($projects))
          @foreach($projects as $key => $pro)
          <tr class="project{{ $pro->id }}" >
            <td>00P{!! $pro->id !!}</td>
            <td>{!! $pro->nameProject !!}</td>
            <td>{!! $pro->description !!}</td>
            <td>{!! $pro->duration !!}</td>
            <td>{!! $pro->other !!}</td>
            <td>
              
              <button class="btn btn-primary edit " 
              data-id="{{ $pro->id }}" 
              
              data-name="{{ $pro->nameProject}}"
              data-desc="{{ $pro->description}}"
              data-duration="{{ $pro->duration}}"
              data-other="{{ $pro->other }}"
              >Edit</button>
              <button class="btn btn-danger removeProject" 
              data-name="{{ $pro->nameProject}}" 
              data-id="{{ $pro->id }}" >Delete</button>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
    
    </div>
    
    
  </div>
</div>