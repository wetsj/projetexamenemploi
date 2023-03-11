<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;

class PostulerController extends Controller
{
    public function postuleEmploi(Request $request){
        $input = $request->all();
        if(Demande::create($input)){
            return redirect()->back()->with('success','Enregistrer avec success');

        }else{
            return redirect()->back()->with('success','Enregistrer echoue');
        }
    }
}


