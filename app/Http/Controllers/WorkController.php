<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id = Auth::user()->id;
        $data = array();
        $data = Work::all()->where('user_id',$id);
        return view('demandeur.work.index',compact('data'));
    }

    public function create()
    {
        return view('demandeur.work.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'company_name' => ['required', 'max:255','string'],
            'position' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
        ],[
            'company_name.required' =>"Field Must not be empty",
            'position.string' =>"Name Should be a String",
            'year.required' =>"Field Must not be empty",
            'year.integer' =>"Enter valid Year!",
        ]);
        $work = new Work;

        $work->company_name = $request->company_name;
        $work->position = $request->position;
        $work->year = $request->year;
        $work->user_id = Auth::user()->id;
        if($work->save()){
            return redirect('work_summery_display');
        }else{
            echo 'error';
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $data = Work::findorFail($id);
        return view('demandeur.work.update',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $id = base64_decode($id);
        $request->validate([
            'company_name' => ['required', 'max:255','string'],
            'position' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
        ],[
            'company_name.required' =>"Champ vide",
            'position.string' =>"Nom invalide",
            'year.required' =>"Champ vide",
            'year.integer' =>"Entrer une annee valide!",
        ]);
        $update = Work::findorFail($id)->update([
            'company_name' => $request->company_name,
            'position' => $request->position,
            'year' => $request->year,
        ]);
        if($update)
        {
            return redirect('work_summery_display')->with('update','Modifier avec succes!');
        }
    }

    public function destroy($id)
    {
        $id = base64_decode($id);
        $del = Work::findorFail($id)->delete();
        if($del)
        {
            return back()->with('delete','Supprimer avec succes!');
        }
    }
}
