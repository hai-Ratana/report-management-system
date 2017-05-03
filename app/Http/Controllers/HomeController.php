<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Model\Project;
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
        $Project = Project::all();
        $users = User::all();
        $reports = Report::where('idUser',$user)->get();
        return view('/reportmg/content',[
            'projects' => $Project,
            'users' => $users,
            'reports' => $reports
            ]);
    }
    
    public function createProject(){
        
        $newProject = new Project;
        if(Input::has('project') ){
            $newProject->project = Input::get('project');
            $newProject->description = Input::get('description');
            $newProject->duration = Input::get('duration');
            $newProject->other = Input::get('other');
            $newProject->save();
            return redirect('/report');
        }
        return "faild";
        
    }
    public function CreateUser(){
        $newUser = new User;
        if(Input::has('email') && Input::has('password')){
            $newUser->firstname = Input::get('firstname');
            $newUser->lastname = Input::get('lastname');
            $newUser->email = Input::get('email');
            $newUser->role = Input::get('role');
            $newUser->password = bcrypt(Input::get('password'));

            $newUser->save();
            return redirect('report');
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
    public function test(){
       
        $report = User::where('idUser',$user);
       foreach ($report as $key => $value) {
           echo $value->id;
       }
       
    }
}
