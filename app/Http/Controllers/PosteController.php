<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poste;


class PosteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Affichage de mes postes
    public function index(){
        $poste = Poste::All();
        return view('entreprise.index',compact('poste'));
    }

    //Affichage de tous les postes
    public function create(){
        return view('entreprise.create');
    }

    //Ajout Poste
    public function store(Request $request)
    {
        $request -> validate([ 
            'poste' => 'required',
            'prerequis' => 'required',
            'salaire' => 'required',
            'pays' => 'required',
            'contrat' => 'required',
        ]);

        $poste = new Poste;
        
        $poste->user_id = auth()->user()->id;
        $poste->poste = $request->input('poste');
        $poste->prerequis = $request->input('prerequis');
        $poste->salaire = $request->input('salaire');
        $poste->pays = $request->input('pays');
        $poste->contrat = $request->input('contrat');
        
        $poste->save();
        return redirect()->back()->with('status','Offre posté avec avec succès');
    }

    //Modification
    public function edit($id){
        $poste = Poste::find($id);
        return view('entreprise.edit', compact('poste'));
    } 

    public function update(Request $request, $id){
        $request -> validate([
            'poste' => 'required',
            'prerequis' => 'required',
            'salaire' => 'required',
            'pays' => 'required',
            'contrat' => 'required',
        ]);
        $poste = Poste::find($id);
        $poste->poste = $request->input('poste');
        $poste->prerequis = $request->input('prerequis');
        $poste->salaire = $request->input('salaire');
        $poste->pays = $request->input('pays');
        $poste->contrat = $request->input('contrat');

        $poste->update();
        return redirect()->back()->with('status','Offre modifié avec succès');
        
    }

    //Suppression
    public function destroy($id){
        $poste = Poste::find($id);
        $poste->delete();
        return redirect()->back()->with('status','Offre supprimé avec succès');
    }

    //Liste des Notifications 
    public function notification(){
        return view('entreprise.notification');
    }
}
