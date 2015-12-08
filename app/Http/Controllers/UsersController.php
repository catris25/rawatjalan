<?php
namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\Dokter;
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
        $admin = Admin::all();
        return view('indexAdmin')->with('admin', $admin);
    }

    public function getAdminRegister() {
        return view('auth.register');
    }

    public function postAdminRegister(NewUserRequest $request, User $users, Admin $admin) {

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
        var_dump($userID);
        //Log::info($lastInsertedId);

        if($new_users){
            //$userID = Input::get('email');
            //$userID = $users->getId();
            $new_user = User::find($userID);
            $role = Role::find('RL001');
            //$new_users = User::find('id');
            $new_user->attachRole($role);
            //flash()->success('User Added Successfully!');

        } else {
            //flash()->error('An error occurred, try adding the User again!');
        }

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
        return view('auth.drregister');
    }

    public function postDokterRegister(NewUserRequest $request, User $users, Dokter $dokter) {
        $this->validate($request,[
          'nama_dokter' => 'required',
          'nik' => 'required',
          'jenis_kelamin' =>'required',
          'tanggal_lahir' => 'required',
          'alamat' => 'required',
          'telepon' => 'required',
          'email' => 'required',
          'spesialisasi' => 'required',
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
          'spesialisasi' => $request->input('spesialisasi'),
          'email' => Str::lower($request->input('email')),
        ]);

        $new_users = User::create([
            'email' => Str::lower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        $lastInsertedId = $new_users->email;
        $userID = DB::table('users')->where('email', $lastInsertedId)->value('id');

        //var_dump($userID);

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
        $dokter = Dokter::findOrFail($id);
        return view('auth.edit-dokter')->with('dokter', $dokter);
    }

    public function updateDokter(Request $request, $id){
      $dokter = Dokter::findOrFail($id);
      $this->validate($request, [
        'nama_dokter' => 'required',
        'nik' => 'required',
        'jenis_kelamin' =>'required',
        'tgl_lahir' => 'required',
        'alamat' => 'required'
      ]);

      $input = $request->all();
      $dokter->fill($input)->save();

      Session::flash('edit_message', 'Dokter '.$id.' berhasil dimutakhirkan!');
      return redirect(action('UsersController@editDokter', $dokter->id));
  }

}
