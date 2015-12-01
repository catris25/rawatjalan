<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Http\Requests;

use Illuminate\Support\Facades\View;
use Session;
use Input;

class PasienController extends Controller
{

    public function index()
    {
        $keyword = Input::get('keyword');
        if(isset($keyword)){    //check if keyword has value
          $kategori = Input::get('kategori');
          $pasien = Pasien::where($kategori, 'LIKE', '%'.$keyword.'%')->get();
          return view('pasien.index')->with('pasien', $pasien);
        }
        //if keyword contains no value, return the following data
        $pasien = Pasien::all();
        return view('pasien.index')->with('pasien', $pasien);
    }

    public function create()
    {
        return view('pasien.tambah');

    }

    public function store(Request $request)
    {
        //Pasien $pasien;
        $this->validate($request,[
          'nama_pasien' => 'required',
          'nik' => 'required',
          'jenis_kelamin' =>'required',
          'tgl_lahir' => 'required',
          'alamat' => 'required'
        ]);

        //$input = $request->all();
        $format_tgl_info_old = Input::get('tgl_lahir');
        $new_users = Pasien::create([
            'nama_pasien' => $request->input('nama_pasien'),
            'nik' => $request->input('nik'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tgl_lahir' => date("Y-m-d", strtotime($format_tgl_info_old)),
            'alamat' => $request->input('alamat'),
            'telepon' => $request->input('telepon'),
            'gol_darah' => $request->input('gol_darah'),
            'alergi' => $request->input('alergi'),
            'riwayat_penyakit' => $request->input('riwayat_penyakit'),
        ]);
        //Pasien::create($input);
        Session::flash('message', 'Pasien berhasil ditambahkan!');
        return redirect('pasien');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit')->with('pasien', $pasien);
    }

    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);
        $this->validate($request, [
          'nama_pasien' => 'required',
          'nik' => 'required',
          'jenis_kelamin' =>'required',
          'tgl_lahir' => 'required',
          'alamat' => 'required'
        ]);

        $input = $request->all();
        $pasien->fill($input)->save();

        Session::flash('edit_message', 'Pasien '.$id.' berhasil dimutakhirkan!');
        return redirect(action('PasienController@edit', $pasien->id));
    }

    public function destroy($id)
    {
        //
    }
}
