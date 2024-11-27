<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddChildRequest;
use App\Http\Requests\AgentStoreRequest;
use App\Http\Requests\AgentUpdateRequest;
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
    public function agentedit(Agent $agent)
    {
        //dd($agent);
        return view('Agent.agentedit',['agent'=>$agent]);
    }
    public function parentupdate(AgentUpdateRequest $request,Agent $agent)
    {
        $data=$request->validated();
        //dd($data['tel']);
        $agent->name=$data['name'];
        $agent->tel=$data['tel'];
        $agent->save();
        return redirect('agents')->with('success',"Ma'lumot muvvafaqiyatili yangilandi");
        
    }
    public function agentdelete(Agent $agent)
    {
        //dd($agent);
        $agent->delete();
        return redirect('agents')->with('success',"Ma'lumot muvvafaqiyatili o'chirildi");

    }
    public function addchild(AddChildRequest $request,int $id)
    {
        //dd($id);
        $data=$request->validated();
        $child=new Agent();
        $child->parent_id=$id;
        $child->name=$data['name'];
        $child->tel=$data['tel'];
        $child->save();
        return redirect('agents')->with('success',"Ma'lumot muvvafaqiyatili qo'shildi");

    }
}
