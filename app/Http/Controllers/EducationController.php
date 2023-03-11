<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id = Auth::user()->id;
        $data = array();
        $data = Education::all()->where('user_id',$id);
        return view('demandeur.education.index',compact('data'));
    }

    public function create()
    {
        return view('demandeur.education.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'degree' => ['required', 'max:255','string'],
            'institute' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
        ],[
            'degree.required' =>"Champ vide",
            'institute.string' =>"Nom invalide",
            'year.required' =>"Champ vide",
            'year.integer' =>"Entrer une annee valide!",
        ]);
        $edu = new Education;

        $edu->degree = $request->degree;
        $edu->institute = $request->institute;
        $edu->year = $request->year;
        $edu->user_id = Auth::user()->id;
        if($edu->save()){
            return redirect('education_summery');
        }else{
            echo 'erreur';
        }
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $data = Education::findorFail($id);
        return view('demandeur.education.update',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $id = base64_decode($id);
        $request->validate([
            'degree' => ['required', 'max:255','string'],
            'institute' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
        ],[
            'degree.required' =>"Champ vide",
            'institute.string' =>"Nom invalide",
            'year.required' =>"Champ vide",
            'year.integer' =>"Entrer une annee valide!",
        ]);
        $update = Education::findorFail($id)->update([
            'degree' => $request->degree,
            'institute' => $request->institute,
            'year' => $request->year,
        ]);
        if($update)
        {
            return redirect('education_summery')->with('update','Modifier avec success!');
        }
    }


    public function destroy($id)
    {
        $id = base64_decode($id);
        $del = Education::findorFail($id)->delete();
        if($del)
        {
            return redirect('education_summery')->with('delete','Supprimer avec succes!');
            
        }
    }
}
