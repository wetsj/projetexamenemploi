<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareerObject;
use Illuminate\Support\Facades\Auth;

class CareerObjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {    $id = Auth::user()->id;
        $d = array();
        $d = CareerObject::where('user_id', $id)->first();
     return view('demandeur.career.index',compact('d'));
    }

    public function create()
    {
        return view('demandeur.career.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'career_object' => ['required','string'],
        ],[
            'career_object.required' =>"Champ vide",
            'career_object.string' =>"Nom est en lettre",
        ]);
        $cer = new CareerObject;

        $cer->career_object = $request->career_object;
        $cer->user_id = Auth::user()->id;
        if($cer->save()){
            return redirect('ca_summery_display');
        }else{
            echo 'erreurr';
        }
    }

    public function edit($id)
    {
         $id = base64_decode($id);
        $data = CareerObject::findorFail($id);
        return view('demandeur.career.update',compact('data'));
    }

    public function update(Request $request, $id)
    {
         $id = base64_decode($id);
        $request->validate([
            'career_object' => ['required','string'],
        ],[
            'career_object.required' =>"Champ vide",
        ]);
        $update = CareerObject::findorFail($id)->update([
            'career_object' => $request->career_object,
        ]);
        if($update)
        {
            return redirect('ca_summery_display')->with('update','Modifier avec succes!');
        }
    }

    public function destroy($id)
    {
        //
    }
}
