<div class="row">
   <div class="col-md-6 pull-right">
          <label class="col-md-2 control-label " for="selectbasic">Month:</label>
          <div class="col-md-4  ">
          <select  id="selectbasic" name="selectbasic" class=" form-control">
            <option value="1">Option one</option>
            <option value="2">Option two</option>
          </select>
          </div>
      
      
          <label class="col-md-2 control-label " for="selectbasic">Year:</label>
          <div class="col-md-4 ">
          <select  id="selectbasic" name="selectbasic" class=" form-control">
            <option value="1">Option one</option>
            <option value="2">Option two</option>
          </select>
          </div>
      </div>
</div>
     
          

 <div class="row">
  <div class="col-md-12">
    <h2>Report List of Activity for Week:</h2>
    <br>
   <div class="table-responsive">
     <table class="table table-bordered table-striped ">
        <thead>
          <tr>
            <th>No</th>
            <th>Date</th>
            <th>ProjectID</th>
            <th>Project</th>
            <th>Start</th>
            <th>Stop</th>
            <th>Break</th>
            <th>Task</th>
            <th>Action</th>
            <th>Total hours</th>
            @if(Auth::user()->role ==1)
            <th>other</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @if(!empty($reports))
            @foreach($reports as $key => $report)
            <tr>
              <td>{!! ($key+1) !!}</td>
              <td>{!! date_format($report->created_at,"Y/m/d") !!}</td>
              <td>OOP{!! $report->projectId !!}</td>
              <td>{!! $report->project !!}</td>
              <td>{!! $report->startTime !!}</td>
              <td>{!! $report->stopTime !!}</td>
              <td>{!! $report->breakTime !!}</td>
              <td>{!! $report->task !!}</td>
              <td>{!! $report->action !!}</td>
              
              <td>{!! $report->totalTime !!}</td>
               @if(Auth::user()->role ==1)
              <td>
                
                
                  <button class=" btn btn-primary form-control">Edit</button>
                
                 
                    <button class=" btn btn-danger form-control">Delete</button>
                
               
              
               
              </td>
               @endif
            </tr>
            @endforeach
        
        </tbody>
      </table>
   </div>
     <div class="text-center">
    {!! $reports->links() !!}
</div>
    @endif
  </div>
   
 </div>
  
  <hr>
  <button type="submit" class="btn btn-primary  col-md-offset-5 col-md-2">Print</button>