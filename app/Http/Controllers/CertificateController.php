<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id = Auth::user()->id;
        $data = array();
        $data = Certificate::all()->where('user_id',$id);
        return view('demandeur.certificate.index',compact('data'));
    }

    public function create()
    {
        return view('demandeur.certificate.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'certificate_name' => ['required', 'max:255','string'],
            'about' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
        ],[
            'certificate_name.required' =>"Champ vide",
            'about.string' =>"Nom invalide",
            'year.required' =>"Champ vide",
            'year.integer' =>"Entrer une annee valide!",
        ]);
        $cer = new Certificate;

        $cer->certificate_name = $request->certificate_name;
        $cer->about = $request->about;
        $cer->year = $request->year;
        $cer->user_id = Auth::user()->id;
        if($cer->save()){
            return redirect('certificate_summery_display');
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
        $data = Certificate::findorFail($id);
        return view('demandeur.certificate.update',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $id = base64_decode($id);
        $request->validate([
            'certificate_name' => ['required', 'max:255','string'],
            'about' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
        ],[
            'certificate_name.required' =>"Champ vide",
            'about.string' =>"Nom invalide",
            'year.required' =>"Champ vide",
            'year.integer' =>"Entrer une annee valide!",
        ]);
       $update = Certificate::findorFail($id)->update([
            'certificate_name' => $request->certificate_name,
            'about' => $request->about,
            'year' => $request->year,
        ]);
        if($update)
        {
       
            return redirect('certificate_summery_display')->with('update','Modifier avec  success!');
        }
    }

    public function destroy($id)
    {
         $id = base64_decode($id);
        $del = Certificate::findorFail($id)->delete();
        if($del)
        {
            return back()->with('delete','Supprimer avec succes!');
        }
    }
}
