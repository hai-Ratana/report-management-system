<div class="row">
   <div class="col-md-6 pull-right">
          <label class="col-md-2 col-md-offset-4 control-label " for="selectbasic">Month:</label>
          <div class="col-md-4 ">
            <input type="text" id="month" name="month" class="form-control MonthInput">
          </div>
          <div class="col-md-2 ">
            <button data-url="{{ url('filter/ajax')}}" class="filterReport btn">
              <span ><i class="glyphicon glyphicon-th"></i></span>
            </button>
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
        <tbody id="report-list">
          @if(!empty($reports))
            @foreach($reports as $key => $report)
            <tr class="report{{ $report->id }}">
              <td>{!! ($key+1) !!}</td>
              <td>{!! date_format($report->created_at,"D/M/Y") !!}</td>
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



                    <button class=" btn btn-primary form-control editReport" data-url="{{ url('edit/report') }}" data-id="{{ $report->id }}">Edit</button>


                    <button class=" btn btn-danger form-control removeReport" data-id="{{ $report->id }}" data-url="{{ url('remove/report') }}">Delete</button>




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
