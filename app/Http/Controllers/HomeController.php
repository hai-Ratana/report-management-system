<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Model\ProjectTable;
use App\Model\Report;

use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function user(Request $request){
         $user = Auth::user()->id;
        $Project = ProjectTable::all();
        $users = User::paginate(5);
        if(Auth::user()->role == 1){
            if($request->ajax()){
                $reports = Report::whereYear('created_at',$request->get('year'))->whereMonth('created_at',$request->get('month'))->get();
                return response()->json(['report' => $reports]);
            }
            $reports = Report::paginate(5);

        }else{
            $reports = Report::where('idUser',$user)->paginate(5);
        }

        return view('/reportmg/content',[
            'projects' => $Project,
            'users' => $users,
            'reports' => $reports

            ]);
    }
     public function storeUser(Request $request){

        if($request->ajax()){
            if($request->has('email') && $request->has('password')){
                $user = new User;
                $user['firstname'] = $request->get('firstname');
                $user['lastname'] = $request->get('lastname');
                $user['email'] = $request->get('email');
                $user['role'] = $request->get('role');
                $user['password'] = bcrypt($request->get('password'));
                $user->save();
                return response()->json(['status'=>'200',
                                    'users' => $user]);
            }
             return response()->json(['status'=>'400','data' => 'not found']);
            }
            return "faild";
        }
        public function editUser(Request $request ){
            if($request->ajax()){
                $user = User::find($request->id);
                if(!empty($user)){
                    $user->firstname = $request->get('firstname');
                    $user->lastname = $request->get('lastname');
                    $user->email = $request->get('email');
                    $user->role = $request->get('role');
                    if(empty($request->get('password'))){
                    $user->save($request->except('password'));
                    }else{
                    $user->password = bcrypt($request->get('password'));
                    $user->save();

                    }

                    return response()->json(['status' => "200",'users' => $user]);

                }
                return response()->json(['status' => "400",'users' => 'data not found']);

            }
            return 'no connection';
        }
        public function removeUser(Request $request){
            if($request->ajax()){
                $delete = User::find($request->get('id'));
                if(!empty($delete)){
                  $delete->delete();
                  return response()->json(['status'=>'200']);
                }
                return response()->json(['status'=>'400']);
            }

            return "no connection";
        }


        public function storeProjects(Request $request){
             $newProject = new ProjectTable;
            if ($request->ajax()){
                if($request->has('nameProject') && $request->has('duration')){

                    $newProject->nameProject = $request->get('nameProject');
                    $newProject->description = $request->get('description');
                    $newProject->duration = $request->get('duration');
                    $newProject->other = $request->get('other');

                    $newProject->save();
                    return response()->json(['status' => '200','datas' => $newProject]);
                }
                return response()->json(['status' => '400','datas' => 'not found']);
            }
            return "lost connection";
        }
        public function editProject($id,Request $request){
            if($request->ajax()){
                $edit = ProjectTable::find($id);
                return response()->json(['project' => $edit]);
            }
            return "fail";

        }
        public function changeProject($id,Request $request){
            if($request->ajax()){
                $updateProject = ProjectTable::find($id);
                if(!empty($updateProject)){
                    $updateProject->nameProject = $request->get('nameProject');
                    $updateProject->description = $request->get('description');
                    $updateProject->duration = $request->get('duration');
                    $updateProject->other = $request->get('other');

                    $updateProject->save();

                    return response()->json(['status'=> 'updated','data'=> $updateProject]);
                }
                     return response()->json(['status'=> '400','data'=> 'not found id']);
            }
            return "faild";
        }
        public function removeProject($id,Request $request){

            if($request->ajax()){
                $project = ProjectTable::find($id)->delete();

                return response()->json(['status' => 'deleted']);
            }
            return "faild";
        }

    public function createReport(){
        $newReport = new Report;
        if(Input::has('idUser') && Input::has('startTime') && Input::has('stopTime') && Input::has('task')){
            $newReport->idUser = Input::get('idUser');
            $newReport->projectId = Input::get('projectId');
            $newReport->project = Input::get('project');
            $newReport->startTime = Input::get('startTime');
            $newReport->stopTime = Input::get('stopTime');
            $newReport->totalTime = Input::get('totalTime');
            $newReport->breakTime = Input::get('breakTime');
            $newReport->task = Input::get('task');
            $newReport->action = Input::get('action');
            $newReport->knowledge = Input::get('knowledge');
            $newReport->impression = Input::get('impression');

            $newReport->save();
            return redirect('report');
        }
        return "faild";
    }
    public function filterReport(Request $request){
        if($request->ajax()){

        $report = Report::whereDate('created_at','=',$request->get('day'))->get();
            if(!empty($report)){
             return response()->json(['status'=>'200','datas' => $report]);
            }else{
             return response()->json(['datas' => 'not found']);
            }

        }
        return "no connection";
    }
    public function editReport(Request $request){

      if($request->ajax()){
        $edit = Report::find($request->get('id'));
        if(!empty($edit)){
          return response()->json(['status' => '200' ,'edit' => $edit]);
        }else{


        return response()->json(['status' => '400' ,'edit' => 'not found']);
      }
      }
        return "no connection";
    }
    public function removeReport(Request $request){
      if($request->ajax()){
        $delete = Report::find($request->get('id'));
        if(!empty($delete)){
          $delete->delete();
          return response()->json(['status' => 'deleted']);
        }
        return response()->json(['status' => '200']);
      }
      return 'no connection';
    }
    public function test(){

     $report = Report::whereDate('created_at','=','2017-05-12')->get();
     return $report;
    }
}
