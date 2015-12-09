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
          'id_pasien' => 'required',
          'usia_berobat' =>'required',
          'tgl_visit' => 'required',
          'diagnosis' => 'required',
          'tindakan' => 'required'
        ]);

        $format_tgl_info_old = Input::get('tgl_visit');

        // RekamMedik::create([
        //   'kode_visit' => $request->input('')
        //   'id_pasien' => $request->input('id_pasien'),
        //   'nik' => $request->input('nik'),
        //   'jenis_kelamin' => $request->input('jenis_kelamin'),
        //   'tgl_lahir' => date("Y-m-d", strtotime($format_tgl_info_old)),
        // ])
        Session::flash('message', 'Record Rekam Medik baru berhasil ditambahkan!');
        return redirect('rekam-medik');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
