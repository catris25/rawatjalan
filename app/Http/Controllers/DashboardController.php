<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use App\Pasien;
  use App\BPJS;
  use App\Poli;
  use Input;
  use Session;
  use DB;
  use Illuminate\Database\Eloquent\ModelNotFoundException;

  class DashboardController extends Controller
  {
     public function home()
     {
        $id_pasien = Input::get('id_pasien');
        $id_bpjs = Input::get('id_bpjs');

        if(isset($id_pasien) and empty($id_bpjs)){
          $pasien = Pasien::where('id', '=', $id_pasien)->get();
          $pasienid = DB::table('pasien')->where('id', $id_pasien)->value('id');
          $info = "Pasien ditemukan";
          $tambah = true;
          return view('dashboard.tambah-ke-poli')->with('pasien', $pasien)->with('info', $info)->with('tambah', $tambah);
        }else if(isset($id_bpjs) and isset($id_pasien)){
          $pasien = Pasien::where('id', '=', $id_pasien)->get();
          $bpjs = BPJS::where('id', '=', $id_bpjs)->get();

          $pasieninfo = DB::table('pasien')->where('id', $id_pasien)->value('nik');
          $bpjsinfo = DB::table('bpjs')->where('id', $id_bpjs)->value('nik');
          $bpjsstatus = DB::table('bpjs')->where('id',$id_bpjs)->value('status_premi');
          $bpjsexists = BPJS::where('id', $id_bpjs)->count();
          $pasienexists = Pasien::where('id', $id_pasien)->count();
          $pasienid = DB::table('pasien')->where('id', $id_pasien)->value('id');
          $bpjsid = BPJS::where('id', $id_bpjs)->value('id');

          if($pasienexists==1){
            if($bpjsexists==1){
              if($bpjsstatus == 0) {
                $info = "BPJS tidak aktif";
                $tambah = false;
              } else if($pasieninfo == $bpjsinfo) {
                $info = "Data sama";
                $tambah = true;
              } else {
                $info = "Data tidak sama";
                $tambah = false;
              }
            }else{
              $info = "BPJS tidak ditemukan";
              $tambah = false;
            }
          }else{
            $info="Pasien tidak ditemukan";
            $tambah = false;
          }

          if($tambah){
            $poli = Poli::all(['nama_poli']);
            return view('dashboard.tambah-ke-poli')->with('pasienid', $pasienid)->with('bpjsid', $bpjsid)->with('poli', $poli);

          }else{
            return view('dashboard.home')->with('pasien', $pasien)->with('bpjs', $bpjs)->with('info',$info)->with('tambah', $tambah)->with('pasienid', $pasienid)->with('bpjsid', $bpjsid);
          }


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
