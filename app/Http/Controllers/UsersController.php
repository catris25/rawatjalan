<?php
namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\Dokter;
use App\Http\Controllers\Controller;
use Input;
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

    // public function __construct(User $user, Admin $admin)
    // {
    //     $this->user = $user;
    //     $this->something = $something;
    // }

    public function getAdminRegister() {
        return view('auth.register');
    }

    public function postAdminRegister(NewUserRequest $request, User $users, Admin $admin) {


        $new_users = Admin::create([
            'nama_admin' => $request->input('nama_admin'),
            'NIK' => $request->input('NIK'),
            'alamat' => $request->input('alamat'),
            'telepon' => $request->input('telepon'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'email' => Str::lower($request->input('email')),
        ]);

        $new_users = User::create([
            'email' => Str::lower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        $lastInsertedID = $new_users->email;
        $userID = DB::table('users')->where('email', $lastInsertedID)->value('id');
        var_dump($userID);
        if($new_users){
          $new_users = User::find($userID);
          $role = Role::find('RL001');
          $new_users->attachRole($role);
        } else {
            //flash()->error('An error occurred, try adding the User again!');
        }

    }

    public function getDokterRegister() {
        return view('auth.drregister');
    }

    public function postDokterRegister(NewUserRequest $request, User $users, Dokter $dokter) {
        $new_users = $dokter->create([
            'name' => $request->input('name'),
            'email' => Str::lower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        $new_users = $users->create([
            'email' => Str::lower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        if($new_users){
            $role = Role::find(6);
            $new_users->attachRole($role);
            //flash()->success('User Added Successfully!');
        } else {
            //flash()->error('An error occurred, try adding the User again!');
        }
    }

    // public function postAdminRegister(array $data) {
    //     $user = User::create([
    //         'name'=>])
    //}

}