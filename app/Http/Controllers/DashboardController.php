<?php

  namespace App\Http\Controllers;

  use App\Http\Controllers\Controller;
  use Response;
  use App\Admin;
  use App\Pasien;
  use App\BPJS;
  use App\Dokter;
  use App\Poli;
  use App\RMTemp;
  use App\RekamMedik;
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
            $poli = Poli::all(['id']);
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
            $poli = Poli::all();
            return view('dashboard.tambah-ke-poli')->with('pasienid', $pasienid)->with('bpjsid', $bpjsid)->with('poli', $poli);

          }else{
            return view('dashboard.home')->with('pasien', $pasien)->with('bpjs', $bpjs)->with('info',$info)->with('tambah', $tambah)->with('pasienid', $pasienid)->with('bpjsid', $bpjsid);
          }


        }else if(empty($id_bpjs) and empty($id_pasien)){

          //if form is still empty
          if(Auth::user()->is('dokter')){
            $email = Auth::user()->email;
            $id_dokter = Dokter::where('email', $email)->value('id');
            $temp = RMTemp::where('id_dokter', $id_dokter)->where('status_cek', 0)->get();

          }else if(Auth::user()->is('admin')){
            $email = Auth::user()->email;
            $id_admin = Admin::where('email', $email)->value('id');
            $temp = RMTemp::where('id_admin', $id_admin)->where('status_cek', 1)->get();
          }

          if(isset($temp) and count($temp)>0){
              return view('dashboard.home')->with('temp', $temp);
          }else{

              return view('dashboard.home');
          }

        }
     }


     public function fetchDokter(){
          if(Request::ajax()){
              $input = Input::get('id_poli');
              $dokter = Dokter::where('id_poli', $id_poli)->get();
              return $dokter;
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


     public function showTemp($id, $id_dokter, $kode_visit){
         $email = Auth::user()->email;
         $id_dokter = Dokter::where('email', $email)->value('id');
         $temp = RMTemp::where('id', $id)->where('id_dokter', $id_dokter)->where('kode_visit', $kode_visit)->get()->first();

         $rm = RekamMedik::where('id', $id)->where('id_dokter', $id_dokter)->where('kode_visit', $kode_visit)->get()->first();
         return view('dashboard.validasi')->with('temp', $temp)->with('rm', $rm);
     }

     public function validateTemp($id, $id_dokter, $kode_visit){
         if(Input::get('terima')){
           $temp = RMTemp::where('id', $id)->where('id_dokter', $id_dokter)->where('kode_visit', $kode_visit)->first();

           $updateRM = ([
             'usia_berobat' => $temp->usia_berobat,
             'tgl_visit' => $temp->tgl_visit,
             'tinggi_badan' => $temp->tinggi_badan,
             'berat_badan' => $temp->berat_badan,
             'tekanan_darah' => $temp->tekanan_darah,
             'resep' => $temp->resep,
             'anamnesis' => $temp->anamnesis,
             'diagnosis' => $temp->diagnosis,
             'tindakan' => $temp->tindakan,
             'status_validasi' => 1
           ]);

           //update RekamMedik
           RekamMedik::where('id', $id)->where('id_dokter', $id_dokter)->where('kode_visit', $kode_visit)->update($updateRM);
           //delete the data on temp
           RMTemp::where('id', $id)->where('id_dokter', $id_dokter)->where('kode_visit', $kode_visit)->delete();
           Session::flash('message', 'Rekam Medik '.$id.'-'.$id_dokter.'-'.$kode_visit.' berhasil dimutakhirkan!');
           return redirect('dashboard');

         }else{
            $updateRMTemp = (['status_cek' => 1]);
            // $updateRM = (['status_validasi' => 1]);
            // RekamMedik::where('id', $id)->where('id_dokter', $id_dokter)->where('kode_visit', $kode_visit)->update($updateRM);
            RMTemp::where('id', $id)->where('id_dokter', $id_dokter)->where('kode_visit', $kode_visit)->update($updateRMTemp);
            return redirect('dashboard');
         }
     }


     public function cetakRM(){
         // $rekamMedik = RekamMedik::all();
         // return view('rekam-medik.cetak-rm')->with('rekamMedik', $rekamMedik);
         return view('rekam-medik.cetak-rm');
      }

     public function dropdown($id) {
      $dokter = Dokter::where('id_poli', $id)->get();
      $options = array();

        foreach ($dokter as $dokt) {
            $options += array($dokt->id => $dokt->nama_dokter);
        }

      return Response::json($options);
     }

     public function nyoba() {
      return view('trydrop');
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
