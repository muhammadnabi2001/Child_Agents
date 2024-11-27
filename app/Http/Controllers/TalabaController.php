<?php

namespace App\Http\Controllers;

use App\Http\Requests\TalabaStoreRequest;
use App\Models\Talaba;
use Illuminate\Http\Request;

class TalabaController extends Controller
{
    public function talaba()
    {
        $talaba=Talaba::all();
        return view('Talaba.talaba',['talabalar'=>$talaba]);
    }
    public function created(TalabaStoreRequest $request)
    {
        //dd($request->all());
        $data=$request->validated();
        Talaba::create([
            'name'=>$data['name'],
            'age'=>$data['age'],
            'email'=>$data['email'],
            'password'=>$data['password']
        ]);
        return redirect()->back()->with('success',"Talaba muvvafaqiyatli qo'shildi");
    }
}
