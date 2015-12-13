<?php

  namespace App\Http\Controllers;

  use App\Http\Controllers\Controller;
  use App\Pasien;
  use App\BPJS;
  use App\Dokter;
  use App\Poli;
  use App\RMTemp;
  use DB;
  use Illuminate\Database\Eloquent\ModelNotFoundException;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use Input;
  use Session;

  class DashboardController extends Controller
  {
     public function home()
     {
        if(Auth::user()->is('dokter')){
            $email = Auth::user()->email;
            $id_dokter = Dokter::where('email', $email)->value('id');
            $temp = RMTemp::where('id_dokter', $id_dokter)->get();
            if (count($temp)>0){
                Session::flash('message', 'Anda memiliki notifikasi baru! Telah dilakukan pengubahan terhadap data berikut.');
                return view('dashboard.home')->with('temp', $temp);
            }
            Session::flash('message', 'Anda tidak memiliki notifikasi baru!');
            return view('dashboard.home');
        }

        $id_pasien = Input::get('id_pasien');
        $id_bpjs = Input::get('id_bpjs');

        if(isset($id_pasien) and empty($id_bpjs)){
          $pasien = Pasien::where('id', '=', $id_pasien)->get();
          $pasienid = DB::table('pasien')->where('id', $id_pasien)->value('id');
          $pasienexists = Pasien::where('id', $id_pasien)->count();
          if($pasienexists == 1) {
            $info = "Pasien ditemukan";
            $tambah = true;
          } else {
            $info = "Pasien tidak ditemukan";
            $tambah = false;
          }
          if($tambah) {
            $poli = Poli::all(['nama_poli']);
            return view('dashboard.tambah-ke-poli')->with('pasienid', $pasienid)->with('poli', $poli);
          } else {
            return view('dashboard.home')->with('pasien', $pasien)->with('info',$info)->with('tambah', $tambah)->with('pasienid', $pasienid);
          }
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

     public function cetak() {
      $id_pasien = Input::get('id_pasien');
      $pasienid = DB::table('pasien')->where('id', $id_pasien)->value('id');
      $pasienname = DB::table('pasien')->where('id', $id_pasien)->value('nama_pasien');
      $statusbpjs = Input::get('optbpjs');
      $poli = Input::get('pilih_poli');

      if($statusbpjs===1) {
        $status = 'Pasien BPJS';
      } else {
        $status = 'Pasien Umum';
      }
      return view('cetak')->with('pasienid', $pasienid)->with('poli', $poli)->with('status',$status)->with('pasienname', $pasienname);
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
