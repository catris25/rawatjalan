<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RekamMedik;
use App\Admin;
use App\RMTemp;
use App\Pasien;
use App\Dokter;
use Input;
use Session;
use DB;
use DateTime;

class RekamMedikController extends Controller
{

    public function index()
    {

      if(!empty(Input::get('cari'))){
          $id = Input::get('id');
          $id_dokter = Input::get('id_dokter');
          $kode_visit = Input::get('kode_visit');

          $rekamMedik = RekamMedik::where('id', 'LIKE', '%'.$id.'%')->where('id_dokter','LIKE', '%'.$id_dokter.'%')->where('kode_visit', 'LIKE', '%'.$kode_visit.'%')->get();
          return view('rekam-medik.index')->with('rekamMedik', $rekamMedik);
      }

      //if keyword contains no value, return the following data
      $rekamMedik = RekamMedik::all();

      return view('rekam-medik.index')->with('rekamMedik', $rekamMedik);
    }


    public function create()
    {
        return view('rekam-medik.tambah-rm');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
          'id' => 'required|exists:pasien,id',
          'id_dokter' => 'required|exists:dokter,id',
          'tgl_visit' => 'required',
          'diagnosis' => 'required',
          'tindakan' => 'required'
        ]);

        $id_dokter = $request->input('id_dokter');

        $id_pasien = $request->input('id_pasien');

        $today = new DateTime();
        $today = date('Y-m-d');

        $id = Input::get('id');
        $tgl_lahir_pasien = Pasien::where('id', $id)->value('tgl_lahir');
        $tgl_lahir_pasien = \DateTime::createFromFormat('Y-m-d', $tgl_lahir_pasien);
        $today = \DateTime::createFromFormat('Y-m-d', $today);

        $usia_pasien = $today->diff($tgl_lahir_pasien);
        // return "usianya ".$usia_pasien->format('%Y tahun %m bulan %d hari');


        $format_tgl_info_old = Input::get('tgl_visit');

        $newRM = RekamMedik::create([
          'id' => $id,
          'id_dokter' => $id_dokter,
          'usia_berobat' => $usia_pasien->format('%Y'),
          'tgl_visit' => date("Y-m-d", strtotime($format_tgl_info_old)),
          'tinggi_badan' => $request->input('tinggi_badan'),
          'berat_badan' => $request->input('berat_badan'),
          'tekanan_darah' => $request->input('tekanan_darah'),
          'resep' => $request->input('resep'),
          'anamnesis' => $request->input('anamnesis'),
          'diagnosis' => $request->input('diagnosis'),
          'tindakan' => $request->input('tindakan')
        ]);

        Session::flash('message', 'Record Rekam Medik baru berhasil ditambahkan!');
        return redirect('rekam-medik');
    }


    public function show($id)
    {
        //
    }


    public function edit($id, $id_dokter, $kode_visit)
    {
        $email = Auth::user()->email;
        $id_admin = Admin::where('email', $email)->value('id');

        $temp = RMTemp::where('id',$id)->where('id_dokter', $id_dokter)->where('kode_visit', $kode_visit)->get()->first();
        $thisAdmin = false;
        if(count($temp)>0 and $temp->id_admin==$id_admin){
            $thisAdmin = true;
        }
        $rekamMedik = RekamMedik::where('id',$id)->where('kode_visit', $kode_visit)->get()->first();

        //if parameter passed to rekamMedik is not right (not found)
        if(!isset($rekamMedik) or !isset($id) or !isset($id_dokter) or !isset($kode_visit)){
          return view("errors.404");
        }
        if(isset($temp)){
            return view('rekam-medik.edit-rm')->with('rekamMedik', $rekamMedik)->with('temp', $temp)->with('id_admin', $id_admin)->with('thisAdmin', $thisAdmin);
        }
        return view('rekam-medik.edit-rm')->with('rekamMedik', $rekamMedik);
    }


    public function update(Request $request, $id, $id_dokter, $kode_visit)
    {
        if(Input::get('ok')){
            RMTemp::where('id', $id)->where('id_dokter', $id_dokter)->where('kode_visit', $kode_visit)->delete();
            $updateRM = (['status_validasi'=>1]);
            $rekamMedik = RekamMedik::where('id', $id)->where('id_dokter', $id_dokter)->where('kode_visit', $kode_visit)->update($updateRM);
            return redirect('dashboard');
        }
        //fetch the data from the form first
        $rekamMedik = RekamMedik::where('id', $id)->where('id_dokter', $id_dokter)->where('kode_visit', $kode_visit)->get()->first();
        $kode_visit = $request->input('kode_visit');
        $this->validate($request, [
          'id' => 'required',
          'id_dokter' => 'required',
          'usia_berobat' =>'required',
          'tgl_visit' => 'required',
          'diagnosis' => 'required',
          'tindakan' => 'required'
        ]);

        $format_tgl_info_old = Input::get('tgl_visit');

        //then check the type of user trying to update the data
        if(Auth::user()->is('admin')){
            $updateRM = (['status_validasi' => 0]);
            $kode_visit = $request->kode_visit;
            $id_dokter = $request->id_dokter;
            RekamMedik::where('id', $id)->where('id_dokter', $id_dokter)->where('kode_visit', $kode_visit)->update($updateRM);
            //fetch email from admin
            $email = Auth::user()->email;
            $id_admin = Admin::where('email', $email)->value('id');
            $temp = RMTemp::create([
              'id' => $request->input('id'),
              'kode_visit' =>  $request->input('kode_visit'),
              'id_dokter' => $request->input('id_dokter'),
              'usia_berobat' => $request->input('usia_berobat'),
              'tgl_visit' => date("Y-m-d", strtotime($format_tgl_info_old)),
              'tinggi_badan' => $request->input('tinggi_badan'),
              'berat_badan' => $request->input('berat_badan'),
              'tekanan_darah' => $request->input('tekanan_darah'),
              'resep' => $request->input('resep'),
              'anamnesis' => $request->input('anamnesis'),
              'diagnosis' => $request->input('diagnosis'),
              'tindakan' => $request->input('tindakan'),
              'id_admin' => $id_admin
            ]);

            Session::flash('message', 'Permintaan pengubahan record rekam medik akan diproses! Silahkan menunggu konfirmasi dari dokter yang bersangkutan!');
            return redirect('rekam-medik');

        }else if(Auth::user()->is('super.user')){

            $format_tgl_info_old = Input::get('tgl_visit');

            $updateRM = ([
              'usia_berobat' => $request->input('usia_berobat'),
              'tgl_visit' => date("Y-m-d", strtotime($format_tgl_info_old)),
              'tinggi_badan' => $request->input('tinggi_badan'),
              'berat_badan' => $request->input('berat_badan'),
              'tekanan_darah' => $request->input('tekanan_darah'),
              'resep' => $request->input('resep'),
              'anamnesis' => $request->input('anamnesis'),
              'diagnosis' => $request->input('diagnosis'),
              'tindakan' => $request->input('tindakan')
            ]);

            RekamMedik::where('id', $id)->where('id_dokter', $id_dokter)->where('kode_visit', $kode_visit)->update($updateRM);

            Session::flash('message', 'Rekam Medik '.$id.'-'.$id_dokter.'-'.$kode_visit.' berhasil dimutakhirkan!');
            // return redirect(action('RekamMedikController@edit', $rekamMedik->id, $rekamMedik->kode_visit));
            return redirect('rekam-medik');
        }
        return view('rekam-medik');

    }


    public function destroy($id)
    {
        //
    }
}
