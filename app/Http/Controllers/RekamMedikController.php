<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RekamMedik;
use Input;
use Session;

class RekamMedikController extends Controller
{

    public function index()
    {
      $keyword = Input::get('keyword');
      if(isset($keyword)){    //check if keyword has value
        $kategori = Input::get('kategori');
        $rekamMedik = RekamMedik::where($kategori, 'LIKE', '%'.$keyword.'%')->get();
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
          'id' => 'required',
          'usia_berobat' =>'required',
          'tgl_visit' => 'required',
          'diagnosis' => 'required',
          'tindakan' => 'required'
        ]);

        $format_tgl_info_old = Input::get('tgl_visit');

        $newRM = RekamMedik::create([
          'id' => $request->input('id'),
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
        var_dump($newRM);
        Session::flash('message', 'Record Rekam Medik baru berhasil ditambahkan!');
        return redirect('rekam-medik');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $rekamMedik = RekamMedik::findOrFail($id);
        return view('rekam-medik.edit-rm')->with('rekamMedik', $rekamMedik);
    }


    public function update(Request $request, $id)
    {
        $rekamMedik = RekamMedik::findOrFail($id);
        $this->validate($request, [
          'usia_berobat' =>'required',
          'tgl_visit' => 'required',
          'diagnosis' => 'required',
          'tindakan' => 'required'
        ]);

        //$format_tgl_info_old = Input::get('tgl_visit');

        // $newRM = RekamMedik::update([
        //   'usia_berobat' => $request->input('usia_berobat'),
        //   'tgl_visit' => date("Y-m-d", strtotime($format_tgl_info_old)),
        //   'tinggi_badan' => $request->input('tinggi_badan'),
        //   'berat_badan' => $request->input('berat_badan'),
        //   'tekanan_darah' => $request->input('tekanan_darah'),
        //   'resep' => $request->input('resep'),
        //   'anamnesis' => $request->input('anamnesis'),
        //   'diagnosis' => $request->input('diagnosis'),
        //   'tindakan' => $request->input('tindakan')
        // ]);

        $input = $request->all();
        $rekamMedik->fill($input)->save();

        Session::flash('edit_message', 'Rekam Medik Pasien '.$id.' berhasil dimutakhirkan!');
        return redirect(action('RekamMedikController@edit', $rekamMedik->id));
    }


    public function destroy($id)
    {
        //
    }
}
