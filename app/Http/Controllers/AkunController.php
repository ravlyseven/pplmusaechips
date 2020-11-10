<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\model untuk connect ke model
use App\admin;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //cara 1
        //$nama_variabel = DB::table('nama_tabel')->get();
        $admins = DB::table('admins')->get();
        return view('akun/index', ['admins' => $admins]); 
        //atau 
        //return view('lokasi', compact('nama_variabel'));
        
        //cara 2
        //$nama_variabel = \app\nama_model::all();
        //$admins = nama_model::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akun/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $admin = new admin;
        // $admin->NamaAdmin = $request->NamaAdmin;
        // $admin->PasswordAdmin = $request->PasswordAdmin;
        // $admin->EmailAdmin = $request->EmailAdmin;

        // $admin->save();

        // admin::create[(
        //     'NamaAdmin' => $request->NamaAdmin,
        //     'PasswordAdmin' => $request->PasswordAdmin,
        //     'EmailAdmin' => $request->EmailAdmin
        // )];

        admin::create($request->all());

        return redirect('/akun');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        return view('akun/show', compact('admin'));
        //return view('lokasi', ['admin' => $admin]);
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
