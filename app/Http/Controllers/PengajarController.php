<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PengajarController extends Controller
{

    public function role()
    {
        $role = Roles::where('name', 'Pengajar')->first('id');
        return $role->id;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajar = Pengajar::with('user')->orderBy('id', 'desc')->get();
        $no = 0;
        return view('pengajar.index', compact('pengajar', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'pendidikan' => 'required',
            'asal_pendidikan' => 'required',
            'no_telpon' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $this->role(),
            'photo_profile' => 'public/images/user.png'
        ]);

        Pengajar::create([
            'user_id' => $user->id,
            'nomor_induk' => rand(999999,9999999),
            'pendidikan_terakhir' => $request->pendidikan,
            'asal_pendidikan' => $request->asal_pendidikan,
            'nomor_telpon' => $request->no_telpon,
            'alamat' => $request->alamat,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Pengajar::with('user')->find($id));
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
        $validate = Validator::make($request->all(), [
            'password' => 'min:6|confirmed',
        ]);

        $pengajar = Pengajar::find($id);
        $pengajar->update([
            'nomor_induk' => rand(999999, 9999999),
            'pendidikan_terakhir' => $request->pendidikan,
            'asal_pendidikan' => $request->asal_pendidikan,
            'nomor_telpon' => $request->no_telpon,
            'alamat' => $request->alamat,
        ]);

        if(!$request->password){
            User::where('id', '=', $pengajar->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }else{
            User::where('id', '=', $pengajar->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengajar = Pengajar::find($id);

        User::where('id', '=', $pengajar->user_id)->delete();
        $pengajar->delete();
    }
}
