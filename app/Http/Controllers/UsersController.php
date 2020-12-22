<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role_User;
use UxWeb\SweetAlert\SweetAlert;

class UsersController extends Controller
{
    public function show()
    {
        return view('/profiles/index');
    }

    public function update(Request $request)
    {
        $users = User::all();
        foreach($users as $user)
        {
            if($user->id != Auth::user()->id)
            {
                if($request->email == $user->email)
                {
                    alert()->warning('Email telah digunakan pengguna lain', 'Warning !!!');
                    return back();
                }
            }
        }
        
        if($request->name == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->email == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->phone == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->phone < 1)
        {
            alert()->warning('Format nomor telp salah', 'Warning !!!');
            return back();
        }
        elseif($request->city == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->address == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        else
        {
            $id = Auth::user()->id;
            $data = User::findOrFail($id);
            $data->name = $request->get('name');
            $data->email = $request->get('email');
            $data->phone = $request->get('phone');
            $data->city = $request->get('city');
            $data->address = $request->get('address');
            $data->save();

            alert()->success('Data Berhasil Diperbarui', 'Sukses');
            return back();
        }
    }

    public function update_password(Request $request)
    {
        if($request->password == null)
        {
            alert()->warning('Harap isi password', 'Warning !!!');
            return back();
        }
        else
        {
            $id = Auth::user()->id;
            $data = User::findOrFail($id);
            $data->password = bcrypt($request->get('password'));
            $data->save();

            alert()->success('Password Berhasil Diperbarui', 'Sukses');
            return back();
        }
    }

    public function role($id)
    {
        $role_user = Role_User::where('user_id', $id)->first();

        if($role_user == null)
        {
            $data = new Role_User;
            $data->user_id = $id;
            $data->role_id = 1;
            $data->save();
        }

        return back();
    }
}
