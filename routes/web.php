<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\BasicInfoController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\CareerObjectController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('layouts.accueil');
})->name('main_index');

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
//Entreprise
//Postes

Route::get('add-postes', [PosteController::class, 'create']);
Route::get('liste-postes', [PosteController::class, 'index']);
Route::post('add-postes', [PosteController::class, 'store']);
Route::get('edit-poste/{id}',[PosteController::class,'edit']);
Route::put('update-poste/{id}',[PosteController::class,'update']);
Route::get('delete-poste/{id}',[PosteController::class,'destroy']);
//Liste des Notifs
Route::get('liste-notifications',[PosteController::class, 'notification']);


//Demandeur
//CV

Route::get('/mon_cv', [BasicInfoController::class,'create'])->name('cv');
Route::post('/basic info store', [BasicInfoController::class,'store'])->name('store');
//education
Route::get('/education_information',[EducationController::class,'create'])->name('education_create');
Route::get('/education_summery',[EducationController::class,'index'])->name('education_index');
Route::post('/education_store',[EducationController::class,'store'])->name('education_store');
Route::get('/edu_delete/{id}',[EducationController::class,'destroy'])->name('edu_delete');
Route::get('/update/{id}',[EducationController::class,'edit'])->name('update');
Route::post('/update/{id}',[EducationController::class,'update'])->name('update');

//work 
Route::get('work_summery_display',[WorkController::class,'index'])->name('work_index');
Route::get('work_information_create',[WorkController::class,'create'])->name('work_create');
Route::post('work_information_store',[WorkController::class,'store'])->name('work_store');
Route::get('/work_delete/{id}',[WorkController::class,'destroy'])->name('work_delete');
Route::get('/work_update/{id}',[WorkController::class,'edit'])->name('edit');
Route::post('/work_update/{id}',[WorkController::class,'update'])->name('update');

//certificate
Route::get('certificate_summery_display',[CertificateController::class,'index'])->name('certificate_index');
Route::get('certificate_information_create',[CertificateController::class,'create'])->name('certificate_create');
Route::post('certificate_information_store',[CertificateController::class,'store'])->name('certificate_store');
Route::get('/delete/{id}',[CertificateController::class,'destroy'])->name('destroy');
Route::get('/certificate_update/{id}',[CertificateController::class,'edit'])->name('edit');
Route::post('/certificate_update/{id}',[CertificateController::class,'update'])->name('update');

//CA
Route::get('ca_summery_display',[CareerObjectController::class,'index'])->name('ca_index');
Route::get('ca_information_create',[CareerObjectController::class,'create'])->name('ca_create');
Route::post('ca_information_store',[CareerObjectController::class,'store'])->name('ca_store');
Route::get('/ca_update/{id}',[CareerObjectController::class,'edit'])->name('edit');
Route::post('/ca_update/{id}',[CareerObjectController::class,'update'])->name('update');

//PDF
Route::get('pdf_display',[PdfController::class,'index'])->name('pdf_index');
Route::get('pdf_download',[PdfController::class,'download'])->name('download');