<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poli;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class PoliController extends Controller
{

    public function index()
    {
      $poli = Poli::all();
      return view('poli.index')->with('poli', $poli);
    }

    public function create()
    {
        return view('poli.tambah');
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'nama_poli' => 'required',
        'deskripsi' =>'required',
      ]);

      $input = $request->all();

      Poli::create($input);
      Session::flash('message', 'Poli baru berhasil ditambahkan!');
      return redirect('poli');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $poli = Poli::findOrFail($id);
      return view('poli.edit')->with('poli', $poli);
    }

    public function update(Request $request, $id)
    {
      $poli = Poli::findOrFail($id);
      $this->validate($request, [
        'nama_poli' => 'required',
        'deskripsi' =>'required',
      ]);

      $input = $request->all();
      $poli->fill($input)->save();

      Session::flash('edit_message', 'Poli '.$id.' berhasil dimutakhirkan!');
      return redirect(action('PoliController@edit', $poli->id));
    }

    public function destroy($id)
    {
        //
    }
}
