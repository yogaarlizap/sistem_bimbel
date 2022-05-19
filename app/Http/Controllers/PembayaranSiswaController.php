<?php

namespace App\Http\Controllers;

use App\Models\PembayaranSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PembayaranSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = PembayaranSiswa::with('siswa')->orderBy('id', 'desc')->get();
        $no = 0;
        $siswa = Siswa::orderBy('id', 'desc')->get();
        return view('pembayaranSiswa.index', compact('pembayaran', 'no', 'siswa'));
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
            "name" => "required",
            "nominal_diterima" => "required",
            "nominal_tertunggak" => "required",
            "type_pembayaran" => "required",
        ]);

        if ($request->nominal_tertunggak == 0) {
            $status = "Lunas";
        } else {
            $status = "Belum Lunas";
        }

        PembayaranSiswa::create([
            "siswa_id" => $request->name,
            "status" => $status,
            "nominal_diterima" => $request->nominal_diterima,
            "nominal_tertunggak" => $request->nominal_tertunggak,
            "type_pembayaran" =>  $request->type_pembayaran,
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
        return response()->json(PembayaranSiswa::with('siswa')->find($id));
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
        if ($request->nominal_tertunggak == 0) {
            $status = "Lunas";
        } else {
            $status = "Belum Lunas";
        }

        PembayaranSiswa::find($id)->update([
            "siswa_id" => $request->name,
            "status" => $status,
            "nominal_diterima" => $request->nominal_diterima,
            "nominal_tertunggak" => $request->nominal_tertunggak,
            "type_pembayaran" =>  $request->type_pembayaran,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PembayaranSiswa::find($id)->delete();
    }
}
