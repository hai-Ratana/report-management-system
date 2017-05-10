@extends('layouts.user')

@section('content')

	
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        New Working Report
                        <div class="col-md-4 pull-right">
                            <div class="dropdown pull-right">
                               <!--  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                                </button> -->
                                <a class="dropdown-toggle" data-toggle="dropdown" data-tooltip="tooltip" title="User Info!"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a><i class="fa fa-user" aria-hidden="true"></i>  {{ Auth::user()->firstname }}  {{ Auth::user()->lastname }}</a></li>
                                  <li><a><i class="fa fa-suitcase" aria-hidden="true"></i> @if(Auth::user()->role == 1)
                                   Admin
                                   @else
                                   User
                                   @endif
                                   </a>
                                  </li>
                                  <li><a href="{{ route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> logout</a></li>
                                </ul>
                              </div> 
                        </div>

                    </div>
                    <div class="panel-body">

                        <ul class="nav nav-pills nav-tabs nav-justified">
                            <li class=""><a data-toggle="tab" href="#new"><i class="fa fa-address-card-o" aria-hidden="true"></i> New</a></li>
                            <li ><a data-toggle="tab" href="#view"><i class="fa fa-list-alt " aria-hidden="true"></i> View</a></li>
                             @if (Auth::user()->role == 1) 
                            <li><a data-toggle="tab" href="#admin"><i class="fa fa-user-secret" aria-hidden="true"></i> Admin</a></li>
                            @endif
                        </ul>

                        <div class="tab-content">
                            <div id="new" class="tab-pane fade in active">
                                <br>
                               
                                    @include('reportmg.partContent.new')    
                                
                                
                            </div>
                            <div id="view" class="tab-pane fade">

                                <br>
                                    @include('reportmg.partContent.view')
                            </div>
                           
                            <div id="admin"  class="tab-pane fade">
                                <br>
                                    @include('reportmg.partContent.admin')
                            </div>
                            
                        </div>


                    </div>

                </div>
            </div>
        </div>
        </div><!--/.row-->

@endsection