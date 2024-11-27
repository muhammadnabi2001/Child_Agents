<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentStoreRequest;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function agents()
    {
        $agents=Agent::orderBy('id','desc')->where('parent_id','=',0)->paginate(10);
        return view('Agent.agents',['agents'=>$agents]);
    }
    public function create()
    {
        return view('Agent.parentcreate');
    }
    public function parentstore(AgentStoreRequest $request)
    {
        $data=$request->validated();
        Agent::create([
            'parent_id'=>0,
            'name'=>$data['name'],
            'tel'=>$data['tel']
        ]);
        return redirect('agents')->with('success',"Ma'lumot muvvafaqiyatili qo'shildi");
    }
    public function childs(Agent $agent)
    {
        //dd($agent);
        $agents=$agent->children()->paginate(5);
        return view('Agent.agents',['agents'=>$agents]);
        
    }
}
