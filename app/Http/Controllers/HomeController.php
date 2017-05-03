<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Project;
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
        $Project = Project::all();
        return view('/reportmg/content',['projects' => $Project]);
    }
    
    public function createProject(){
        // $newUser = new User;
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
}
