<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareerObject;
use App\Models\basicInfo;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Work;
use PDF;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $usrId = Auth::user()->id;
        $data= array();

        $data['basicInfo'] = basicInfo::where('user_id', $usrId)->first();
        $data['objective'] = CareerObject::where('user_id', $usrId)->first();
        $data['educations'] = Education::where('user_id', $usrId)->get();
        $data['works'] = Work::where('user_id', $usrId)->get();
        $data['cetificates'] = Certificate::where('user_id', $usrId)->get();
        return view('demandeur.pdf.index',compact('data'));
    }

    public function download()
    {
        $usrId = Auth::user()->id;
        $data= array();

        $data['basicInfo'] = basicInfo::where('user_id', $usrId)->first();
        $data['objective'] = CareerObject::where('user_id', $usrId)->first();
        $data['educations'] = Education::where('user_id', $usrId)->get();
        $data['works'] = Work::where('user_id', $usrId)->get();
        $data['cetificates'] = Certificate::where('user_id', $usrId)->get();
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('demandeur.pdf.index',compact('data'));
        return $pdf->download('myresume.pdf');
    }
}
