<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\basicInfo;
use Illuminate\Support\Facades\Auth;
class BasicInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //return view('home');
    }

    public function create()
    {
        return view('cv');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'max:255','string'],
            'last_name' => ['required', 'max:255'],
            'profession' => ['required', 'max:255'],
            'division' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'website' => ['required', 'URL'],
            'post_code' => ['required', 'integer'],
            'phone' => ['required', 'integer'],
            'email' => ['required','email','unique:basic_information'],
        ],[
            'first_name.required' =>"Champ vide",
            'first_name.string' =>"Prenom en lettre",
            'last_name.required' =>"Champ vide",
            'profession.required' =>"Champ vide",
            'division.required' =>"Champ vide",
            'address.required' =>"Champ vide",
            'email.required' =>"Champ vide",
            'email.email' =>"Entrer un email",
            'website.required' =>"Champ vide",
            'website.URL' =>"Entrer un url",
            'post_code.required' =>"Champ vide",
            'post_code.integer' =>"Entrer un code valide",
            'phone.required' =>"Champ vide",
            'phone.integer' =>"Entrer un numero valide",
        ]);
        
        $bInfo = new basicInfo;
        
        $bInfo->first_name = $request->first_name;
        $bInfo->last_name = $request->last_name;
        $bInfo->profession = $request->profession;
        $bInfo->division = $request->division;
        $bInfo->address = $request->address;
        $bInfo->website = $request->website;
        $bInfo->post_code = $request->post_code;
        $bInfo->phone = $request->phone;
        $bInfo->email = $request->email;
        $bInfo->user_id = Auth::user()->id;
        if($bInfo->save()){
            return redirect('education_information');
        }else{
            echo 'erreur';
        }

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
