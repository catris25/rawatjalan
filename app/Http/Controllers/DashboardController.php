<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use App\Pasien;
  use App\BPJS;
  use Input;
  use Session;
  use Illuminate\Database\Eloquent\ModelNotFoundException;

  class DashboardController extends Controller
  {
     public function home()
     {
        $id_pasien = Input::get('id_pasien');
        $id_bpjs = Input::get('id_bpjs');

        if(isset($id_pasien) and empty($id_bpjs)){
          $pasien = Pasien::where('id', '=', $id_pasien)->get();
          return view('dashboard.home')->with('pasien', $pasien);
        }else if(isset($id_bpjs) and isset($id_pasien)){
          $pasien = Pasien::where('id', '=', $id_pasien)->get();
          $bpjs = BPJS::where('id', '=', $id_bpjs)->get();
          
          return view('dashboard.home')->with('pasien', $pasien)->with('bpjs', $bpjs);
        }else if(empty($id_bpjs) and empty($id_pasien)){
          //if form is still empty
          return view('dashboard.home');
        }
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
