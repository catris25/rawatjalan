<?php
namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\Dokter;
use App\Poli;
use App\Http\Controllers\Controller;
use Input;
use Session;
use Redirect;
use Bican\Roles\Exceptions\PermissionDeniedException;
use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use Bican\Roles\Traits\HasRoleAndPermission;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\NewUserRequest;


class UsersController extends Controller{

    //Admin Controller

    public function indexAdmin() {
      $keyword = Input::get('keyword');
      if(isset($keyword)){    //check if keyword has value
        $kategori = Input::get('kategori');
        $admin = Admin::where($kategori, 'LIKE', '%'.$keyword.'%')->get();
        return view('auth.lihat-admin')->with('admin', $admin);
      }
      $admin = Admin::all();
      return view('auth.lihat-admin')->with('admin', $admin);
    }

    public function getAdminRegister() {
        return view('auth.register');
    }

    public function postAdminRegister(NewUserRequest $request, User $users, Admin $admin) {

        $this->validate($request,[
          'nama_admin' => 'required',
          'nik' => 'required|max:16|min:16|unique:admin|unique:dokter,nik',
          'jenis_kelamin' =>'required',
          'tanggal_lahir' => 'required',
          'alamat' => 'required',
          'telepon' => 'required',
          'email' => 'required',
          'password' => 'required'
        ]);

        $format_tgl_info_old = Input::get('tanggal_lahir');
        $new_users = Admin::create([
            'nama_admin' => $request->input('nama_admin'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'nik' => $request->input('nik'),
            'alamat' => $request->input('alamat'),
            'telepon' => $request->input('telepon'),
            'tanggal_lahir' => date("Y-m-d", strtotime($format_tgl_info_old)),
            'email' => Str::lower($request->input('email')),
        ]);

        $new_users = User::create([
            'email' => Str::lower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        $lastInsertedId = $new_users->email;
        $userID = DB::table('users')->where('email', $lastInsertedId)->value('id');

        if($new_users){
            $new_user = User::find($userID);
            $role = Role::find('RL001');
            $new_user->attachRole($role);
            Session::flash('message', 'Admin berhasil ditambahkan!');
            return redirect('admin');
        } else {
            return redirect('admin/tambah');
        }

    }

    public function editAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        return view('auth.edit-admin')->with('admin', $admin);
    }

    public function updateAdmin(Request $request, $id){
      $admin = Admin::findOrFail($id);
      $format_tgl_info_old = Input::get('tanggal_lahir');
      $this->validate($request, [
        'nama_admin' => 'required',
        'nik' => 'required|max:16|min:16|unique:admin|unique:dokter,nik',
        'jenis_kelamin' =>'required',
        'tanggal_lahir' => 'required',
        'alamat' => 'required',
        'telepon' => 'required',
        'email' => 'required',
      ]);

      $input = $request->all();
      $admin->fill($input)->save();
      Admin::where('id', $id)->update(array(
            'tanggal_lahir' => date("Y-m-d", strtotime($format_tgl_info_old))
      ));

      Session::flash('edit_message', 'Admin '.$id.' berhasil dimutakhirkan!');
      return redirect(action('UsersController@editAdmin', $admin->id));
  }



    // Dokter Controller

    public function indexDokter(){
      $keyword = Input::get('keyword');
      if(isset($keyword)){    //check if keyword has value
        $kategori = Input::get('kategori');
        $dokter = Dokter::where($kategori, 'LIKE', '%'.$keyword.'%')->get();
        return view('auth.lihat-dokter')->with('dokter', $dokter);
      }
      $dokter = Dokter::all();
      return view('auth.lihat-dokter')->with('dokter', $dokter);
    }

    public function getDokterRegister() {
        $poli = Poli::all();
        return view('auth.drregister')->with('poli', $poli);
    }

    public function postDokterRegister(NewUserRequest $request, User $users, Dokter $dokter) {
        $this->validate($request,[
          'nama_dokter' => 'required',
          'nik' => 'required|max:16|min:16|unique:dokter|unique:admin,nik',
          'jenis_kelamin' =>'required',
          'tanggal_lahir' => 'required',
          'alamat' => 'required',
          'telepon' => 'required',
          'email' => 'required',
          'spesialisasi' => 'required',
          'id_poli' => 'required',
          'password' => 'required'
        ]);

        $format_tgl_info_old = Input::get('tanggal_lahir');
        $new_users = Dokter::create([
          'nama_dokter' => $request->input('nama_dokter'),
          'jenis_kelamin' => $request->input('jenis_kelamin'),
          'nik' => $request->input('nik'),
          'alamat' => $request->input('alamat'),
          'telepon' => $request->input('telepon'),
          'tanggal_lahir' => date("Y-m-d", strtotime($format_tgl_info_old)),
          'id_poli' => $request->input('id_poli'),
          'spesialisasi' => $request->input('spesialisasi'),
          'email' => Str::lower($request->input('email')),
        ]);

        $new_users = User::create([
            'email' => Str::lower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        $lastInsertedId = $new_users->email;
        $userID = DB::table('users')->where('email', $lastInsertedId)->value('id');

        if($new_users){
            $new_user = User::find($userID);
            $role = Role::find('RL002');
            $new_user->attachRole($role);
            Session::flash('message', 'Dokter berhasil ditambahkan!');
            return redirect('dokter');
        } else {
            return redirect('dokter/tambah');
        }
    }

    public function editDokter($id)
    {
        $poli = Poli::all();
        $dokter = Dokter::findOrFail($id);
        return view('auth.edit-dokter')->with('dokter', $dokter)->with('poli', $poli);
    }

    public function updateDokter(Request $request, $id){
      $dokter = Dokter::findOrFail($id);
      $format_tgl_info_old = Input::get('tanggal_lahir');
      $this->validate($request, [
        'nama_dokter' => 'required',
        'nik' => 'required|max:16|min:16|unique:dokter|unique:admin,nik',
        'jenis_kelamin' =>'required',
        'tanggal_lahir' => 'required',
        'alamat' => 'required',
        'telepon' => 'required',
        'id_poli' => 'required',
        'email' => 'required',
        'spesialisasi' => 'required',
      ]);

      $input = $request->all();
      $dokter->fill($input)->save();
      Dokter::where('id', $id)->update(array(
            'tanggal_lahir' => date("Y-m-d", strtotime($format_tgl_info_old))
      ));

      Session::flash('edit_message', 'Dokter '.$id.' berhasil dimutakhirkan!');
      return redirect(action('UsersController@editDokter', $dokter->id));
  }

}
