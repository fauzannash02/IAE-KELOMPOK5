<?php

namespace App\Http\Controllers\API;

use App\Helpers\RespondFormatter;
use App\Http\Controllers\Controller;
use App\Models\Tiketapp;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tiketapp::all();

        if($data){
            return RespondFormatter::createApi(200, 'Success', $data);
        } else {
            return RespondFormatter::createApi(400, 'Failed');
        }
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
        try {
            $tiket = Tiketapp::create([
                'id_pelanggan' => $request->id_pelanggan,
                'nama_pelanggan' => $request->nama_pelanggan,
                'id_tiket_hotel' => $request->id_tiket_hotel,
                'id_tiket_transportasi' => $request->id_tiket_transportasi,
                'tanggal_pesanan' => $request->tanggal_pesanan,
                'total_harga' => $request->total_harga,
                'metode_pembayaran' => $request->metode_pembayaran,
                'tanggal_pembayaran' => $request->tanggal_pembayaran
            ]);

            $data = Tiketapp::where('id', '=', $tiket->id)->get();

            if($data){
                return RespondFormatter::createApi(200, 'Success', $data);
            } else {
                return RespondFormatter::createApi(400, 'Failed');
            }

        } catch (Exception $error) {
            return RespondFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tiketapp::where('id', '=', $id)->get();

        if($data){
            return RespondFormatter::createApi(200, 'Success', $data);
        } else {
            return RespondFormatter::createApi(400, 'Failed');
        }
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
        try {
            $tiket = Tiketapp::findOrFail($id);

            $tiket->update([
                'id_pelanggan' => $request->id_pelanggan,
                'nama_pelanggan' => $request->nama_pelanggan,
                'id_tiket_hotel' => $request->id_tiket_hotel,
                'id_tiket_transportasi' => $request->id_tiket_transportasi,
                'tanggal_pesanan' => $request->tanggal_pesanan,
                'total_harga' => $request->total_harga,
                'metode_pembayaran' => $request->metode_pembayaran,
                'tanggal_pembayaran' => $request->tanggal_pembayaran
            ]);

            $data = Tiketapp::where('id', '=', $id)->get();

            if($data){
                return RespondFormatter::createApi(200, 'Success', $data);
            } else {
                return RespondFormatter::createApi(400, 'Failed');
            }

        } catch (Exception $error) {
            return RespondFormatter::createApi(400, 'Failed');
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
        $tiket = Tiketapp::findOrFail($id);

        $data = $tiket->delete();

        if($data){
            return RespondFormatter::createApi(200, 'Success Delete');
        } else {
            return RespondFormatter::createApi(400, 'Failed');
        }
    }
}
