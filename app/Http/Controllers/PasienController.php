<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Http\Requests;

use Illuminate\Support\Facades\View;
use Session;

class PasienController extends Controller
{

    public function index()
    {
        $pasien = Pasien::all();
        return view('pasien.index')->with('pasien', $pasien);
    }

    public function create()
    {
        return view('pasien.create');

    }

    public function store(Request $request)
    {
        $this->validate($request,[
          'nama_pasien' => 'required',
          'tgl_lahir' => 'required',
          'alamat' => 'required'
        ]);

        $input = $request->all();

        Pasien::create($input);
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
