<?php

  namespace App\Http\Controllers\Dash;

  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use App\Pasien;
  use App\BPJS;
  use Input;

  class DashboardController extends Controller
  {
     public function home(Request $request)
     {
         $id_pasien = Input::get('id_pasien');
         //if form is filled
         if(isset($id_pasien)){
           $pasien = Pasien::findOrFail($id_pasien)->get();  //fetch pasien data frm db
           $id_bpjs = Input::get('id_bpjs');  //get id bpjs from form
           if(isset($id_bpjs)){
             $bpjs = BPJS::findOrFail($id_bpjs)->get(); //fetch bpjs data from db
             return view('dashboard.home')->with('pasien', $pasien)->with('bpjs', $bpjs); //return pasien data and bpjs
           }else{
             return view('dashboard.home')->with('pasien', $pasien);  //return pasien data only
           }
         }
         //if form is still empty
         return view('dashboard.home');
     }

     public function error() {
        return view('errors.roleerror');
     }

     public function __construct()
     {
       $this->middleware('auth');
     }
  }

?>
