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
    
    public function user(){
         $user = Auth::user()->id;
        $Project = ProjectTable::all();
        $users = User::all();
        if(Auth::user()->role == 1){
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
    public function test(){
       
        $report = User::where('idUser',$user);
       foreach ($report as $key => $value) {
           echo $value->id;
       }
       
    }
}
